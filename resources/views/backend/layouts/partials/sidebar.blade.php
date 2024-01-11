<div id="sidebar" class="sidebar sidebar-with-footer">
   <!-- Aplication Brand -->
   <div class="app-brand">
      <a href="{{ route('admin.dashboard') }}">
      {{-- <img src="{{ asset('backend_assets/images/logo.png') }}" alt="Mono"> --}}
      <img src="{{ !empty($setting['site_logo']) ? asset('storage/site_settings/'.$setting['site_logo']) : asset('backend_assets/images/logo.png') }}" alt="Mono" style="width:50px">
      <span class="brand-name">{{ !empty($setting['site_title']) ? $setting['site_title'] : config('constants.APP_NAME') }}</span>
      </a>
   </div>
   <!-- begin sidebar scrollbar -->
   <div class="sidebar-left" data-simplebar style="height: 100%;">
      <!-- sidebar menu -->
      <ul class="nav sidebar-inner" id="sidebar-menu">
         <li {{ request()->segment(2) == "dashboard" ? 'class=active' : '' }}>
            <a class="sidenav-item-link" href="{{ route('admin.dashboard') }}">
            <i class="mdi mdi-briefcase-account-outline"></i>
            <span class="nav-text">Dashboard</span>
            </a>
         </li>
         
         <li class="section-title">
            Page Management
         </li>

         <li class="has-sub {{ request()->segment(2) == 'page' ? 'active' : ''  }}">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#page"
               aria-expanded="false" aria-controls="page">
            <i class="far fa-copy"></i>
            <span class="nav-text">Page</span> <b class="caret"></b>
            </a>
            <ul  class="collapse" id="page"
               data-parent="#sidebar-menu">
               <div class="sub-menu">
                  <li>
                     <a class="sidenav-item-link" href="{{ route('admin.page.index') }}">
                     <span class="nav-text">All Pages</span>
                     </a>
                  </li>

                  <li>
                     <a class="sidenav-item-link" href="{{ route('admin.page.create') }}">
                     <span class="nav-text">Create Page</span>
                     </a>
                  </li>
               </div>
            </ul>
         </li>

         <li class="has-sub {{ request()->segment(2) == 'page' ? 'active' : ''  }}">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#home-modules"
               aria-expanded="false" aria-controls="home-modules">
            <i class="fa fa-home fa-fw"></i>
            <span class="nav-text">Home Modules</span> <b class="caret"></b>
            </a>
            <ul  class="collapse" id="home-modules"
               data-parent="#sidebar-menu">
               <div class="sub-menu">
                  <li>
                     <a class="sidenav-item-link" href="{{ route('admin.banner.index') }}">
                     <i class="fa-solid fa-image mr-2"></i>
                     <span class="nav-text">Banner</span>
                     </a>
                  </li>

                  <li {{ request()->segment(2) == "core-value" ? 'class=active' : '' }}>
                     <a class="sidenav-item-link" href="{{ route('admin.core-value.index') }}">
                     <i class="mdi mdi-progress-upload mr-2"></i>
                     <span class="nav-text">Core Value</span>
                     </a>
                  </li>

                  <li {{ request()->segment(2) == "membership-plans" ? 'class=active' : '' }}>
                     <a class="sidenav-item-link" href="{{ route('admin.membership-plans.index') }}">
                     <i class="mdi mdi-currency-usd mr-2"></i>
                     <span class="nav-text">Membership Plans</span>
                     </a>
                  </li>

                  <li {{ request()->segment(2) == "team" ? 'class=active' : '' }}>
                     <a class="sidenav-item-link" href="{{ route('admin.team.index') }}">
                     <i class="mdi mdi-account-group mr-2"></i>
                     <span class="nav-text">Team</span>
                     </a>
                  </li>

                  <li {{ request()->segment(2) == "faq" ? 'class=active' : '' }}>
                     <a class="sidenav-item-link" href="{{ route('admin.faq.index') }}">
                     <i class="fas fa-question mr-2"></i>
                     <span class="nav-text">FAQ</span>
                     </a>
                  </li>

                  <li {{ request()->segment(2) == "event" ? 'class=active' : '' }}>
                     <a class="sidenav-item-link" href="{{ route('admin.event.index') }}">
                     <i class="fa fa-calendar mr-2" aria-hidden="true"></i>
                     <span class="nav-text">Event</span>
                     </a>
                  </li>

                  <li {{ request()->segment(2) == "blog" ? 'class=active' : '' }}>
                     <a class="sidenav-item-link" href="{{ route('admin.blog.index') }}">
                     <i class="fa-solid fa-blog mr-2"></i>
                     <span class="nav-text">Blog</span>
                     </a>
                  </li>
                  <li {{ request()->segment(2) == "program" ? 'class=active' : '' }}>
                     <a class="sidenav-item-link" href="{{ route('admin.program.index') }}">
                     <i class="fa fa-tasks mr-2" aria-hidden="true"></i>
                     <span class="nav-text">Program</span>
                     </a>
                  </li>

                  <li {{ request()->segment(2) == "strategic-priority" ? 'class=active' : '' }}>
                     <a class="sidenav-item-link" href="{{ route('admin.strategic-priority.index') }}">
                     <i class="fa fa-level-up mr-2" aria-hidden="true"></i>
                     <span class="nav-text">Strategic Priority</span>
                     </a>
                  </li>

                  <li {{ request()->segment(2) == "fund-raiser" ? 'class=active' : '' }}>
                     <a class="sidenav-item-link" href="{{ route('admin.fund-raiser.index') }}">
                     <i class="fas fa-donate mr-2"></i>
                     <span class="nav-text">Fund Raiser</span>
                     </a>
                  </li>
               </div>
            </ul>
         </li>
         
         <li class="has-sub {{ request()->segment(2) == 'page' ? 'active' : ''  }}">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#catalog-modules"
               aria-expanded="false" aria-controls="catalog-modules">
               <i class="fa fa-shopping-bag fa-fw"></i>
               <span class="nav-text">Catalog Modules</span> <b class="caret"></b>
            </a>
            <ul  class="collapse" id="catalog-modules"
               data-parent="#sidebar-menu">
               <div class="sub-menu">
                  <li {{ request()->segment(2) == "core-value" ? 'class=active' : '' }}>
                     <a class="sidenav-item-link" href="{{ route('admin.core-value.index') }}">
                     <i class="mdi mdi-progress-upload mr-2"></i>
                     <span class="nav-text"> Categories </span>
                     </a>
                  </li>
               </div>
            </ul>
         </li>
         
         {{-- <li {{ request()->segment(2) == "membership" ? 'class=active' : '' }}>
            <a class="sidenav-item-link" href="{{ route('admin.membership.index') }}">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
            <span class="nav-text">Membership</span>
            </a>
         </li> --}}

         <li class="section-title">
            Menu Management
         </li>

         <li class="has-sub {{ request()->segment(2) == 'menu' ? 'active' : ''  }}" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#menu"
               aria-expanded="false" aria-controls="menu">
            <i class="fa-solid fa-bars"></i>
            <span class="nav-text">Menu</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="menu" data-parent="#sidebar-menu">
               <div class="sub-menu">
                  <li>
                     <a class="sidenav-item-link" href="{{ route('admin.menu') }}">
                        <span class="nav-text">Create Manu</span>
                     </a>
                  </li>
               </div>
            </ul>
         </li>

         <li class="section-title">
            Mail Template Management
         </li>

         <li {{ request()->segment(2) == "mail-template" ? 'class=active' : '' }}>
            <a class="sidenav-item-link" href="{{ route('admin.mail-template.index') }}">
            <i class="fas fa-donate"></i>
            <span class="nav-text">Mail Template</span>
            </a>
         </li>

         <li class="section-title">
            Widget Management
         </li>

         <li class="has-sub {{ request()->segment(2) == 'widget' ? 'active' : ''  }}">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#widget"
               aria-expanded="false" aria-controls="widget">
            <i class="fa fa-cog" aria-hidden="true"></i>
            <span class="nav-text">Widget</span> <b class="caret"></b>
            </a>
            <ul  class="collapse" id="widget"
               data-parent="#sidebar-menu">
               <div class="sub-menu">
                  <li>
                     <a class="sidenav-item-link" href="{{ route('admin.widget.index') }}">
                     <span class="nav-text">List Widget</span>
                     </a>
                  </li>

                  {{-- <li>
                     <a class="sidenav-item-link" href="{{ route('admin.widget.create') }}">
                     <span class="nav-text">Create Widget</span>
                     </a>
                  </li> --}}
               </div>
            </ul>
         </li>

         <li {{ request()->segment(2) == "contact" ? 'class=active' : '' }}>
            <a class="sidenav-item-link" href="{{ route('admin.contact.index') }}">
            <i class="fa fa-address-book" aria-hidden="true"></i>
            <span class="nav-text">Contact List</span>
            </a>
         </li>

         <li class="section-title">
            Register Module
         </li>

         <li {{ request()->segment(2) == "service-area" ? 'class=active' : '' }}>
            <a class="sidenav-item-link" href="{{ route('admin.service-area.index') }}">
            <i class="fa fa-address-book" aria-hidden="true"></i>
            <span class="nav-text">Service Area List</span>
            </a>
         </li>

         <li {{ request()->segment(2) == "donation" ? 'class=active' : '' }}>
            <a class="sidenav-item-link" href="{{ route('admin.donation.index') }}">
            <i class="fas fa-donate"></i>
            <span class="nav-text">Donation List</span>
            </a>
         </li>
      </ul>
   </div>
   <div class="sidebar-footer">
      <div class="sidebar-footer-content">
         <ul class="d-flex">
            <li>
               <a href="{{ route('admin.settings') }}" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a>
            </li>
            <li>
               <a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
            </li>
         </ul>
      </div>
   </div>
</div>