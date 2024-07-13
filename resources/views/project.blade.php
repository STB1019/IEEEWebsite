{{--
Renders all the projects.
This section includes a list of projects with pagination.
The projects are displayed in a grid layout, with each project preview shown in a card.
The project previews include the project image, title, and a short description.

The last part of the code is needed for the mobile version of the page.

This page uses some components from the file preview.blade.php and as a consequence preview_parts.blade.php
--}}


@extends('layouts/master_hf')
@section('body')

    
    @php 
        $page_name="projects"
    @endphp 
    @include('components/navbar')
    <!-- Navbar -->

    
    @php 
        $title="Projects"
    @endphp 
    @include('components/hero')
    <!-- header -->

    <!-- Project Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Case Study</div>
                <h1 class="mb-4">Explore Our Recent Projects</h1>
            </div>

            <nav aria-label="Page navigation example" id="paginationNav" class="d-none d-lg-block">
                <ul class="pagination justify-content-center">
                    <li class="page-item" id="previousPage"><a class="page-link" href="#">Previous</a></li>
                    <!-- Numeri di pagina -->
                    <li class="page-item" id="nextPage"><a class="page-link" href="#">Next</a></li>
                    <li>
                        <select id="rowsPerPage" class="form-control justify-content-end" style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px!important;">
                            <option value="3">3 rows per page</option>
                            <option value="6">6 rows per page</option>
                            <option value="9">9 rows per page</option>
                            <option value="18">18 rows per page</option>
                        </select>
                    </li>
                </ul>
            </nav>
            <table id="projectTable" class="table table-striped table-hover table-responsive d-none d-lg-block">
                <tbody>
                    {{-- This code shows the projects previews --}}
                    @php
                        $arr=$projects_list
                    @endphp
                    
                    
                    @for ($i=0; $i < count($arr); $i++) 
                        

                        @if (($i)%3==0 or $i==0) 
                            <tr class="row g-4 m-2">
                        @endif

                        
                    
                        @php
                            $id = $arr[$i] -> id;
                            $layout = $arr[$i] -> layout;
                            $desc = $arr[$i] -> description;
                            $img_path = "";
                            $titlep = $arr[$i]->title;

                            foreach ($thumbnail_list as $thumbnail) {
                                if ($thumbnail->project_id == $id){
                                    $img_path = $thumbnail->path;
                                    break;
                                }
                            }

                            $img_path = str_replace('public/','',$img_path);
                            
                            $type = "project";
                            
                            $shortdesc = $desc;
                    
                            if(strlen($shortdesc) > 100)
                                $shortdesc = substr($shortdesc, 0, 100). "...";
                        @endphp
                    
                        <td class="col">
                            @include('components/preview')
                        </td>
                    
                        @if (($i+1)%3==0)
                            </tr>
                        @endif
                        
                    @endfor
                    
                    {{-- If the number of elements is not multiple of 3 --}}
                    @if (count($arr)%3!=0) 
                        @for ($i=0; $i < (3-(count($arr)%3)); $i++)
                        <td class="col"><img class="img-fluid" src="{{url('/').'/img/tr.png'}}" alt=""></td>
                        @endfor

                        </tr>
                    @endif
                </tbody>
            </table>


            {{-- This code shows the projects previews on mobile --}}

            <div class="row g-4 d-lg-none">            
                @for ($i=0; $i < count($arr); $i++) 
            
                

                @php
                    $id = $arr[$i] -> id;
                    $layout = $arr[$i] -> layout;
                    $desc = $arr[$i] -> description;
                    $img_path = "img/800x600.jpg";
                    foreach ($thumbnail_list as $thumbnail) {
                        if ($thumbnail->project_id == $id){
                            $img_path = $thumbnail->path;
                            break;
                        }
                    }
                    $img_path = str_replace('public/','',$img_path);
                    
                    $type = "project";
                    
                    $shortdesc = $desc;
            
                    if(strlen($shortdesc) > 100)
                        $shortdesc = substr($shortdesc, 0, 100). "...";
            
                    $wow_delay = (0.2*(($i%3)+1))+0.1;
                @endphp

                <div class="col-md-6">                
                    @include('components/preview')
                </div>

                

            @endfor
            </div>
        </div>
    </div>
    <!-- Project End -->
@endsection