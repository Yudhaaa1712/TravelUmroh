<?php
session_start();
require '../koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM admins WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Ababil Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#C5A028',
                        emerald: '#064E3B',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center font-sans">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border-t-4 border-gold">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-emerald mb-2">Admin Login</h1>
            <p class="text-gray-500 text-sm">Masuk untuk mengelola konten website</p>
        </div>

        <?php if (isset($error)) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">Username atau password salah!</span>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-gold focus:border-transparent" id="username" name="username" type="text" placeholder="Username" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-gold focus:border-transparent" id="password" name="password" type="password" placeholder="******************" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="w-full bg-emerald hover:bg-emerald/90 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition-colors" type="submit" name="login">
                    Masuk
                </button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <a href="../index.php" class="text-sm text-gray-500 hover:text-gold">Kembali ke Website</a>
        </div>
    </div>

</body>
</html>
