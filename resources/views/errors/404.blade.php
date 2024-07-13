{{--
View for the errors.

Some parameters can be passed to this view for customs error messages and codes.
--}}
@extends('layouts/master_hf')
@section('body')
    @php
    if(isset($error_code) && isset($error_desc_1) && isset($error_desc_2)){
        $page_name = $error_code;
        $title = $error_code;
    }else{
        $page_name = 'Error';
        $title = 'Error';
        $error_code = '?';
        $error_desc_1 = '?';
        $error_desc_2 = 'We\'re sorry, an unexpected error has occurred. Please try again later.';
    }

    @endphp

    @include('components.navbar')
    @include('components.hero')


    <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">{{$error_code}}</h1>
                    <h1 class="mb-4">{{$error_desc_1}}</h1>
                    <p class="mb-4">{{$error_desc_2}}</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{url('/')}}">Go Back To Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Error End -->

@endsection