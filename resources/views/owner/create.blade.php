<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Unit Baru - KOZE Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .form-group {
            transition: all 0.3s ease;
        }
        .form-group:focus-within {
            transform: translateY(-1px);
        }
        .image-preview {
            display: none;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }
        .image-item {
            position: relative;
            border-radius: 0.5rem;
            overflow: hidden;
            background: #f3f4f6;
            aspect-ratio: 4/3;
        }
        .image-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .remove-image {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: rgba(239, 68, 68, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-sans min-h-screen">

    <!-- Enhanced Navbar -->
    <nav class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-building text-white text-sm"></i>
                        </div>
                        <h1 class="text-xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            KOZE MANAGEMENT
                        </h1>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" onclick="goBack()" class="flex items-center space-x-2 text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-arrow-left"></i>
                        <span class="hidden sm:inline">Kembali ke Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-sm text-gray-600 hover:text-red-600 transition-colors duration-200">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden sm:inline">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-plus text-white"></i>
                </div>
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Tambah Unit Kostan Baru</h2>
                    <p class="mt-1 text-gray-600">Lengkapi informasi unit kostan yang akan disewakan</p>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <form id="tambahUnitForm" class="space-y-8">
            <!-- Informasi Dasar -->
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-info-circle text-white text-sm"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Informasi Dasar</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-group">
                        <label for="nama_unit" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-tag text-gray-400 mr-2"></i>Nama Unit
                        </label>
                        <input type="text" id="nama_unit" name="nama_unit" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               placeholder="Contoh: Unit A-12">
                    </div>

                    <div class="form-group">
                        <label for="tipe_unit" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-home text-gray-400 mr-2"></i>Tipe Unit
                        </label>
                        <select id="tipe_unit" name="tipe_unit" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <option value="">Pilih Tipe Unit</option>
                            <option value="single">Single Room</option>
                            <option value="sharing">Sharing Room</option>
                            <option value="studio">Studio</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga_bulanan" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-money-bill-wave text-gray-400 mr-2"></i>Harga per Bulan (Rp)
                        </label>
                        <input type="number" id="harga_bulanan" name="harga_bulanan" required min="0"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               placeholder="1500000">
                    </div>

                    <div class="form-group">
                        <label for="ukuran_kamar" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-ruler text-gray-400 mr-2"></i>Ukuran Kamar (m²)
                        </label>
                        <input type="number" id="ukuran_kamar" name="ukuran_kamar" required min="0" step="0.1"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               placeholder="12.5">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-align-left text-gray-400 mr-2"></i>Deskripsi Unit
                    </label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                              placeholder="Deskripsikan kondisi dan keunggulan unit kostan ini..."></textarea>
                </div>
            </div>

            <!-- Lokasi -->
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-map-marker-alt text-white text-sm"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Informasi Lokasi</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-group md:col-span-2">
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-map text-gray-400 mr-2"></i>Alamat Lengkap
                        </label>
                        <textarea id="alamat" name="alamat" rows="3" required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                  placeholder="Jl. Contoh No. 123, RT/RW 01/02..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-building text-gray-400 mr-2"></i>Kecamatan
                        </label>
                        <input type="text" id="kecamatan" name="kecamatan" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               placeholder="Nama Kecamatan">
                    </div>

                    <div class="form-group">
                        <label for="kota" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-city text-gray-400 mr-2"></i>Kota
                        </label>
                        <input type="text" id="kota" name="kota" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               placeholder="Nama Kota">
                    </div>
                </div>
            </div>

            <!-- Fasilitas -->
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-star text-white text-sm"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Fasilitas Unit</h3>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <label class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer">
                        <input type="checkbox" name="fasilitas[]" value="ac" class="mr-3 text-blue-600 focus:ring-blue-500">
                        <div class="flex items-center">
                            <i class="fas fa-snowflake text-blue-500 mr-2"></i>
                            <span class="text-sm">AC</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer">
                        <input type="checkbox" name="fasilitas[]" value="wifi" class="mr-3 text-blue-600 focus:ring-blue-500">
                        <div class="flex items-center">
                            <i class="fas fa-wifi text-green-500 mr-2"></i>
                            <span class="text-sm">WiFi</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer">
                        <input type="checkbox" name="fasilitas[]" value="kamar_mandi_dalam" class="mr-3 text-blue-600 focus:ring-blue-500">
                        <div class="flex items-center">
                            <i class="fas fa-bath text-purple-500 mr-2"></i>
                            <span class="text-sm">Kamar Mandi Dalam</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer">
                        <input type="checkbox" name="fasilitas[]" value="kasur" class="mr-3 text-blue-600 focus:ring-blue-500">
                        <div class="flex items-center">
                            <i class="fas fa-bed text-indigo-500 mr-2"></i>
                            <span class="text-sm">Kasur</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer">
                        <input type="checkbox" name="fasilitas[]" value="lemari" class="mr-3 text-blue-600 focus:ring-blue-500">
                        <div class="flex items-center">
                            <i class="fas fa-archive text-brown-500 mr-2"></i>
                            <span class="text-sm">Lemari</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer">
                        <input type="checkbox" name="fasilitas[]" value="meja_belajar" class="mr-3 text-blue-600 focus:ring-blue-500">
                        <div class="flex items-center">
                            <i class="fas fa-desk text-yellow-500 mr-2"></i>
                            <span class="text-sm">Meja Belajar</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer">
                        <input type="checkbox" name="fasilitas[]" value="tv" class="mr-3 text-blue-600 focus:ring-blue-500">
                        <div class="flex items-center">
                            <i class="fas fa-tv text-red-500 mr-2"></i>
                            <span class="text-sm">TV</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer">
                        <input type="checkbox" name="fasilitas[]" value="kulkas" class="mr-3 text-blue-600 focus:ring-blue-500">
                        <div class="flex items-center">
                            <i class="fas fa-refrigerator text-cyan-500 mr-2"></i>
                            <span class="text-sm">Kulkas</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Upload Foto -->
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-camera text-white text-sm"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Foto Unit</h3>
                </div>

                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-gray-400 transition-colors">
                    <div class="space-y-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mx-auto">
                            <i class="fas fa-cloud-upload-alt text-gray-400 text-xl"></i>
                        </div>
                        <div>
                            <label for="foto_unit" class="cursor-pointer">
                                <span class="text-blue-600 hover:text-blue-700 font-medium">Klik untuk upload foto</span>
                                <span class="text-gray-500"> atau drag & drop</span>
                            </label>
                            <input type="file" id="foto_unit" name="foto_unit[]" multiple accept="image/*" class="hidden">
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 10MB (maksimal 5 foto)</p>
                    </div>
                </div>

                <!-- Image Preview -->
                <div id="imagePreview" class="image-preview"></div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                    <button type="button" onclick="goBack()"
                            class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-medium">
                        <i class="fas fa-times mr-2"></i>Batal
                    </button>
                    <button type="button" onclick="saveDraft()"
                            class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200 font-medium">
                        <i class="fas fa-save mr-2"></i>Simpan Draft
                    </button>
                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 font-medium transform hover:scale-105 shadow-lg">
                        <i class="fas fa-check mr-2"></i>Tambah Unit
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // File upload preview
        document.getElementById('foto_unit').addEventListener('change', function(e) {
            const files = e.target.files;
            const preview = document.getElementById('imagePreview');
            
            if (files.length > 0) {
                preview.style.display = 'grid';
                preview.innerHTML = '';
                
                Array.from(files).slice(0, 5).forEach((file, index) => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const div = document.createElement('div');
                            div.className = 'image-item';
                            div.innerHTML = `
                                <img src="${e.target.result}" alt="Preview ${index + 1}">
                                <button type="button" class="remove-image" onclick="removeImage(this)">
                                    <i class="fas fa-times"></i>
                                </button>
                            `;
                            preview.appendChild(div);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });

        // Remove image
        function removeImage(button) {
            button.parentElement.remove();
            const preview = document.getElementById('imagePreview');
            if (preview.children.length === 0) {
                preview.style.display = 'none';
            }
        }

        // Form submission
        document.getElementById('tambahUnitForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading
            const submitBtn = e.target.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menambahkan...';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                alert('Unit berhasil ditambahkan!');
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                // Redirect to dashboard
                goBack();
            }, 2000);
        });

        // Save draft
        function saveDraft() {
            alert('Draft berhasil disimpan!');
        }

        // Go back
        function goBack() {
            if (confirm('Apakah Anda yakin ingin kembali? Data yang belum disimpan akan hilang.')) {
                window.history.back();
            }
        }

        // Format currency input
        document.getElementById('harga_bulanan').addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^\d]/g, '');
            if (value) {
                e.target.value = value;
            }
        });
    </script>

</body>
</html>