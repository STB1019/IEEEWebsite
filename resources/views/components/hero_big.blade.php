<!-- Hero Start (Big Header)-->
<!-- needs a variable $title, $subtitle, $desc in the page -->

@if(isset($lang))
    @php
    $title = __($lang.".title");
    $subtitle = __($lang.".subtitle");
    $desc = __($lang.".desc");
    $read_more = __($lang.".read_more");
    @endphp
@endif

@php

function is_christmas(String $date): bool {
    $date = DateTime::createFromFormat('m-d', $date);
    return $date > DateTime::createFromFormat('m-d', '12-1') && $date < DateTime::createFromFormat('m-d', '12-31');
}

@endphp

<div class="container-fluid pt-5 bg-primary hero-header mb-5"<?php if(is_christmas(date("m-d"))) echo 'id="snow"';?>>
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-1">
            </div>
            <div class="d-none d-lg-block col-lg-4 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="img/IEEE.png" alt="">
                
            </div>
            
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight"><?php echo $subtitle?></div>
                <h1 class="display-4 text-white mb-4 animated slideInRight"><?php echo $title?></h1>
                <p class="text-white mb-4 animated slideInRight"><?php echo $desc?></p>
                <a href="{{ 'about' }}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight"><?php echo $read_more?></a>
            </div>
            <div class="col-lg-1">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->
