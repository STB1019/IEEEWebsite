
{{--
Renders the registration page for the University of Brescia IEEE Student Branch.

This view extends the 'layouts/master_hf' layout and includes the 'components/navbar' and 'components/register' components.
The register component that contains the registration form.
--}}
@extends('layouts/master_hf')
@section('body')

    @php 
    $page_name="Registration"
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
    @include('components/register')

@endsection