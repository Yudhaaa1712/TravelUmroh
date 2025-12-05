<div id="ai-chat-widget" class="fixed bottom-8 right-8 z-50 font-sans">
    <!-- Chat Window -->
    <div id="chat-window" class="hidden absolute bottom-20 right-0 w-80 md:w-96 bg-white rounded-2xl shadow-2xl overflow-hidden border border-gold/30 transform origin-bottom-right transition-all duration-300 scale-95 opacity-0 flex flex-col max-h-[600px]">
        <!-- Header -->
        <div class="bg-gold-gradient p-4 flex items-center justify-between shadow-md flex-shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-sm border border-white/30">
                    <i class="fa-solid fa-robot text-white text-lg"></i>
                </div>
                <div>
                    <h3 class="font-bold text-emerald-deep text-sm">Ababil Smart AI</h3>
                    <p class="text-emerald-deep/80 text-xs flex items-center gap-1">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span> Online 24/7
                    </p>
                </div>
            </div>
            <button id="close-chat" class="text-emerald-deep hover:text-white transition-colors">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <!-- Chat Body -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 bg-gray-50 space-y-4 min-h-[300px]">
            <!-- Welcome Message -->
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-gold-gradient flex items-center justify-center flex-shrink-0 shadow-sm">
                    <i class="fa-solid fa-robot text-emerald-deep text-xs"></i>
                </div>
                <div class="bg-white p-3 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 text-sm text-gray-700 max-w-[85%] leading-relaxed">
                    Assalamualaikum! Saya AI pintar dari Ababil Tour. <br><br>
                    Saya bisa menjawab pertanyaan seputar:
                    <ul class="list-disc ml-4 mt-1 mb-1">
                        <li>Harga & Paket Umroh</li>
                        <li>Fasilitas Hotel & Pesawat</li>
                        <li>Syarat Pendaftaran</li>
                        <li>Jadwal Keberangkatan</li>
                    </ul>
                    Silakan tanya apa saja!
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-4 bg-white border-t border-gray-100 flex-shrink-0">
            <form id="chat-form" class="flex gap-2" onsubmit="handleChatSubmit(event)">
                <input type="text" id="chat-input" placeholder="Tanya sesuatu..." class="flex-1 bg-gray-50 border border-gray-200 rounded-full px-4 py-2 text-sm focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold transition-all">
                <button type="submit" class="w-10 h-10 rounded-full bg-emerald-deep text-white flex items-center justify-center hover:bg-emerald-800 transition-colors shadow-md">
                    <i class="fa-solid fa-paper-plane text-sm"></i>
                </button>
            </form>
            <div class="text-center mt-2">
                <p class="text-[10px] text-gray-400">AI dapat membuat kesalahan. Cek info penting.</p>
            </div>
        </div>
    </div>

    <!-- Toggle Button -->
    <button id="chat-toggle" class="w-16 h-16 bg-emerald-deep text-white rounded-full shadow-[0_0_20px_rgba(4,120,87,0.3)] flex items-center justify-center hover:bg-emerald-800 transition-all transform hover:scale-110 relative border-4 border-white z-50">
        <span class="absolute inline-flex h-full w-full rounded-full bg-emerald-deep opacity-20 animate-ping"></span>
        <i class="fa-solid fa-robot text-3xl relative z-10"></i>
    </button>
</div>

