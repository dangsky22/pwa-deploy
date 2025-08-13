const staticCacheName = "pwa-v" + new Date().getTime();
const OFFLINE_URL = "/offline";

// Cache on install
self.addEventListener("install", (event) => {
    self.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName).then((cache) => cache.addAll([OFFLINE_URL]))
    );
});

// Clear cache on activate
self.addEventListener("activate", (event) => {
    event.waitUntil(
        caches
            .keys()
            .then((cacheNames) =>
                Promise.all(
                    cacheNames
                        .filter((cacheName) => cacheName.startsWith("pwa-"))
                        .filter((cacheName) => cacheName !== staticCacheName)
                        .map((cacheName) => caches.delete(cacheName))
                )
            )
            .then(() => self.clients.claim())
    );
});

// Serve from Cache
self.addEventListener("fetch", (event) => {
    const req = event.request;
    const url = new URL(req.url);

    // Only handle GET requests
    if (req.method !== "GET") return; // fall through to network

    // For page navigations use network-first with offline fallback
    if (req.mode === "navigate") {
        event.respondWith(
            fetch(req).catch(() => caches.match(OFFLINE_URL))
        );
        return;
    }

    // Don’t interfere with Vite build assets; let the browser fetch normally
    if (url.origin === self.location.origin && url.pathname.startsWith("/build/")) {
        return; // default network behaviour
    }

    // Cache-first for same-origin assets (images, fonts, etc.) with background fill
    if (url.origin === self.location.origin) {
        event.respondWith(
            caches.match(req).then((cached) => {
                if (cached) return cached;
                return fetch(req)
                    .then((res) => {
                        if (res && res.ok) {
                            const copy = res.clone();
                            caches.open(staticCacheName).then((cache) => cache.put(req, copy));
                        }
                        return res;
                    })
                    .catch(() => caches.match(OFFLINE_URL));
            })
        );
        return;
    }
    // For cross-origin requests, fall through to network
});
