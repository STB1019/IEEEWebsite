{{-- Master Layout with head and fooer components --}}
@extends('layouts/master')

@include('components/head') <!-- Head -->

@section('footer')
    @include('components/footer') <!-- Footer -->
@endsection