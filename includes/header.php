<?php require_once __DIR__ . '/../config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - Ababil Tour & Hajj' : 'Ababil Tour & Hajj - Perjalanan Ibadah Nyaman & Aman'; ?></title>
    <meta name="description" content="<?php echo isset($pageDesc) ? $pageDesc : 'Melayani perjalanan ibadah Umroh dan Haji dengan pelayanan prima, amanah, dan profesional sejak 2010. Kenyamanan Anda adalah prioritas kami.'; ?>">
    
    <!-- DNS Prefetch & Preconnect for faster loading -->
    <link rel="dns-prefetch" href="//cdn.tailwindcss.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//images.unsplash.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Critical CSS Inline for faster first paint -->
    <style>
        body{margin:0;font-family:'Inter',sans-serif;background:#f9fafb}
        .loading-placeholder{background:linear-gradient(90deg,#f0f0f0 25%,#e0e0e0 50%,#f0f0f0 75%);background-size:200% 100%;animation:shimmer 1.5s infinite}
        @keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}
    </style>
    
    <!-- Google Fonts - Preload critical font -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome - Defer non-critical -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    
    <!-- AOS Animation - Defer -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: {
                            DEFAULT: '#C5A028',
                            light: '#FCF6BA',
                            dark: '#B38728',
                            metallic: '#D4AF37',
                        },
                        emerald: {
                            deep: '#064E3B',
                            darker: '#022c22',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    backgroundImage: {
                        'gold-gradient': 'linear-gradient(135deg, #BF953F 0%, #FCF6BA 25%, #B38728 50%, #FBF5B7 75%, #AA771C 100%)',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans text-gray-700 bg-gray-50 antialiased overflow-x-hidden">

<!-- Navbar -->
<header class="fixed w-full z-50 transition-all duration-300 glass-gold shadow-lg">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="index.php" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-gold-dark to-gold-light rounded-full flex items-center justify-center text-white shadow-lg group-hover:rotate-12 transition-transform duration-500 border-2 border-white">
                        <i class="fa-solid fa-kaaba text-2xl"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif text-2xl font-bold text-emerald-deep tracking-wide leading-none">Ababil<span class="text-gold-dark">Tour</span></span>
                        <span class="text-[10px] tracking-[0.2em] text-gold-dark uppercase font-semibold">Luxury Travel</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-8">
                <?php
                $current_page = basename($_SERVER['PHP_SELF']);
                $menu_items = [
                    'index.php' => 'Beranda',
                    'tentang-kami.php' => 'Tentang Kami',
                    'paket.php' => 'Paket Umroh',
                    'haji.php' => 'Haji',
                    'galeri.php' => 'Galeri',
                    'testimoni.php' => 'Testimoni',
                    'blog.php' => 'Blog',
                    'kontak.php' => 'Kontak'
                ];

                foreach ($menu_items as $link => $title) {
                    $active_class = ($current_page == $link) ? 'text-gold-dark font-bold border-b-2 border-gold-dark' : 'text-emerald-deep hover:text-gold-dark transition-colors';
                    echo "<a href=\"$link\" class=\"text-sm uppercase tracking-widest font-medium py-2 $active_class\">$title</a>";
                }
                ?>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-emerald-deep hover:text-gold-dark focus:outline-none">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gold-light shadow-xl absolute w-full">
        <div class="px-4 pt-2 pb-6 space-y-1">
            <?php
            foreach ($menu_items as $link => $title) {
                $active_class = ($current_page == $link) ? 'text-gold-dark font-bold bg-yellow-50' : 'text-gray-600 hover:text-gold-dark hover:bg-yellow-50';
                echo "<a href=\"$link\" class=\"block px-3 py-3 rounded-md text-base font-medium $active_class\">$title</a>";
            }
            ?>
        </div>
    </div>
</header>

<!-- Spacer for fixed header -->
<div class="h-24"></div>
