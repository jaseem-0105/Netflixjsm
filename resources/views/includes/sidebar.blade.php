 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Profile</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="{{route("admin.viewMovie")}}">
            <i class="bi bi-camera-reels"></i>
            <span>Movies</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route("admin.viewGenre")}}">
            <i class="bi bi-person"></i>
            <span>Genre</span>
        </a>
        <hr class="sidebar-divider my-0">
    </li>



</ul>
<!-- End of Sidebar -->
