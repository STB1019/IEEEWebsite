{{--
Renders the content for a singular event, project, or news page.

Is the page that is displayed when a user clicks on an event, project, or news item. Is always the same page, 
but the how is presented changes according to the type of content.

This blade template extends the master layout and includes the navbar and hero components.
It then displays the content of the page, including the title, description, and any associated images.
The layout of the content can be configured using the `$layout` variable, which determines how the image and text are displayed.

param object $object The object containing the page data (title, description, etc.)
param array $images The array of images associated with the page
param string $type The type of content (event, project, or news)
--}}
@extends('layouts/master_hf')
@section('body')

    @php
        $page_name = $object->title;
        $title =  $object->title;

        foreach ($images as $image) {
            if ($image->type == 1) {
                $img_path = $image->path;
                break;
            }
        }

        if(isset($img_path)){
            $img_path = str_replace('public/','',$img_path);
        }
        else{
            $img_path = "";
        }

        $size = sizeof($images);

        $text = explode("\n",$object->description);

        //Needed for events
        $type = str_replace('_right','',$type);
        $type = str_replace('_left','',$type);
    @endphp
    @include('components/navbar')
    <!-- Navbar -->

    @include('components/hero')
    <!-- header -->

    <!-- This Template is used for the singular events, projects and news -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">{{ $type }}</div>
                <h1 class="mb-4">{{ $object->title }}</h1>
            </div>

            @if($type == 'event')
                <div class="text-center mb-4">
                    <div>
                        <span class="mx-3 text-primary">Initial Date: {{ $object->date_start }}</span>
                        <span class="mx-3 text-primary">End Date: {{ $object->date_end }}</span>
                    </div>
                </div>
            @endif

            @if($type == 'news')
                <div class="text-center mb-4">
                    <div>
                        <span class="mx-3 text-primary">Date: {{ $object->date }}</span>
                    </div>
                </div>
            @endif

            
            {{-- Check if the text is too short --}}
            @if(sizeof($text) > 1)

                {{-- Check if the layout is 0, 1 or 2 --}}
                @if($layout == 0)
                    <p style="text-align: justify; text-justify: inter-word;">{{ $text[0] }}</p>
                    <img class="img-fluid rounded m-3 zoomable" src="{{asset('storage/'.$img_path)}}" alt="" style="width: 30%; float: right; margin-right: 0px !important;">

                @elseif($layout == 1)
                    <p style="text-align: justify; text-justify: inter-word;">{{ $text[0] }}</p>
                    <img class="img-fluid rounded m-3 zoomable" src="{{asset('storage/'.$img_path)}}" alt="" style="width: 30%; float: left; margin-left: 0px !important;">

                @else
                    <img class="mx-auto img-fluid d-block rounded m-3 zoomable w-100" src="{{asset('storage/'.$img_path)}}" alt="">
                    <p style="text-align: justify; text-justify: inter-word;">{{ $text[0] }}</p>
                @endif
            @else
                <p style="text-align: justify; text-justify: inter-word;">{{ $text[0] }}</p>
            @endif


            @for ($i = 1; $i < sizeof($text); $i++)
                <p style="text-align: justify; text-justify: inter-word;">{{ $text[$i] }}</p>
            @endfor

            {{-- Authors --}}
            @if($type == 'news')
            <div class="text-end mb-5 mt-3" style="font-style: italic;">Author: <b>{{ $object->author }}</b></div>
            @endif

            {{-- Team Members --}}
            @if($type == 'project')
            <div class="text-end mb-5 mt-4" style="font-style: italic;">Team Members: <b>{{ $object->team_members }}</b></div>
            <div class="text-center mb-5 mt-4 text-primary">
                @if ($object->active)
                    <b>This Project is active</b>
                @else
                    <b>This Project is inactive</b>
                @endif
            </div>
            @endif

                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                <div class="row">
                    @for ($i = 0; $i < $size; $i++)
                        @if ($images[$i]->type == 2)
                            @php
                                $img_path = str_replace('public/','',($images[$i]->path));
                            @endphp
                            <img class="img-fluid rounded col-4 pb-3 zoomable" src="{{asset('storage/'.$img_path)}}" alt="">
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for image zoom -->
    <script>
        const zoomableImages = document.querySelectorAll('.zoomable');

        zoomableImages.forEach(image => {
            image.addEventListener('click', () => {
                const zoomedImage = document.createElement('div');
                zoomedImage.classList.add('zoomed-image');
                zoomedImage.innerHTML = `<img src="${image.src}" alt="${image.alt}">`;
                zoomedImage.addEventListener('click', () => {
                    zoomedImage.remove();
                });
                document.body.appendChild(zoomedImage);
            });
        });
    </script>

    <style>
        /**
         * Styles for a zoomed-in image overlay.
         * 
         * The '.zoomed-image' class is applied to a container element that displays a
         * zoomed-in version of an image when the user clicks on it. The image is
         * centered within the container and takes up as much space as possible while
         * maintaining its aspect ratio.
         * 
         * The container covers the entire viewport and has a semi-transparent black
         * background to provide contrast for the image. Clicking anywhere on the
         * container will close the zoomed-in view.
         */
        .zoomed-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            cursor: zoom-out;
        }

        .zoomed-image img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }
    </style>
@endsection
