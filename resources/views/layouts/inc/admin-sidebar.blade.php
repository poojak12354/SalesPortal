 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
             <a class="nav-link" href="{{ url('admin/dashboard') }}">
                 <i class="mdi mdi-home menu-icon"></i>
                 <span class="menu-title">Reports</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#up-basic1" aria-expanded="false"
                 aria-controls="up-basic1">
                 <i class="mdi mdi-account menu-icon"></i>
                 <span class="menu-title">Upwork Profile</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse {{ request()->is('admin/add-upwork') ? 'show' : '' }} {{ request()->is('admin/upwork') ? 'show' : '' }}"
                 id="up-basic1">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link {{ request()->is('admin/add-upwork') ? 'active' : '' }}"
                             href="{{ url('admin/add-upwork') }}">Create Profile</a>
                     </li>
                     <li class="nav-item"> <a class="nav-link {{ request()->is('admin/upwork') ? 'active' : '' }}"
                             href="{{ url('admin/upwork') }}">All Profile</a>
                     </li>
                     <i class="menu-arrow"></i>
                     <i class="fa fa-angle-left"></i>
                 </ul>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#bde-basic1" aria-expanded="false"
                 aria-controls="bde-basic1">
                 <i class="mdi mdi-account-plus menu-icon"></i>
                 <span class="menu-title">BDE Profile</span>
                 <i class="menu-arrow"></i>

             </a>
             <div class="collapse {{ request()->is('admin/add-bde') ? 'show' : '' }} {{ request()->is('admin/bde') ? 'show' : '' }}"
                 id="bde-basic1">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link {{ request()->is('admin/add-bde') ? 'active' : '' }}"
                             href="{{ url('admin/add-bde') }}">Create Profile</a>
                     </li>
                     <li class="nav-item"> <a class="nav-link {{ request()->is('admin/bde') ? 'active' : '' }}"
                             href="{{ url('admin/bde') }}">All Profile</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li
             class="nav-item {{ request()->is('admin/bids') ? 'active' : '' }}
             @for ($i = 0; $i < 100; $i++) {{ request()->path() === 'admin/showbids/' . $i ? 'active' : '' }} @endfor">
             <a class="nav-link" href="{{ url('admin/bids') }}">
                 <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                 <span class="menu-title">Bids</span>
             </a>
         </li>
     </ul>
 </nav>
