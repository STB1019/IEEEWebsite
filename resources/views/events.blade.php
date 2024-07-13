{{--
Renders all the events.
This section includes a events.
The events are displayed in a custom layout, a vertical timeline.

The last part of the code is needed for the mobile version of the page.

This page uses some components from the file preview.blade.php and as a consequence preview_parts.blade.php
--}}

@extends('layouts/master_hf')
@section('body')

    @php 
        $page_name="events";
    @endphp
    @include('components/navbar')
    <!-- Navbar -->

    @php  
        $title="Events";
    @endphp
    @include('components/hero')
    <!-- header -->

    <!-- Events Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Case Study</div>
                <h1 class="mb-4">Events</h1>
                <div class="wow fadeIn m-4 text-center">
                    <button id="old_hide" class="btn btn-sm border rounded-pill text-center" onclick="toggle_old()">Hide old events</button>
                </div>
            </div>
            
            {{-- Blue Line --}}
            <div class="row g-4">
                <div class="col-4 wow fadeIn">
                </div>
                <div class="col-4 wow fadeIn"  data-wow-delay="0.5s">
                    <h6 class="text-white border rounded-pill p-2 text-center" style="background-color: #1363c6;"></h6>
                </div>
                <div class="col-4 wow fadeIn">
                </div>
            </div>
            

            {{-- Event Section --}}
            <div class="row">
            @php
                $arr=$events_list;
            @endphp

            @for($i=0; $i < count($arr); $i++)

                {{-- Date Calculation --}}
                @php
                $date_s = $arr[$i]->date_start;
                $date_e = $arr[$i]->date_end;

                $date_s = date('d-M-Y', strtotime($date_s));
                $date_e = date('d-M-Y', strtotime($date_e));

                $grey = false;

                if (strtotime($date_e) >= strtotime(date('d-M-Y'))) {
                    $grey = true;
                }
                @endphp

                @if($grey == true)
                    </div><div class="row">
                @else
                    </div><div class="row" name="old" style="opacity: 0.4;">
                @endif

                @php
                    $id = $arr[$i] -> id;
                    $layout = $arr[$i] -> layout;
                    $desc = $arr[$i] -> description;
                    

                    if($i%2 != 0){
                        $type = "event_left";
                    }
                    else{
                        $type = "event_right";
                    }
                    
                    $shortdesc = $arr[$i]->description;
                    $title = $arr[$i]->title;


                    $img_path = "defaults/800x600_e.jpg";

                    foreach ($thumbnail_list as $thumbnail) {
                        if ($thumbnail->event_id == $id){
                            $img_path = $thumbnail->path;
                            break;
                        }
                    }
                
                    $img_path = str_replace('public/','',$img_path);

                    if(strlen($shortdesc) > 100){
                        $shortdesc = substr($shortdesc, 0, 100). "...";
                    }
                @endphp

                @include('components/preview')

            @endfor
            </div>
            {{-- End Blue Line --}}
            <div class="row g-4">
                <div class="col-4 wow fadeIn">
                </div>
                <div class="col-4 wow fadeIn"  data-wow-delay="0.5s">
                    <h6 class="text-white border rounded-pill p-2 text-center" style="background-color: #1363c6;"></h6>
                </div>
                <div class="col-4 wow fadeIn">
                </div>
            </div>
        </div>
    </div>
    <!-- Events End -->

    <script>
        function old_hide(){
            var x = document.getElementsByName("old");
            for (var i = 0; i < x.length; i++) {
                x[i].classList.add("d-none")
            }
        }

        function old_show(){
            var x = document.getElementsByName("old");
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("d-none")
            }
        }

        function toggle_old(){
            var x = document.getElementById("old_hide");
            if (x.innerHTML == "Hide old events"){
                x.innerHTML = "Show old events";
                old_hide();
            }
            else{
                x.innerHTML = "Hide old events";
                old_show();
            }
        }
    </script>
@endsection