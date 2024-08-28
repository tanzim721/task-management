@php
    $prefix=Request::route()->getPrefix();
    $route=Route::current()->getName();
@endphp
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item has-treeview {{ ($prefix=='/user')?'menu-open': '' }}">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>User Task</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="" class="nav-link">
                        <i class="bi bi-circle"></i><span>View Lists</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</aside>
