@if(!session('data'))
<script>
    window.location = "{{ route('AReturn') }}"
</script>
@endif