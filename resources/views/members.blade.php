{{--
Renders all the members in a page.

The page displays a list of all association members, including their names and positions.

Note: this page does not include any kind of pagination for developer's choice.
--}}
@extends('layouts/master_hf')
@section('body')

    @php 
        $page_name="members";
    @endphp 
    @include('components/navbar')
    <!-- Navbar -->

    @php 
        $title="Members";
    @endphp 
    @include('components/hero')
    <!-- header -->

    <!-- Team Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Our Team</div>
                    <h1 class="mb-4">Meet All the Association Members</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                        amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus
                        clita duo justo et tempor eirmod magna dolore erat amet</p>
                </div>
                <div class="col-lg-12">
                    <div class="row g-4">
                        @for ($i=0; $i < sizeof($members_list); $i++)
                            @php
                                $t = 0;
                                $wow_delay=($i*0.01);
                                $name = $members_list[$i]->name;
                                $position = $members_list[$i]->position;
                                $img = "defaults/team-1.jpg";
                                
                                if($members_list[$i]->image != null){
                                    $img = str_replace('public/','',$members_list[$i]->image);
                                }
                            @endphp
                            @include("components/member_card")
                        @endfor
                        <!-- Member card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection