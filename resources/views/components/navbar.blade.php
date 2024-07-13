@if(isset($lang))
    @php
        $page_name = __($lang.".page_name");
    @endphp
@endif

<!-- Navbar Start -->
<div class="container-fluid sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <a href="index.php" class="navbar-brand">
                <img class="img-fluid logoimg" src="img/logo.png" alt="">
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link <?php if ($page_name=="home") {echo "active";}?>">Home</a>
                    <a href="{{ route('news.index') }}" class="nav-item nav-link <?php if ($page_name=="news") {echo "active";}?>">News</a>
                    <a href="{{ route('event.index') }}" class="nav-item nav-link <?php if ($page_name=="events") {echo "active";}?>">Events</a>
                    <a href="{{ route('project.index') }}" class="nav-item nav-link <?php if ($page_name=="projects") {echo "active";}?>">Projects</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link <?php if ($page_name=="about") {echo "active";}?>">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light mt-2">
                            <a href="{{ route('members') }}" class="dropdown-item">Members</a>
                            <a href="{{ route('faq') }}" class="dropdown-item">FAQs</a>
                        </div>
                    </div>
                    {{-- <a href="{{ route('contact') }}" class="nav-item nav-link <?php if ($page_name=="contact") {echo "active";}?>" >Contact</a> --}}
                    
                    @if((isset($_SESSION['logged']))&&($_SESSION['role']==='admin'))
                        <button onclick="window.location.href='{{ route('panel') }}'" class="btn text-white p-0 d-none d-lg-block" style="margin-right: 30px">Admin <i class="fa fa-user"></i></button>
                        <button onclick="window.location.href='{{ route('user.logout') }}'" class="btn text-white p-0 d-none d-lg-block" style="margin-right: 30px"><i class="fa fa-sign-out-alt"></i></button>
                    @elseif((isset($_SESSION['logged']))&&($_SESSION['role']==='member'))
                        <button onclick="window.location.href='{{ route('panel') }}'" class="btn text-white p-0 d-none d-lg-block" style="margin-right: 30px">Member <i class="fa fa-edit"></i></button>
                        <button onclick="window.location.href='{{ route('user.logout') }}'" class="btn text-white p-0 d-none d-lg-block" style="margin-right: 30px"><i class="fa fa-sign-out-alt"></i></button>
                    @elseif((isset($_SESSION['logged']))&&($_SESSION['role']==='webmaster'))
                        <button onclick="window.location.href='{{ route('panel') }}'" class="btn text-white p-0 d-none d-lg-block" style="margin-right: 30px">Webmaster <i class="fa fa-user"></i></button>
                        <button onclick="window.location.href='{{ route('user.logout') }}'" class="btn text-white p-0 d-none d-lg-block" style="margin-right: 30px"><i class="fa fa-sign-out-alt"></i></button>
                    @else
                        <button onclick="window.location.href='{{ route('login') }}'" class="btn text-white p-0 d-none d-lg-block" style="margin-right: 30px"><i class="fa fa-user"></i></button>
                    @endif
                    @if(isset($lang))
                    <button onclick="window.location.href='{{ route('setLang', ['lang' => 'it']) }}'" class="btn text-white p-0 d-none d-lg-block">IT</button>
                    <b class="text-white p-0 d-none d-lg-block">|</b>
                    <button onclick="window.location.href='{{ route('setLang', ['lang' => 'en']) }}'" class="btn text-white p-0 d-none d-lg-block">EN</button>
                    @endif
                </div>
                <!--<butaton type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal"
                    data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>-->
                </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->