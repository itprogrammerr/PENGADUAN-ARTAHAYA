<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<script src="{{ asset('./assets/js/init-alpine.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
<script src="{{ asset('./assets/js/charts-lines.js') }} " defer></script>
<script src="{{ asset('./assets/js/charts-pie.js') }} " defer></script>
<script>
    const currentYear = new Date().getFullYear();
    document.getElementById('currentYear').textContent = currentYear;
</script>
