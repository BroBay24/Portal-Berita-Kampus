<!-- Footer -->
<footer class="bg-gray-900 text-white">
    <!-- Main Footer Content -->
    <div class="px-4 md:px-10 lg:px-14 py-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Brand Section -->
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/css/img/LogUkdc.png') }}" alt="Logo" class="w-10 h-10">
                    <span class="text-xl font-bold">Kabar Kampus</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Portal berita kampus yang menyediakan informasi terkini dan terpercaya dari Universitas Dian Cipta Cendikia.
                </p>
                <div class="flex gap-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-primary transition" title="Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary transition" title="Instagram">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.117.6c-.588.147-1.079.355-1.556.832-.477.477-.685.968-.832 1.556-.266.788-.467 1.658-.527 2.936C1.031 8.333 1.016 8.74 1.016 12c0 3.26.015 3.667.072 4.947.06 1.277.261 2.148.527 2.936.147.588.355 1.079.832 1.556.477.477.968.685 1.556.832.788.266 1.658.467 2.936.527C8.333 22.969 8.74 22.984 12 22.984c3.26 0 3.667-.015 4.947-.072 1.277-.06 2.148-.261 2.936-.527.588-.147 1.079-.355 1.556-.832.477-.477.685-.968.832-1.556.266-.788.467-1.658.527-2.936.057-1.28.072-1.687.072-4.947 0-3.26-.015-3.667-.072-4.947-.06-1.277-.261-2.148-.527-2.936-.147-.588-.355-1.079-.832-1.556-.477-.477-.968-.685-1.556-.832-.788-.266-1.658-.467-2.936-.527C15.667 1.031 15.26 1.016 12 1.016zm0 2.032c3.203 0 3.585.015 4.85.07 1.17.054 1.805.25 2.228.415.561.217.96.477 1.382.899.422.422.682.82.899 1.382.165.423.361 1.057.415 2.228.055 1.265.07 1.647.07 4.85 0 3.203-.015 3.585-.07 4.85-.054 1.17-.25 1.805-.415 2.228-.217.561-.477.96-.899 1.382-.422.422-.82.682-1.382.899-.423.165-1.057.361-2.228.415-1.265.055-1.647.07-4.85.07-3.203 0-3.585-.015-4.85-.07-1.17-.054-1.805-.25-2.228-.415-.561-.217-.96-.477-1.382-.899-.422-.422-.682-.82-.899-1.382-.165-.423-.361-1.057-.415-2.228-.055-1.265-.07-1.647-.07-4.85 0-3.203.015-3.585.07-4.85.054-1.17.25-1.805.415-2.228.217-.561.477-.96.899-1.382.422-.422.82-.682 1.382-.899.423-.165 1.057-.361 2.228-.415 1.265-.055 1.647-.07 4.85-.07z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary transition" title="Twitter">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 002.856-3.715v-.757h-2.828c.981 1.5 1.6 3.303 1.972 5.15.23 1.18-.288 2.417-1.313 3.27-.68.56-1.676.93-2.886.93-.879 0-1.781-.196-2.57-.558-1.15.572-2.458.970-3.815 1.12-1.121.147-2.306.144-3.454-.023-2.417-.328-4.587-1.575-5.989-3.43-1.403 1.855-3.574 3.102-5.989 3.43 1.148.167 2.333.17 3.454.023 1.357-.15 2.665-.548 3.815-1.12.789.362 1.691.558 2.57.558 1.21 0 2.206-.37 2.886-.93 1.025-.853 1.543-2.09 1.313-3.27-.372-1.847-.99-3.65-1.972-5.15z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-bold text-lg mb-6">Navigasi</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('landing') }}" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                    @foreach (\App\Models\NewsCategory::all()->take(4) as $category)
                        <li><a href="{{ route('category.show', $category->slug) }}" class="text-gray-400 hover:text-white transition">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h4 class="font-bold text-lg mb-6">Kategori</h4>
                <ul class="space-y-3">
                    @foreach (\App\Models\NewsCategory::all() as $category)
                        <li><a href="{{ route('category.show', $category->slug) }}" class="text-gray-400 hover:text-white transition">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact & Info -->
            <div>
                <h4 class="font-bold text-lg mb-6">Kontak</h4>
                <ul class="space-y-3">
                    <li class="text-gray-400 text-sm">
                        <span class="font-medium">Email:</span><br>
                        info@ukdc.ac.id
                    </li>
                    <li class="text-gray-400 text-sm">
                        <span class="font-medium">Telepon:</span><br>
                        (024) 1234 5678
                    </li>
                    <li class="text-gray-400 text-sm">
                        <span class="font-medium">Alamat:</span><br>
                        Jl. Universitas No. 1, Kota
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-gray-800">
        <div class="px-4 md:px-10 lg:px-14 py-6">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4 text-gray-400 text-sm">
                <p>&copy; 2025 Kabar Kampus. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                    <a href="#" class="hover:text-white transition">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>
