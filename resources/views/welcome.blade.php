@extends('layout.master')

@section('content')
    <main>
        @include('main.leftColumn')
        @include('main.datePicker')

        @include('main.data')
    </main>
@endsection

