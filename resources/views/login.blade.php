{{--
Extends the 'layouts/master_hf' layout and defines the 'body' section.
Includes the 'navbar' and 'login' components, and sets up variables for the header.

This page is the login page for the website.
--}}
@extends('layouts/master_hf')
@section('body')

    @php 
    $page_name="login"
    @endphp 
    <!-- Navbar -->
    @include('components/navbar')

    @php
        //variables for header
        $title = "University of Brescia </br> Student Branch";
        $subtitle = "IEEE";
        $desc = "Empowering Innovation, Connecting Minds: Where Ideas Spark and Technology Thrives!";
    @endphp
    <!-- header -->
    @include('components/login')

@endsection