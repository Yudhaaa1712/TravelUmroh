<?php
/**
 * ============================================
 * EDIT UMRAH PACKAGE - Gold Standard
 * ============================================
 */

require_once 'includes/header.php';

// Validate and sanitize ID
$id = Security::validateId($_GET['id'] ?? 0);

if ($id === 0) {
    Security::flash('error', 'ID paket tidak valid.');
    header('Location: paket_umroh.php');
    exit;
}

// Fetch existing data with prepared statement
$paket = Database::selectOne(
    "SELECT * FROM paket_umroh WHERE id = :id",
    ['id' => $id]
);

if (!$paket) {
    Security::flash('error', 'Paket tidak ditemukan.');
    header('Location: paket_umroh.php');
    exit;
}

$errors = [];
$formData = $paket; // Pre-fill with existing data

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    Security::requireCsrf();

    // Sanitize inputs
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
        'gambar'        => $paket['gambar'], // Keep old image by default
    ];

    // Validation
    if (empty($formData['nama_paket'])) {
        $errors[] = 'Nama paket harus diisi.';
    }
    if ($formData['harga'] === false || $formData['harga'] <= 0) {
        $errors[] = 'Harga harus berupa angka yang valid.';
    }

    // Handle new image upload
    if (!empty($_FILES['gambar']['name']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $uploader = new ImageUploader();
        $newImage = $uploader->upload($_FILES['gambar'], 'paket');
        
        if ($newImage !== false) {
            // Delete old image if it's a local file
            if (!empty($paket['gambar']) && !preg_match('/^https?:\/\//', $paket['gambar'])) {
                ImageUploader::delete($paket['gambar']);
            }
            $formData['gambar'] = $newImage;
        } else {
            $errors = array_merge($errors, $uploader->getErrors());
        }
    }

    // Update if no errors
    if (empty($errors)) {
        $updateData = [
            'nama_paket'    => $formData['nama_paket'],
            'deskripsi'     => $formData['deskripsi'],
            'durasi'        => $formData['durasi'],
            'harga'         => $formData['harga'],
            'keberangkatan' => $formData['keberangkatan'],
            'pesawat'       => $formData['pesawat'],
            'hotel_makkah'  => $formData['hotel_makkah'],
            'hotel_madinah' => $formData['hotel_madinah'],
            'gambar'        => $formData['gambar'],
            'is_featured'   => $formData['is_featured'],
        ];

        $result = Database::update(
            'paket_umroh',
            $updateData,
            'id = :id',
            ['id' => $id]
        );

        if ($result) {
            Security::flash('success', 'Paket berhasil diperbarui!');
            header('Location: paket_umroh.php');
            exit;
        } else {
            $errors[] = 'Gagal memperbarui data. Silakan coba lagi.';
        }
    }
}

include 'includes/sidebar.php';
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 text-3xl font-medium">Edit Paket Umroh</h3>
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
                        <label class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="harga" value="<?= Security::e((string)$formData['harga']) ?>" required min="0" step="1000"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Durasi</label>
                        <input type="text" name="durasi" value="<?= Security::e($formData['durasi']) ?>" placeholder="contoh: 9 Hari" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Keberangkatan</label>
                        <input type="date" name="keberangkatan" value="<?= Security::e($formData['keberangkatan']) ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Pesawat</label>
                        <input type="text" name="pesawat" value="<?= Security::e($formData['pesawat']) ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Makkah</label>
                        <input type="text" name="hotel_makkah" value="<?= Security::e($formData['hotel_makkah']) ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Hotel Madinah</label>
                        <input type="text" name="hotel_madinah" value="<?= Security::e($formData['hotel_madinah']) ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Paket</label>
                        <?php if (!empty($formData['gambar'])): ?>
                            <img src="<?= Security::e(
                                preg_match('/^https?:\/\//', $formData['gambar']) 
                                    ? $formData['gambar'] 
                                    : '../' . $formData['gambar']
                            ) ?>" alt="Preview" class="w-32 h-32 object-cover rounded mb-2">
                        <?php endif; ?>
                        <input type="file" name="gambar" accept="image/jpeg,image/png,image/webp" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald"><?= Security::e($formData['deskripsi']) ?></textarea>
                </div>

                <div class="mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" class="form-checkbox h-5 w-5 text-emerald" 
                               <?= $formData['is_featured'] ? 'checked' : '' ?>>
                        <span class="ml-2 text-gray-700">Jadikan Featured (Tampil di Beranda)</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" class="bg-emerald text-white font-bold py-2 px-6 rounded-lg hover:bg-emerald/90 transition-colors">
                        <i class="fa-solid fa-save mr-2"></i> Update Paket
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</div>
</body>
</html>
