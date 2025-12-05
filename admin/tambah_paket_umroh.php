<?php
/**
 * ============================================
 * ADD UMRAH PACKAGE - Gold Standard
 * ============================================
 * - PDO Prepared Statements
 * - CSRF Protection
 * - Secure File Upload
 * - XSS Prevention
 * - Sticky Form Inputs
 */

require_once 'includes/header.php';

$errors = [];
$success = false;
$formData = [
    'nama_paket' => '',
    'deskripsi' => '',
    'durasi' => '',
    'harga' => '',
    'keberangkatan' => '',
    'pesawat' => '',
    'hotel_makkah' => '',
    'hotel_madinah' => '',
    'is_featured' => false,
];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    Security::requireCsrf();

    // Sanitize and validate inputs
    $formData = [
        'nama_paket'    => Security::sanitize($_POST['nama_paket'] ?? ''),
        'deskripsi'     => Security::sanitize($_POST['deskripsi'] ?? ''),
        'durasi'        => Security::sanitize($_POST['durasi'] ?? ''),
        'harga'         => filter_var($_POST['harga'] ?? 0, FILTER_VALIDATE_FLOAT),
        'keberangkatan' => Security::sanitize($_POST['keberangkatan'] ?? ''),
        'pesawat'       => Security::sanitize($_POST['pesawat'] ?? ''),
        'hotel_makkah'  => Security::sanitize($_POST['hotel_makkah'] ?? ''),
        'hotel_madinah' => Security::sanitize($_POST['hotel_madinah'] ?? ''),
        'is_featured'   => isset($_POST['is_featured']) ? 1 : 0,
    ];

    // Validation
    if (empty($formData['nama_paket'])) {
        $errors[] = 'Nama paket harus diisi.';
    }
    if (empty($formData['durasi'])) {
        $errors[] = 'Durasi harus diisi.';
    }
    if ($formData['harga'] === false || $formData['harga'] <= 0) {
        $errors[] = 'Harga harus berupa angka yang valid.';
    }
    if (empty($formData['keberangkatan'])) {
        $errors[] = 'Tanggal keberangkatan harus diisi.';
    }

    // Handle image upload
    $gambar = '';
    if (!empty($_POST['gambar_url'])) {
        // Validate URL
        if (filter_var($_POST['gambar_url'], FILTER_VALIDATE_URL)) {
            $gambar = $_POST['gambar_url'];
        } else {
            $errors[] = 'URL gambar tidak valid.';
        }
    } elseif (!empty($_FILES['gambar']['name'])) {
        $uploader = new ImageUploader();
        $gambar = $uploader->upload($_FILES['gambar'], 'paket');
        
        if ($gambar === false) {
            $errors = array_merge($errors, $uploader->getErrors());
        }
    }

    // Insert if no errors
    if (empty($errors)) {
        $insertData = [
            'nama_paket'    => $formData['nama_paket'],
            'deskripsi'     => $formData['deskripsi'],
            'durasi'        => $formData['durasi'],
            'harga'         => $formData['harga'],
            'keberangkatan' => $formData['keberangkatan'],
            'pesawat'       => $formData['pesawat'],
            'hotel_makkah'  => $formData['hotel_makkah'],
            'hotel_madinah' => $formData['hotel_madinah'],
            'gambar'        => $gambar,
            'is_featured'   => $formData['is_featured'],
            'created_at'    => date('Y-m-d H:i:s'),
        ];

        $result = Database::insert('paket_umroh', $insertData);

        if ($result !== false) {
            Security::flash('success', 'Paket berhasil ditambahkan!');
            header('Location: paket_umroh.php');
            exit;
        } else {
            $errors[] = 'Gagal menyimpan data. Silakan coba lagi.';
        }
    }
}

include 'includes/sidebar.php';
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 text-3xl font-medium">Tambah Paket Umroh</h3>
            <a href="paket_umroh.php" class="text-gray-600 hover:text-gray-900">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <?php if (!empty($errors)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                <?php foreach ($errors as $error): ?>
                    <li><?= Security::e($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form method="POST" enctype="multipart/form-data">
                <!-- CSRF Token -->
                <?= Security::csrfField() ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Paket <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_paket" value="<?= Security::e($formData['nama_paket']) ?>" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Durasi <span class="text-red-500">*</span></label>
                        <input type="text" name="durasi" value="<?= Security::e($formData['durasi']) ?>" placeholder="contoh: 9 Hari 8 Malam" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="harga" value="<?= Security::e((string)$formData['harga']) ?>" required min="0" step="1000"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Keberangkatan <span class="text-red-500">*</span></label>
                        <input type="date" name="keberangkatan" value="<?= Security::e($formData['keberangkatan']) ?>" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Pesawat</label>
                        <input type="text" name="pesawat" value="<?= Security::e($formData['pesawat']) ?>" placeholder="contoh: Garuda Indonesia" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Makkah</label>
                        <input type="text" name="hotel_makkah" value="<?= Security::e($formData['hotel_makkah']) ?>" placeholder="contoh: Hilton Suites Makkah" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Madinah</label>
                        <input type="text" name="hotel_madinah" value="<?= Security::e($formData['hotel_madinah']) ?>" placeholder="contoh: Pullman Zamzam Madinah" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Gambar (Upload File)</label>
                        <input type="file" name="gambar" accept="image/jpeg,image/png,image/webp" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                        <p class="text-xs text-gray-500 mt-1">Max 5MB. Format: JPG, PNG, WebP</p>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Atau URL Gambar</label>
                        <input type="url" name="gambar_url" placeholder="https://example.com/gambar.jpg" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" placeholder="Deskripsi paket umrah..." 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald"><?= Security::e($formData['deskripsi']) ?></textarea>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" class="form-checkbox h-5 w-5 text-emerald" <?= $formData['is_featured'] ? 'checked' : '' ?>>
                            <span class="ml-2 text-gray-700">Tampilkan di Homepage (Featured)</span>
                        </label>
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="bg-emerald text-white px-6 py-2 rounded-lg hover:bg-emerald/90 transition-colors">
                        <i class="fa-solid fa-save mr-2"></i> Simpan Paket
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

</div>
</body>
</html>
