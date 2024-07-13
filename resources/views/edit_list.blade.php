{{--
This page is called when the user needs to select with news, project, event, or member to be edited.
--}}
@extends('layouts/master_h')

{{-- it requires var $title --}}

@section('body')

    {{-- @include('components/spinner') --}}
    
    @php 
        $type=strtolower($title)
    @endphp 
    @include('components/hero_small')

    @include('components/edit_list')
    
@endsection
