<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">BD Human LTD</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">


            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    {{-- <img src="{{(Auth::user()->image!=null && Auth::user()->image!='')? asset('upload/user_images/'.Auth::user()->image) : asset('upload/no_image.png')}}" alt="Profile" class="rounded-circle" style="width:40px; height:40px;"> --}}
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{Auth::user()->name}}</h6>
                        <span>Web Designer</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</header>
