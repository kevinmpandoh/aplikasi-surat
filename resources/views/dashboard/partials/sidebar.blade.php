<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand row justify-content-center">
            <a href="/dashboard/surat">Aplikasi Surat</a>
            <div class="d-felx align-items-center justify-content-center flex-column">
                <img src="{{ asset('storage/' . $profile->foto) }}"  style="width: 80px;height:80px;border:3px solid #ddd;object-fit:cover;" class="rounded-circle mb-3">
                <h5 class="p-0 mb-0 font-weight-bold">{{ $profile->nama }}</h5>
                <div><small>{{ $profile->user->role->keterangan }}</small></div>
            </div>            
            
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard/surat">As</a>
        </div>
        <ul class="sidebar-menu mt-2 mb-5">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard/surat*') ? "active" : "" }}">
                <a class="nav-link" href="/dashboard/surat">
                    <i class="fas fa-fw fa-envelope"></i> <span>Surat</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/tembusan*') ? "active" : "" }}">
                <a class="nav-link" href="/dashboard/tembusan">
                    <i class="fas fa-fw fa-file"></i> <span>Tembusan</span>
                </a>
            </li>
            <li class="menu-header">Profil</li>            
            @php
                $id = auth()->user()->id;
            @endphp
            <li class="{{ Request::is('dashboard/profile/' . $id) ? "active" : "" }}">
                <a class="nav-link" href="/dashboard/profile/{{ auth()->user()->id }}">
                    <i class="fas fa-fw fa-user"></i> <span>My Profile</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/profile/' . $id . "/edit") ? "active" : "" }}">
                <a class="nav-link" href="/dashboard/profile/{{ auth()->user()->id }}/edit">
                    <i class="fas fa-fw fa-user-edit"></i> <span>Edit Profile</span>
                </a>
            </li>

            @can('admin')
                        
            <li class="menu-header">Administrator</li>
            <li class="{{ Request::is('dashboard/user') ? "active" : "" }}">
                <a class="nav-link" href="/dashboard/user">
                    <i class="fas fa-fw fa-users"></i> <span>User</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/role') ? "active" : "" }}">
                <a class="nav-link" href="/dashboard/role">
                    <i class="fas fa-fw fa-user-tie"></i> <span>Role</span>
                </a>
            </li> 
            <li class="{{ Request::is('dashboard/penempatan') ? "active" : "" }}">
                <a class="nav-link" href="/dashboard/penempatan">
                    <i class="fas fa-fw fa-building"></i> <span>Penempatan</span>
                </a>
            </li> 
            @endcan
        </ul>
    </aside>
</div>