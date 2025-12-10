{{--
    Alpine.js x-data for theme management.
    Usage: Add this to a body tag's x-data attribute by including as a string.
    Example: <body x-data="themeData()">
--}}
theme: localStorage.getItem('theme') || 'system', init() { this.$watch('theme', (val) => { localStorage.setItem('theme',
val) this.updateTheme() }) window .matchMedia('(prefers-color-scheme: dark)') .addEventListener('change', () => { if
(this.theme === 'system') this.updateTheme() }) }, updateTheme() { let isDark = this.theme === 'dark' || (this.theme ===
'system' && window.matchMedia('(prefers-color-scheme: dark)').matches) document.documentElement.classList.toggle('dark',
isDark) },
