@extends('layouts.main')
@push('title')
<title>Home</title>
@endpush
@section('main-section')
<h1 @style([ 'background-color: pink' , 'font-weight: bold' , 'text-align:center' ])>
    Home page
</h1>
@endsection