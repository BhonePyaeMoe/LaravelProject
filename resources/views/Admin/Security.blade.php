@if(!session('data') || session('data.Type_ID') == '3')
<script>
    window.location = "{{ route('AReturn') }}"
</script>
@endif