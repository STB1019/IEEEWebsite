{{--
This page contains infos and history about the branch.
--}}
@extends('layouts/master_hf')
@section('body')

    @php
        $page_name="about"
    @endphp 
    @include('components/navbar')
    <!-- Navbar -->

    @php 
        $title="About"
    @endphp 
    @include('components/hero')
    <!-- header -->


    @php 
    //include('components/search.php'); 
    @endphp
    <!-- Full Search -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
            <div class="col-1">
                </div>
                <div class="col-10 wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">About Us</div>
                    <h1 class="mb-4">The birth of the Brescia Student Branch</h1>
                    <p class="mb-4 justify">The <b>IEEE Student Branch in Brescia</b> was established in year 2016 by the initiative of 13 students
                    and 1 counselor, with the desire to integrate global research aspects into their studies. Since
                    1963, IEEE has been at the forefront of technological evolution.
                    </p>
                    <h4 class="mb-4">Student Branch IEEE: what, how, and why?</h4>
                    <p class="mb-4 justify">
                    As part of the Institute of Electrical and Electronics Engineers (IEEE), a worldwide reference 
                    for Information Technology (IT), the Student Branch IEEE (hereafter referred to as “Branch”) 
                    designs and implements activities for all students. The goal is to infuse a research-oriented
                    mindset into the academic and professional careers of each member. Rather than viewing scientific
                    research as a rigid and precise refutation method, we, as students, choose to apply the same
                    logical rigor we encounter in our coursework to the pursuit of innovation. During our free time, 
                    we delve deeper into topics covered in class, nurturing our knowledge through opportunities provided 
                    by the IEEE. By participating in national and international competitions and publishing scientific
                    articles on official IEEE channels, we challenge ourselves and push our limits.
                    The Branch provides a unique opportunity for members to engage in “research” on
                    par with IEEE colleagues worldwide, all while remaining fully immersed in the
                    academic environment. With the support of faculty and doctoral students, each
                    Branch member gains maximum benefit for their personal development.
                    </p>
                    <div>
                        <figure>
                        <img class="img-fluid rounded" src="img/IMG_4308.JPG">
                        <div class="btn btn-sm border rounded-pill px-3 mt-3">
                            <figcaption>The first 14 signatories for the establishment of the IEEE Student Branch in Brescia.</figcaption>
                        </div>
                        </figure>
                    </div>
                    

                    <i>Author: Andrea Rossi - Source: Original Branch Page (Edited)</i>
                </div>
                <div class="col-1">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-primary feature pt-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-1">
                </div>
                <div class="col-10 align-self-center mb-md-5 pb-md-5 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="text-white mb-4">How does the IEEE Student Branch work?</h1>
                    <p class="text-light mb-4 justify">
                    The IEEE Student Branch operates with complete autonomy, managing its own activities and projects. It's a student-driven
                    initiative where all members, internal committees, and project decisions are entrusted to the students. By statute, the
                    Counselor oversees the Branch, bridging the gap between the student IEEE reality represented by the Branch and the university
                    where it resides.</br></br>
                    While it may seem contradictory to declare total autonomy and then mention the presence of a Counselor, it actually provides
                    an additional opportunity to test ourselves, emulating a professional environment. As student members of the Branch, we operate 
                    on precise timelines and are accountable to the Counselor and the Executive Committee for achieving results.
                    Each year, all members take on projects and studies, ensuring that each member leads at least one project over the next 12 months. 
                    Committee members choose training and recruitment activities to foster continuous growth in terms of both membership and shared 
                    knowledge within the Branch. Of course, all activities and decisions are subject to adaptations to avoid burdening academic studies
                    and careers. We accomplish this with determination and our available free time. Branch members freely offer study support based on
                    their direct (and past) experiences, passing down acquired knowledge, enriching the cultural, professional, and scientific legacy
                    with each generation.
                    </p>
                    <div class="row g-4 pt-3">
                        <div class="col-sm-6">
                            <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                                <i class="fa fa-users fa-3x text-white"></i>
                                <div class="ms-3">
                                    <h2 class="text-white mb-0" data-toggle="counter-up">{{$n_members}}</h2>
                                    <p class="text-white mb-0">Registered Members</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                                <i class="fa fa-check fa-3x text-white"></i>
                                <div class="ms-3">
                                    <h2 class="text-white mb-0" data-toggle="counter-up">{{$n_project}}</h2>
                                    <p class="text-white mb-0">Projects</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 align-self-end text-center text-md-end wow fadeIn" data-wow-delay="0.5s">
                        <img class="img-fluid" src="img/feature.png" alt="">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Feature End -->
@endsection