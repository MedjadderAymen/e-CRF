<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="{{route('dashboard')}}"><img src="{{asset("../theme/dist/assets/images/logo/logo.png")}}"
                                                          alt="Logo" style="height: 80px" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                @if(auth()->user()->hasRole('Super Admin'))
                <li class="sidebar-item {{request()->routeIs('dashboard*') ? "active" : ""}} ">
                    <a href="{{route("dashboard")}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endif
                @can("patient_access")

                    <li class="sidebar-item has-sub  {{request()->routeIs('dmPatients*') ? "active" : ""}} ">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-break"></i>
                            <span>Dossiers médicaux</span>
                        </a>
                        <ul class="submenu {{request()->routeIs('dmPatients*') ? "active" : ""}} ">

                            <li class="submenu-item  {{request()->routeIs('dmPatients.create') ? "active" : ""}} ">
                                <a href="{{route("dmPatients.create")}}">Nouveau Dossier</a>
                            </li>
                            <li class="submenu-item  {{request()->routeIs('dmPatients.index') ? "active" : ""}} ">
                                <a href="{{route("dmPatients.index")}}">Liste des dossiers</a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can("user_access")
                    <li class="sidebar-item has-sub  {{request()->routeIs('users*') ? "active" : ""}} ">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                            <span>Comptes utilisateurs</span>
                        </a>
                        <ul class="submenu {{request()->routeIs('users*') ? "active" : ""}} ">

                            <li class="submenu-item  {{request()->routeIs('users.create') ? "active" : ""}} ">
                                <a href="{{route("users.create")}}">Ajouter Compte</a>
                            </li>
                            <li class="submenu-item  {{request()->routeIs('users.index') ? "active" : ""}} ">
                                <a href="{{route("users.index")}}">List des utilisateurs</a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
