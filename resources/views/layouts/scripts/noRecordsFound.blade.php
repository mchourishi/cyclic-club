@section('inline-js')
    @parent
    <script>
        $(document).ready(function () {
            $('.table').text('No records found.');
        });
    </script>
@endsection
