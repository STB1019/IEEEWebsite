{{--
Extends the master layout and includes the hero_small and insert components.

This page is used for adding new news, events, and projects.
--}}
@extends('layouts/master_h')

{{-- it requires var $title --}}

@section('body')

    
    @include('components/hero_small')

    @php 
        $type=strtolower($title)
    @endphp 
    @include('components/insert')
@endsection

