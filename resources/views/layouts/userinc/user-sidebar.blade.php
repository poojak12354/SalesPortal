 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item {{ request()->is('user/dashboard') ? 'active' : '' }}">
             <a class="nav-link" href="{{ url('user/dashboard') }}">
                 <i class="mdi mdi-home menu-icon"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
                 aria-controls="general-pages">
                 <i class="mdi mdi-account menu-icon"></i>
                 <span class="menu-title">Bids</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse {{ request()->is('user/add-bid') ? 'show' : '' }}
                {{ request()->is('user/bid') ? 'show' : '' }}"
                 id="general-pages">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link {{ request()->is('user/add-bid') ? 'active' : '' }}"
                             href="{{ url('user/add-bid') }}">Add Bid</a>
                     </li>
                     <li class="nav-item"> <a class="nav-link {{ request()->is('user/bid') ? 'active' : '' }}"
                             href="{{ url('user/bid') }}">All Bids</a>
                     </li>
                 </ul>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#bde-basic" aria-expanded="false"
                 aria-controls="bde-basic">
                 <i class="mdi  mdi-calendar menu-icon"></i>
                 <span class="menu-title">Monthly Reports</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse {{ request()->is('user/finalbid') ? 'show' : '' }}
                {{ request()->is('user/download-report') ? 'show' : '' }}"
                 id="bde-basic">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link {{ request()->is('user/finalbid') ? 'active' : '' }}"
                             href="{{ url('user/finalbid') }}">All Reports</a>
                     </li>
                     <li class="nav-item"> <a
                             class="nav-link {{ request()->is('user/download-report') ? 'active' : '' }}"
                             href="{{ url('user/download-report') }}">Genrate
                             Reports</a>
                     </li>
                 </ul>
             </div>
         </li>
     </ul>
 </nav>
