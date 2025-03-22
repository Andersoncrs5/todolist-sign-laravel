<div>
    @if (session('msg'))
        <script>
            alert("{{ session('msg') }}");
            console.log(`Alerta: ${session('msg')}`)
        </script>
    @endif
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
            console.log(`Alerta: ${session('error')}`)
        </script>
    @endif
    @if (session('warning'))
        <script>
            alert("{{ session('error') }}");
            console.log(`Alerta: ${session('error')}`)
        </script>
    @endif
</div>
