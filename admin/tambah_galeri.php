<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $kategori = htmlspecialchars($_POST['kategori']);

    // Cek apakah pakai URL atau upload file
    $gambar_url = htmlspecialchars($_POST['gambar_url'] ?? '');
    
    if (!empty($gambar_url)) {
        $gambar = $gambar_url;
    } else {
        $gambar = upload('uploads/galeri/');
        if (!$gambar) {
            $gambar = 'https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=800';
        }
    }

    $query = "INSERT INTO galeri VALUES (NULL, '$judul', '$kategori', '$gambar', CURRENT_TIMESTAMP)";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'galeri.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
        </script>";
    }
}
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Tambah Foto Galeri</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Judul Foto</label>
                        <input type="text" name="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                        <select name="kategori" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Makkah">🕋 Makkah</option>
                            <option value="Madinah">🕌 Madinah</option>
                            <option value="Jamaah">👥 Jamaah</option>
                            <option value="Hotel">🏨 Fasilitas Hotel</option>
                            <option value="Lainnya">📷 Lainnya</option>
                        </select>
                    </div>
                </div>

                <!-- Opsi Gambar -->
                <div class="mb-6 mt-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-3">
                        <i class="fa-solid fa-image mr-2"></i>File Foto
                    </label>
                    
                    <!-- Tab Switch -->
                    <div class="flex gap-2 mb-4">
                        <button type="button" onclick="switchTab('upload')" id="tab-upload" class="px-4 py-2 rounded-lg bg-emerald text-white font-medium text-sm transition-colors">
                            <i class="fa-solid fa-upload mr-1"></i> Upload File
                        </button>
                        <button type="button" onclick="switchTab('url')" id="tab-url" class="px-4 py-2 rounded-lg bg-gray-300 text-gray-700 font-medium text-sm transition-colors">
                            <i class="fa-solid fa-link mr-1"></i> URL Internet
                        </button>
                    </div>

                    <!-- Upload File -->
                    <div id="input-upload" class="block">
                        <input type="file" name="gambar" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, WebP. Max 2MB</p>
                    </div>

                    <!-- URL Internet -->
                    <div id="input-url" class="hidden">
                        <input type="url" name="gambar_url" placeholder="https://images.unsplash.com/..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-xs text-gray-500 mt-1">Paste URL gambar dari internet (Unsplash, dll)</p>
                        
                        <!-- Contoh Gambar Galeri -->
                        <div class="mt-3">
                            <p class="text-xs font-bold text-gray-600 mb-2">Pilih Cepat (Galeri Umroh/Haji):</p>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" onclick="setImageUrl('https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=800')" class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded hover:bg-blue-200">Masjidil Haram 1</button>
                                <button type="button" onclick="setImageUrl('https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=800')" class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded hover:bg-blue-200">Ka'bah</button>
                                <button type="button" onclick="setImageUrl('https://images.unsplash.com/photo-1537633552985-df8429e8048b?q=80&w=800')" class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded hover:bg-green-200">Masjid Nabawi</button>
                                <button type="button" onclick="setImageUrl('https://images.unsplash.com/photo-1542816417-0983c9c9ad53?q=80&w=800')" class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded hover:bg-green-200">Madinah</button>
                                <button type="button" onclick="setImageUrl('https://images.unsplash.com/photo-1580418827493-f2b22c0a76cb?q=80&w=800')" class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded hover:bg-yellow-200">Haji</button>
                                <button type="button" onclick="setImageUrl('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800')" class="text-xs bg-purple-100 text-purple-700 px-2 py-1 rounded hover:bg-purple-200">Hotel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="submit" class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90 transition-colors">
                        Upload Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
function switchTab(type) {
    const uploadDiv = document.getElementById('input-upload');
    const urlDiv = document.getElementById('input-url');
    const tabUpload = document.getElementById('tab-upload');
    const tabUrl = document.getElementById('tab-url');
    
    if (type === 'upload') {
        uploadDiv.classList.remove('hidden');
        urlDiv.classList.add('hidden');
        tabUpload.classList.remove('bg-gray-300', 'text-gray-700');
        tabUpload.classList.add('bg-emerald', 'text-white');
        tabUrl.classList.remove('bg-emerald', 'text-white');
        tabUrl.classList.add('bg-gray-300', 'text-gray-700');
        document.querySelector('input[name="gambar_url"]').value = '';
    } else {
        uploadDiv.classList.add('hidden');
        urlDiv.classList.remove('hidden');
        tabUrl.classList.remove('bg-gray-300', 'text-gray-700');
        tabUrl.classList.add('bg-emerald', 'text-white');
        tabUpload.classList.remove('bg-emerald', 'text-white');
        tabUpload.classList.add('bg-gray-300', 'text-gray-700');
        document.querySelector('input[name="gambar"]').value = '';
    }
}

function setImageUrl(url) {
    document.querySelector('input[name="gambar_url"]').value = url;
}
</script>

</div>
</body>
</html>
