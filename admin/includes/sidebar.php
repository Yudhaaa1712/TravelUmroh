        <!-- Sidebar -->
        <aside class="w-64 bg-emerald text-white flex-shrink-0 hidden md:flex flex-col">
            <div class="p-6 flex items-center gap-3 border-b border-white/10">
                <i class="fa-solid fa-kaaba text-2xl text-gold"></i>
                <span class="font-bold text-xl tracking-wide">Ababil Admin</span>
            </div>
            
            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-1 px-3">
                    <li>
                        <a href="index.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'bg-white/20 font-bold' : ''; ?>">
                            <i class="fa-solid fa-gauge w-5 text-center"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="pt-4 pb-2 px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Manajemen Paket</li>
                    <li>
                        <a href="paket_umroh.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors <?php echo (basename($_SERVER['PHP_SELF']) == 'paket_umroh.php') ? 'bg-white/20 font-bold' : ''; ?>">
                            <i class="fa-solid fa-plane-departure w-5 text-center"></i>
                            <span>Paket Umroh</span>
                        </a>
                    </li>
                    <li>
                        <a href="paket_haji.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors <?php echo (basename($_SERVER['PHP_SELF']) == 'paket_haji.php') ? 'bg-white/20 font-bold' : ''; ?>">
                            <i class="fa-solid fa-mosque w-5 text-center"></i>
                            <span>Paket Haji</span>
                        </a>
                    </li>
                    
                    <li class="pt-4 pb-2 px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Konten Website</li>
                    <li>
                        <a href="muthawif.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors <?php echo (basename($_SERVER['PHP_SELF']) == 'muthawif.php') ? 'bg-white/20 font-bold' : ''; ?>">
                            <i class="fa-solid fa-user-tie w-5 text-center"></i>
                            <span>Muthawif</span>
                        </a>
                    </li>
                    <li>
                        <a href="testimoni.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors <?php echo (basename($_SERVER['PHP_SELF']) == 'testimoni.php') ? 'bg-white/20 font-bold' : ''; ?>">
                            <i class="fa-solid fa-comments w-5 text-center"></i>
                            <span>Testimoni</span>
                        </a>
                    </li>
                    <li>
                        <a href="galeri.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors <?php echo (basename($_SERVER['PHP_SELF']) == 'galeri.php') ? 'bg-white/20 font-bold' : ''; ?>">
                            <i class="fa-solid fa-images w-5 text-center"></i>
                            <span>Galeri</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="p-4 border-t border-white/10">
                <a href="logout.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-600 transition-colors text-red-200 hover:text-white">
                    <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
