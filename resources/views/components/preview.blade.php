
@php
/*
    Renders a project item preview with an image, title, short description, and a link to the project details page.

    string $wow_delay The delay in seconds for the "wow" animation effect.
    string $img_path The path to the project image thumbnail.
    string $id The ID of the project.
    string $layout The layout of the project details page.
    string $type The type of the project.
    string $title The title of the project.
    string $shortdesc The short description of the project.
*/
@endphp


{{-- Behavior --}}
@if($type == "project")
    {{-- Project --}}
    @include('components/preview_parts', ['t' => 'project_main'])
@elseif($type == "event_right")
    {{-- Event --}}
    @include('components/preview_parts', ['t' => 'event_filler'])
    @include('components/preview_parts', ['t' => 'event_arrow_r'])
    @include('components/preview_parts', ['t' => 'event_main'])
@elseif($type == "event_left")
    {{-- Event --}}
    @include('components/preview_parts', ['t' => 'event_main'])
    @include('components/preview_parts', ['t' => 'event_arrow_l'])
    @include('components/preview_parts', ['t' => 'event_filler'])
@else
    {{-- News --}}
    @include('components/preview_parts', ['t' => 'news_main'])
@endif