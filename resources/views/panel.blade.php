{{--
This code represents the panel that enables the creation, deletion and editing of the website pages.
It includes a sidebar with various administrative actions, as well as a section displaying quick statistics 
about the application's data.

The sidebar includes links for managing projects, events, news, and user accounts, depending
on the user's role (admin or webmaster or member). It also includes a link to the user's profile settings 
and a link to return to the home page.

Admin - can create, edit, and delete: news, projects, events and users. (Note: users can only be edited or deleted)
Webmaster - can create, edit, and delete: news, projects, events.
Members - can edit their profile.

The main content area displays a card with quick statistics, including the number of projects,
events, news, members, active members, and images. These statistics are dynamically displayed
using variables passed from the controller.
--}}

@extends('layouts/master_h')
@section('body')

    @php 
        $role=ucfirst($_SESSION['role']);
        $title="".$role." Panel";
    @endphp
    <!-- header -->
    @include('components/hero_small')

    
    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            <!-- Sidebar -->
            <div class="col-md-1">
            </div>
            <div class="col-md-2 sidebar">
                <div class="list-group">
                    @if((isset($_SESSION['logged']))&&(($_SESSION['role']==='admin') || ($_SESSION['role']==='webmaster')))
                        <a href="{{ route('project.create') }}" class="list-group-item list-group-item-action"><i class="fa fa-plus me-2"></i> Add Project</a>
                        <a href="{{ route('project.editlist') }}" class="list-group-item list-group-item-action"><i class="fa fa-edit me-2"></i> Edit Project</a>
                        <a href="{{ route('project.deletelist') }}" class="list-group-item list-group-item-action"><i class="fa fa-trash me-2"></i> Delete Project</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('event.create') }}" class="list-group-item list-group-item-action"><i class="fa fa-plus me-2"></i> Add Event</a>
                        <a href="{{ route('event.editlist') }}" class="list-group-item list-group-item-action"><i class="fa fa-edit me-2"></i> Edit Event</a>
                        <a href="{{ route('event.deletelist') }}" class="list-group-item list-group-item-action"><i class="fa fa-trash me-2"></i> Delete Event</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('news.create') }}" class="list-group-item list-group-item-action"><i class="fa fa-plus me-2"></i> Add News</a>
                        <a href="{{ route('news.editlist') }}" class="list-group-item list-group-item-action"><i class="fa fa-edit me-2"></i> Edit News</a>
                        <a href="{{ route('news.deletelist') }}" class="list-group-item list-group-item-action"><i class="fa fa-trash me-2"></i> Delete News</a>
                        <div class="dropdown-divider"></div>
                    @endif

                    @if((isset($_SESSION['logged']))&&($_SESSION['role']==='admin'))
                        <a href="{{ route('user.editlist') }}" class="list-group-item list-group-item-action"><i class="fa fa-edit me-2"></i> Edit Members</a>
                        <a href="{{ route('user.deletelist') }}" class="list-group-item list-group-item-action"><i class="fa fa-trash me-2"></i> Delete Members</a>
                        <div class="dropdown-divider"></div>                    
                    @endif

                    <form method="get" name="{{$_SESSION["loggedID"]}}" action="{{route('user.edit', ['user' => $_SESSION["loggedID"]])}}">
                        @csrf
                        <button class="list-group-item list-group-item-action" type="submit">Profile Setting</button>
                    </form>
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action text-white" style='background-color: #1363c6;'><i class="fa fa-arrow-left me-2"></i>Return Home</a>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col-md-8">
                
                <div class="card" style='background-color: #1363c6;'>
                    <div class="card-body">
                        <h5 class="card-title text-white" style='background-color: #1363c6;'>Quick Stats</h5>
                        <div class="row">
                            <div class="col-md-4 pt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Number of Projects</h5>
                                        <p class="card-text">{{$n_project}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Number of Events</h5>
                                        <p class="card-text">{{$n_event}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Number of News</h5>
                                        <p class="card-text">{{$n_news}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Members</h5>
                                        <p class="card-text">{{$n_members}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Active Members</h5>
                                        <p class="card-text">{{$n_members_act}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Number of images</h5>
                                        <p class="card-text">{{$n_image}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
            </div>

        </div>
    </div>
@endsection
