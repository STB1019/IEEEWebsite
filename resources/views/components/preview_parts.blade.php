@switch($t)
    @case('project_main')
        @if($img_path == "" || $img_path == null)
            @php
                $img_path=url('/').'/img/800x600.jpg';
            @endphp
        @else
            @php
                $img_path="storage/".$img_path;
            @endphp
        @endif
        <div class="project-item position-relative overflow-hidden rounded mb-2">
            <img class="img-fluid" src="{{ asset($img_path) }}" alt="">
            <a class="project-overlay text-decoration-none" href="{{ route("project.show", ["project" => $id]) }}">
                <small>{{ $titlep }}</small>
                <h5 class="lh-base text-white mb-3">{{ $shortdesc }}</h5>
                <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
            </a>
        </div>
        @break

    @case('news_main')
        @if($img_path == "" || $img_path == null)
            @php
                $img_path=url('/').'/img/800x600.jpg';
            @endphp
        @else
            @php
                $img_path="storage/".$img_path;
            @endphp
        @endif
        <td class="col">
            <div class="project-item position-relative overflow-hidden rounded mb-2">
                <img class="img-fluid" src="{{ asset($img_path) }}" alt="">
                <a class="project-overlay text-decoration-none" href="{{ route("news.show", ["news" => $id]) }}">
                    <small>{{ $date }}</small>
                    <h5 class="lh-base text-white mb-3">{{ $title }}</h5>
                    <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                </a>
            </div>
        </td>
        @break

    @case('event_main')
        <div class="col-12 col-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="position-relative overflow-hidden rounded mb-2 event-item">
                <img class="img-fluid" src="{{ asset('storage/' . $img_path) }}" alt="">
                <a class="text-decoration-none event-overlay" href="{{ route("event.show", ["event" => $id]) }}">
                    <h5 class="lh-base text-white mb-3">{{ $title }}</h5>
                    <h5 class="lh-base text-white mb-3 d-lg-none d-xl-none">From {{$date_s}}<br/>to {{$date_e }}</h5>

                </a>
            </div>
        </div>
        @break

    @case('event_arrow_r')
        <div class="col-lg-2 d-none d-lg-block wow fadeIn" data-wow-delay="0.1s">
            <h6 class="text-white border rounded p-4 text-center" style="background-color: #1363c6;">From <br/>{{$date_s}}<br/>to<br/>{{$date_e }}</h6>
            <div class="d-none d-lg-block h-50 p-3 text-end">
                <h3 class="bi bi-arrow-return-right"></h3>
            </div>
        </div>
        @break
    
    @case('event_arrow_l')
        <div class="col-lg-2 d-none d-lg-block wow fadeIn" data-wow-delay="0.1s">
            <h6 class="text-white border rounded p-4 text-center" style="background-color: #1363c6;">From <br/>{{$date_s}}<br/>to<br/>{{$date_e }}</h6>
            <div class="d-none d-lg-block h-50 p-3 text-start">
                <h3 class="bi bi-arrow-return-left"></h3>
            </div>
        </div>
        @break

    @case('event_filler')
        <div class="col-12 col-lg-5 wow fadeIn" data-wow-delay="0.1s"></div>
        @break

    @default
        {{-- No matching case --}}
@endswitch
