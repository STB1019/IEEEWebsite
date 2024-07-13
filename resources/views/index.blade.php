{{--
Homepage of the website

The homepage of the website displays a brief introduction about the organization and is translated into 2 languages.
(Italian and English)
--}}
@extends('layouts/master_hf')

@php
    //Indicates the name of the php file containing the language strings
    $lang = 'index';
@endphp

@section('body')

    {{-- Some variables are obtained from the controller --}}

    <!-- Navbar -->
    @include('components/navbar', ['lang' => $lang])

    <!-- header -->
    @include('components/hero_big', ['lang' => $lang])

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="img/about-img.jpg">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">@lang($lang.'.about_us')</div>
                    <h1 class="mb-4">@lang($lang.'.about_title')</h1>
                    <p class="mb-4 justify">@lang($lang.'.about_desc')</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>@lang($lang.'.about_desc1')</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>@lang($lang.'.about_desc2')</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>@lang($lang.'.about_desc3')</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>@lang($lang.'.about_desc4')</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn btn-primary rounded-pill px-4 me-3" href="{{ 'about' }}">@lang($lang.'.read_more')</a>
                        <a class="btn btn-outline-primary btn-square me-3" href="https://www.instagram.com/ieee.sb.brescia/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">@lang($lang.'.our_proj')</div>
                    <h1 class="mb-4">@lang($lang.'.proj_fields')</h1>
                    <p class="mb-4 justify">@lang($lang.'.proj_desc')</p>
                    <a class="btn btn-primary rounded-pill px-4" href="{{ 'about' }}">@lang($lang.'.read_more')</a>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa fa-robot fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">@lang($lang.'.ro')</h5>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa fa-microchip fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">@lang($lang.'.el')</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-md-4">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa fa-desktop fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">@lang($lang.'.cs')</h5>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa fa-brain fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">@lang($lang.'.ml')</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-primary feature pt-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-6 align-self-center mb-md-5 pb-md-5 wow fadeIn" data-wow-delay="0.3s">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">@lang($lang.'.join_us')</div>
                    <h1 class="text-white mb-4">@lang($lang.'.acquire_know')</h1>
                    <p class="text-light mb-4">@lang($lang.'.work_team')</p>
                    <div class="row g-4 pt-3">
                        <div class="col-sm-6">
                            <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                                <i class="fa fa-users fa-3x text-white"></i>
                                <div class="ms-3">
                                    <h2 class="text-white mb-0" data-toggle="counter-up">{{$n_members}}</h2>
                                    <p class="text-white mb-0">@lang($lang.'.reg_members')</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                                <i class="fa fa-check fa-3x text-white"></i>
                                <div class="ms-3">
                                    <h2 class="text-white mb-0" data-toggle="counter-up">{{$n_project}}</h2>
                                    <p class="text-white mb-0">@lang($lang.'.projects')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-end text-center text-md-end wow fadeIn" data-wow-delay="0.5s">
                    <img class="img-fluid" src="img/feature.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Team Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">@lang($lang.'.our_team')</div>
                    <h1 class="mb-4">@lang($lang.'.exec_members')</h1>
                    <p class="mb-4 justify">@lang($lang.'.exec_desc')</p>
                    <a class="btn btn-primary rounded-pill px-4" href="{{ 'members' }}">@lang($lang.'.see_all')</a>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        
                        @php
                            $names = [
                                "Jacopo Tedeschi",
                                "Marco Corrazina",
                                "Matteo Boniotti",
                                "Elena Tonini",
                                "Mirko Rossi"
                            ];

                            $titles = [
                                "Chair",
                                "Vice Chair",
                                "Secretary",
                                "Webmaster",
                                "Treasurer"
                            ];
                            
                        @endphp
                        @for ($i=0; $i < sizeof($names); $i++)
                            @php
                                $t = 1;
                                $wow_delay=($i*0.01);
                                $name = $names[$i];
                                $position = $titles[$i];

                                $img = "defaults/team-1.jpg";
                            @endphp
                            @include("components/member_card")
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection