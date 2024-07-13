{{--
Renders all the news.
This section includes a list of news with pagination.
The news are displayed in a grid layout, with each news preview shown in a card.
The news previews include the news image, title, and a short description.

The last part of the code is needed for the mobile version of the page.

This page uses some components from the file preview.blade.php and as a consequence preview_parts.blade.php
--}}

@extends('layouts/master_hf')
@section('body')

    @php 
        $page_name="news"
    @endphp
    <!-- Navbar -->
    @include('components/navbar')

    @php
        $title="News"
    @endphp
    @include('components/hero')
    <!-- header -->


    <!-- News Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">News</div>
                <p class="mb-4">Stay informed about upcoming news! Whether it's a workshop, seminar, or hackathon, our events provide valuable opportunities, skill-building sessions, and exposure to industry trends. Join us to expand your horizons.</p>
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
            <table id="newsTable" class="table table-striped table-hover table-responsive d-none d-lg-block">
                <tbody>

                    {{-- This code shows the news previews --}}
                    @php
                        $count = 0;
                        $arr=$news_list;
                    @endphp
                    
                    
                    @for ($i=0; $i < count($arr); $i++) 
                        

                        @if (($i)%3==0 or $i==0) 
                            <tr class="row g-4 m-2">
                        @endif

                        
                    
                        @php
                            $id = $arr[$i] -> id;
                            $layout = $arr[$i] -> layout;
                            $desc = $arr[$i] -> description;
                            $type = "news";
                            $shortdesc = $arr[$i]->description;
                            $title = $arr[$i]->title;
                            $date = $arr[$i]->date;

                            $date = date('d-m-Y', strtotime($date));

                            $img_path = "";

                            foreach ($thumbnail_list as $thumbnail) {
                                if ($thumbnail->news_id == $id){
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
                    $type = "news";
                    $shortdesc = $arr[$i]->description;
                    $title = $arr[$i]->title;

                    $img_path = "";

                    foreach ($thumbnail_list as $thumbnail) {
                        if ($thumbnail->news_id == $id){
                            $img_path = $thumbnail->path;
                            break;
                        }
                    }
                
                    $img_path = str_replace('public/','',$img_path);

                    if(strlen($shortdesc) > 100){
                        $shortdesc = substr($shortdesc, 0, 100). "...";
                    }
                @endphp

                <div class="col-md-6">                
                    @include('components/preview')
                </div>

                

            @endfor
            </div>
        </div>
    </div>
    <!-- news End -->
@endsection