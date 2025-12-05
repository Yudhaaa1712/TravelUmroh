<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $nama_paket = htmlspecialchars($_POST['nama_paket']);
    $tipe_haji = htmlspecialchars($_POST['tipe_haji']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $harga_usd = htmlspecialchars($_POST['harga_usd']);
    $estimasi = htmlspecialchars($_POST['estimasi']);
    $pesawat = htmlspecialchars($_POST['pesawat']);
    $hotel_makkah = htmlspecialchars($_POST['hotel_makkah']);
    $hotel_madinah = htmlspecialchars($_POST['hotel_madinah']);

    // Cek apakah pakai URL atau upload file
    $gambar_url = htmlspecialchars($_POST['gambar_url'] ?? '');
    
    if (!empty($gambar_url)) {
        $gambar = $gambar_url;
    } else {
        $gambar = upload('uploads/haji/');
        if (!$gambar) {
            $gambar = 'https://images.unsplash.com/photo-1580418827493-f2b22c0a76cb?q=80&w=800';
        }
    }

    $query = "INSERT INTO paket_haji VALUES (NULL, '$nama_paket', '$tipe_haji', '$deskripsi', '$harga_usd', '$estimasi', '$hotel_makkah', '$hotel_madinah', '$pesawat', '$gambar', CURRENT_TIMESTAMP)";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'paket_haji.php';
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
        <h3 class="text-gray-700 text-3xl font-medium mb-6">Tambah Paket Haji</h3>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Paket</label>
                        <input type="text" name="nama_paket" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tipe Haji</label>
                        <select name="tipe_haji" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Plus">🕋 Haji Plus (Kuota)</option>
                            <option value="Furoda">⭐ Haji Furoda (Mujamalah)</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Harga (USD)</label>
                        <input type="number" name="harga_usd" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Estimasi Keberangkatan</label>
                        <input type="text" name="estimasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: 5-7 Tahun / Langsung Berangkat" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Maskapai Pesawat</label>
                        <input type="text" name="pesawat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Makkah</label>
                        <input type="text" name="hotel_makkah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Madinah</label>
                        <input type="text" name="hotel_madinah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>

                <!-- Opsi Gambar -->
                <div class="mb-6 mt-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-3">
                        <i class="fa-solid fa-image mr-2"></i>Gambar Paket
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
                        
                        <!-- Contoh Gambar Haji -->
                        <div class="mt-3">
                            <p class="text-xs font-bold text-gray-600 mb-2">Pilih Cepat (Haji & Umroh):</p>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" onclick="setImageUrl('https://images.unsplash.com/photo-1580418827493-f2b22c0a76cb?q=80&w=800')" class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded hover:bg-blue-200">Haji 1</button>
                                <button type="button" onclick="setImageUrl('https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=800')" class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded hover:bg-blue-200">Ka'bah</button>
                                <button type="button" onclick="setImageUrl('https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=800')" class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded hover:bg-blue-200">Masjidil Haram</button>
                                <button type="button" onclick="setImageUrl('https://images.unsplash.com/photo-1537633552985-df8429e8048b?q=80&w=800')" class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded hover:bg-green-200">Madinah</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Lengkap</label>
                    <textarea name="deskripsi" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="submit" class="bg-emerald text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-emerald/90 transition-colors">
                        Simpan Paket
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
