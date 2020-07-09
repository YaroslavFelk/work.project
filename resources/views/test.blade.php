@extends('layout.master')

@section('content')
    <main>
        <pre>
        </pre>

        <script type="text/javascript">
            var ar = <?php echo json_encode($demographic) ?>;
            console.log(ar)
        </script>
    </main>
@endsection
