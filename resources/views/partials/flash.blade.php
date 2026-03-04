@if (session('success'))
    <div class="fixed top-5 right-5 z-50 bg-emerald-50 border border-emerald-200 text-emerald-800 px-6 py-4 rounded-xl shadow-lg flex items-center space-x-3 animate-bounce-in">
        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span class="font-bold">{{ session('success') }}</span>
    </div>
    
    <script>
        setTimeout(() => {
            document.querySelector('.fixed').style.display = 'none';
        }, 3000);
    </script>
@endif