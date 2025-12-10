{{-- FOUC Prevention Script - Must be inline in head --}}
<script>
    // Immediately apply theme to avoid FOUC
    (function () {
        try {
            const theme = localStorage.getItem('theme') || 'system';
            const isDark =
                theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        } catch (e) {}
    })();
</script>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>
