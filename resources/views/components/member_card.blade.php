{{-- This code is used in the index page and in the members page, and changes behavior based on the value of $t --}}
@if($t == 0)
    {{-- Call from Members --}}
    <div class="col-6 col-md-3 col-lg-2 wow fadeIn" data-wow-delay="{{$wow_delay}}s">
        <div class="team-item bg-white text-center rounded p-4 pt-0 h-100">
            <img class="img-fluid rounded-circle p-4" src="{{ asset('storage/' . $img) }}" alt="">
            <h5 class="mb-0" style="word-wrap: break-word;">{{$name}}</h5>
            <small>{{$position}}</small>
        </div>
    </div>
@else
    {{-- Call from Indexs --}}
    <div class="col-6 col-md-4 wow fadeIn " data-wow-delay="{{$wow_delay}}s">
        <div class="team-item bg-white text-center rounded p-4 pt-0 h-100">
            <img class="img-fluid rounded-circle p-4" src="{{ asset('storage/' . $img) }}" alt="">
            <h5 class="mb-0" style="word-wrap: break-word;">{{$name}}</h5>
            <small>{{$position}}</small>
        </div>
    </div>
@endif