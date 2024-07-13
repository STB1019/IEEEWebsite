{{--
Extends the master layout and includes the hero_small and edit components.

This page is used for editing existing news, events, and projects.
--}}
@extends('layouts/master_h')

{{-- it requires var $title --}}

@section('body')
    
    @include('components/hero_small')
 
    @include('components/edit')
    
@endsection