<script>
    // --- Configuration & Knowledge Base ---
    const knowledgeBase = [
        {
            keywords: ['harga', 'biaya', 'tarif', 'bayar', 'budget', 'cost', 'duit'],
            response: "Untuk **Paket Reguler (9 Hari)** harga mulai **Rp 28.5 Juta**. <br>Untuk **Paket VIP (12 Hari)** mulai **Rp 35.9 Juta**. <br>Harga sudah *All-In* termasuk perlengkapan, visa, dan handling airport."
        },
        {
            keywords: ['hotel', 'penginapan', 'kamar', 'lokasi hotel', 'jarak'],
            response: "Kami mengutamakan kenyamanan. <br>🕋 **Makkah**: Anjum Hotel / Zamzam Tower (Bintang 5, pelataran Masjid). <br>🕌 **Madinah**: Rove Hotel (50m dari Masjid Nabawi)."
        },
        {
            keywords: ['pesawat', 'penerbangan', 'maskapai', 'terbang', 'flight'],
            response: "Kami menggunakan maskapai premium **Saudi Airlines** atau **Garuda Indonesia** dengan rute *Direct* (Langsung) tanpa transit, sehingga perjalanan lebih nyaman dan tidak melelahkan."
        },
        {
            keywords: ['syarat', 'dokumen', 'daftar', 'ktp', 'paspor', 'registrasi'],
            response: "Syarat pendaftaran cukup mudah: <br>1. Paspor asli (masa berlaku min. 7 bulan) <br>2. Buku Vaksin Meningitis <br>3. KTP & KK Asli <br>4. Pas Foto background putih. <br>Tim kami siap membantu pengurusan dokumen!"
        },
        {
            keywords: ['jadwal', 'tanggal', 'kapan', 'berangkat', 'waktu', 'bulan'],
            response: "Keberangkatan terdekat kami: <br>📅 **15 Agustus 2025** (Sisa 5 Seat) <br>📅 **20 September 2025** (VIP) <br>📅 **10 Oktober 2025** (Plus Turki). <br>Sebaiknya booking sekarang sebelum kehabisan!"
        },
        {
            keywords: ['makan', 'konsumsi', 'menu', 'catering', 'rasa'],
            response: "Jangan khawatir soal makanan! Kami menyediakan **Full Board Menu Indonesia** (Prasmanan) 3x sehari. Cita rasa nusantara yang cocok dengan lidah jamaah Indonesia."
        },
        {
            keywords: ['pembimbing', 'muthawif', 'ustadz', 'guide', 'tour leader'],
            response: "Setiap keberangkatan didampingi oleh **Tour Leader** dari Jakarta dan **Muthawif** berpengalaman lulusan Timur Tengah yang bermukim di Saudi. Ibadah Anda akan dibimbing sesuai sunnah."
        },
        {
            keywords: ['lokasi', 'alamat', 'kantor', 'dimana', 'posisi', 'map'],
            response: "Kantor pusat kami ada di **Jl. Raya Condet No. 123, Kramat Jati, Jakarta Timur**. Buka setiap hari Senin-Sabtu pukul 08.00 - 17.00 WIB. Silakan mampir untuk konsultasi!"
        },
        {
            keywords: ['promo', 'diskon', 'potongan', 'murah', 'hemat'],
            response: "Saat ini ada **Promo Spesial** potongan Rp 1 Juta untuk pendaftaran grup minimal 5 orang. Hubungi CS kami untuk klaim promonya!"
        },
        {
            keywords: ['kontak', 'hubungi', 'wa', 'whatsapp', 'telpon', 'nomor', 'admin', 'cs', 'manusia', 'orang'],
            response: "Tentu, Anda bisa langsung terhubung dengan staf kami via WhatsApp: <br><a href='https://wa.me/6281261288354?text=Assalamualaikum%20saya%20ingin%20bertanya%20tentang%20paket%20umroh' target='_blank' class='text-emerald-600 font-bold underline'>Klik di sini untuk Chat WA</a>"
        },
        {
            keywords: ['assalamualaikum', 'halo', 'hai', 'pagi', 'siang', 'sore', 'malam', 'hi'],
            response: "Waalaikumsalam Warahmatullahi Wabarakatuh! Selamat datang di Ababil Tour. Ada yang bisa saya bantu jelaskan mengenai paket Umroh kami?"
        },
        {
            keywords: ['terima kasih', 'makasih', 'thanks', 'syukron'],
            response: "Sama-sama! Semoga Allah mudahkan niat suci Anda untuk ke Baitullah. Jika ada pertanyaan lain, jangan ragu untuk bertanya lagi ya."
        }
    ];

    const defaultResponse = "Maaf, saya belum mengerti pertanyaan spesifik itu. <br>Namun saya bisa jelaskan tentang **Harga**, **Hotel**, **Pesawat**, atau **Jadwal**. <br><br>Atau hubungi staf kami langsung via <a href='https://wa.me/6281261288354?text=Assalamualaikum%20saya%20ingin%20bertanya' target='_blank' class='text-emerald-600 font-bold underline'>WhatsApp</a>.";

    // --- Logic ---
    const chatWidget = document.getElementById('ai-chat-widget');
    const chatWindow = document.getElementById('chat-window');
    const chatToggle = document.getElementById('chat-toggle');
    const closeChat = document.getElementById('close-chat');
    const chatMessages = document.getElementById('chat-messages');
    const chatInput = document.getElementById('chat-input');

    function toggleChat() {
        if (chatWindow.classList.contains('hidden')) {
            chatWindow.classList.remove('hidden');
            setTimeout(() => {
                chatWindow.classList.remove('scale-95', 'opacity-0');
                chatWindow.classList.add('scale-100', 'opacity-100');
            }, 10);
            chatToggle.classList.add('scale-0');
            chatInput.focus();
        } else {
            chatWindow.classList.remove('scale-100', 'opacity-100');
            chatWindow.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                chatWindow.classList.add('hidden');
            }, 300);
            chatToggle.classList.remove('scale-0');
        }
    }

    chatToggle.addEventListener('click', toggleChat);
    closeChat.addEventListener('click', toggleChat);

    function addMessage(text, isUser = false) {
        const div = document.createElement('div');
        div.className = isUser ? 'flex items-end justify-end gap-3' : 'flex items-start gap-3';
        
        const avatar = isUser ? '' : `
            <div class="w-8 h-8 rounded-full bg-gold-gradient flex items-center justify-center flex-shrink-0 shadow-sm">
                <i class="fa-solid fa-robot text-emerald-deep text-xs"></i>
            </div>
        `;

        const bubble = `
            <div class="${isUser ? 'bg-emerald-deep text-white rounded-tr-none' : 'bg-white text-gray-700 rounded-tl-none border border-gray-100'} p-3 rounded-2xl shadow-sm text-sm max-w-[85%] leading-relaxed">
                ${text}
            </div>
        `;

        div.innerHTML = isUser ? bubble : avatar + bubble;
        chatMessages.appendChild(div);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function showTyping() {
        const div = document.createElement('div');
        div.id = 'typing-indicator';
        div.className = 'flex items-start gap-3';
        div.innerHTML = `
            <div class="w-8 h-8 rounded-full bg-gold-gradient flex items-center justify-center flex-shrink-0 shadow-sm">
                <i class="fa-solid fa-robot text-emerald-deep text-xs"></i>
            </div>
            <div class="bg-white p-3 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 text-sm text-gray-500">
                <div class="flex gap-1">
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></span>
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></span>
                </div>
            </div>
        `;
        chatMessages.appendChild(div);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function removeTyping() {
        const indicator = document.getElementById('typing-indicator');
        if (indicator) indicator.remove();
    }

    // Smart Matching Logic
    function findBestResponse(input) {
        const lowerInput = input.toLowerCase();
        let bestMatch = null;
        let maxScore = 0;

        knowledgeBase.forEach(item => {
            let score = 0;
            item.keywords.forEach(keyword => {
                if (lowerInput.includes(keyword)) {
                    score++;
                }
            });

            if (score > maxScore) {
                maxScore = score;
                bestMatch = item;
            }
        });

        return maxScore > 0 ? bestMatch.response : defaultResponse;
    }

    function getAIResponse(input) {
        showTyping();
        
        // Random delay between 1s and 2s to feel natural
        const delay = Math.floor(Math.random() * 1000) + 1000;

        setTimeout(() => {
            removeTyping();
            const response = findBestResponse(input);
            addMessage(response);
        }, delay);
    }

    function handleChatSubmit(e) {
        e.preventDefault();
        const text = chatInput.value.trim();
        if (!text) return;

        addMessage(text, true);
        chatInput.value = '';
        getAIResponse(text);
    }
</script>
