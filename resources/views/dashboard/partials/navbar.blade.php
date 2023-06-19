<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto" action="/dashboard/surat" method="get" >
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
                @if (Request::is('dashboard/surat')) )
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" name="search" value="{{ request('search') }}">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                @endif
            </div>
        </form>    
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">            
            <img alt="image" src="{{ asset('storage/' . $profile->foto) }}" class="rounded-circle mr-1" style="width: 40px;height:40px;object-fit:cover;">                
            <div class="d-sm-none d-lg-inline-block">{{ $profile->nama }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">                
                <a href="/dashboard/profile/{{ auth()->user()->id }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt mt-2"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>