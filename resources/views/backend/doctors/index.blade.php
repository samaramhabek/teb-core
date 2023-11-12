@extends('layouts.admin')
 {{-- @section('title', __('cp.treatments')) --}}
 
  



 
   
     <body>
        @section('admin')
       <!-- Layout wrapper -->
       <div class="layout-wrapper layout-content-navbar">
         <div class="layout-container">
           <!-- Menu -->
   
           <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
             <div class="app-brand demo">
               <a href="index.html" class="app-brand-link">
                 <span class="app-brand-logo demo">
                   <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd"
                       d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                       fill="#7367F0" />
                     <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                       d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                     <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                       d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                     <path fill-rule="evenodd" clip-rule="evenodd"
                       d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                       fill="#7367F0" />
                   </svg>
                 </span>
                 <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
               </a>
     
               <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                 <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                 <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
               </a>
             </div>
     
             <div class="menu-inner-shadow"></div>
     
             <ul class="menu-inner py-1">
               <!-- Dashboards -->
               <li class="menu-item active open">
                 <a href="#" class="menu-link">
                   <div data-i18n="Dashboards">Dashboards</div>
                 </a>
               </li>
               
               <li class="menu-item">
                 <a href="modal-examples.html" class="menu-link">
                   <i class="menu-icon tf-icons ti ti-square"></i>
                   <div data-i18n="Modal Examples">Modal Examples</div>
                 </a>
               </li>
     
               <!-- Extended components -->
               <li class="menu-item">
                 <a href="javascript:void(0)" class="menu-link menu-toggle">
                   <i class="menu-icon tf-icons ti ti-components"></i>
                   <div data-i18n="Extended UI">Extended UI</div>
                 </a>
                 <ul class="menu-sub">
                   <li class="menu-item">
                     <a href="form.html" class="menu-link">
                       <div data-i18n="Avatar">form wizard</div>
                     </a>
                   </li>
                   <li class="menu-item">
                     <a href="#" class="menu-link">
                       <div data-i18n="Avatar">Avatar</div>
                     </a>
                   </li>
                 </ul>
               </li>
               
               <!-- Tables -->
               <li class="menu-item">
                 <a href="tables-basic.html" class="menu-link">
                   <i class="menu-icon tf-icons ti ti-table"></i>
                   <div data-i18n="Tables">Tables</div>
                 </a>
               </li>
             </ul>
           </aside>
           <!-- / Menu -->
   
           <!-- Layout container -->
           <div class="layout-page">
             <!-- Navbar -->
   
             <nav
               class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
               id="layout-navbar">
               <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                 <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                   <i class="ti ti-menu-2 ti-sm"></i>
                 </a>
               </div>
   
               <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                 <!-- Search -->
                 <div class="navbar-nav align-items-center">
                   <div class="nav-item navbar-search-wrapper mb-0">
                     <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                       <i class="ti ti-search ti-md me-2"></i>
                       <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                     </a>
                   </div>
                 </div>
                 <!-- /Search -->
   
                 <ul class="navbar-nav flex-row align-items-center ms-auto">
                   <!-- Language -->
                   <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                     <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                       <i class="ti ti-language rounded-circle ti-md"></i>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end">
                       <li>
                         <a class="dropdown-item" href="javascript:void(0);" data-language="en">
                           <span class="align-middle">English</span>
                         </a>
                       </li>
                       <li>
                         <a class="dropdown-item" href="javascript:void(0);" data-language="fr">
                           <span class="align-middle">French</span>
                         </a>
                       </li>
                       <li>
                         <a class="dropdown-item" href="javascript:void(0);" data-language="de">
                           <span class="align-middle">German</span>
                         </a>
                       </li>
                       <li>
                         <a class="dropdown-item" href="javascript:void(0);" data-language="pt">
                           <span class="align-middle">Portuguese</span>
                         </a>
                       </li>
                     </ul>
                   </li>
                   <!--/ Language -->
   
                   <!-- Style Switcher -->
                   <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                     <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                       <i class="ti ti-md"></i>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                       <li>
                         <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                           <span class="align-middle"><i class="ti ti-sun me-2"></i>Light</span>
                         </a>
                       </li>
                       <li>
                         <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                           <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                         </a>
                       </li>
                       <li>
                         <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                           <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
                         </a>
                       </li>
                     </ul>
                   </li>
                   <!-- / Style Switcher-->
   
                   <!-- Quick links  -->
                   <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                     <a
                       class="nav-link dropdown-toggle hide-arrow"
                       href="javascript:void(0);"
                       data-bs-toggle="dropdown"
                       data-bs-auto-close="outside"
                       aria-expanded="false">
                       <i class="ti ti-layout-grid-add ti-md"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end py-0">
                       <div class="dropdown-menu-header border-bottom">
                         <div class="dropdown-header d-flex align-items-center py-3">
                           <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                           <a
                             href="javascript:void(0)"
                             class="dropdown-shortcuts-add text-body"
                             data-bs-toggle="tooltip"
                             data-bs-placement="top"
                             title="Add shortcuts"
                             ><i class="ti ti-sm ti-apps"></i
                           ></a>
                         </div>
                       </div>
                       <div class="dropdown-shortcuts-list scrollable-container">
                         <div class="row row-bordered overflow-visible g-0">
                           <div class="dropdown-shortcuts-item col">
                             <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                               <i class="ti ti-calendar fs-4"></i>
                             </span>
                             <a href="app-calendar.html" class="stretched-link">Calendar</a>
                             <small class="text-muted mb-0">Appointments</small>
                           </div>
                           <div class="dropdown-shortcuts-item col">
                             <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                               <i class="ti ti-file-invoice fs-4"></i>
                             </span>
                             <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                             <small class="text-muted mb-0">Manage Accounts</small>
                           </div>
                         </div>
                         <div class="row row-bordered overflow-visible g-0">
                           <div class="dropdown-shortcuts-item col">
                             <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                               <i class="ti ti-users fs-4"></i>
                             </span>
                             <a href="app-user-list.html" class="stretched-link">User App</a>
                             <small class="text-muted mb-0">Manage Users</small>
                           </div>
                           <div class="dropdown-shortcuts-item col">
                             <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                               <i class="ti ti-lock fs-4"></i>
                             </span>
                             <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                             <small class="text-muted mb-0">Permission</small>
                           </div>
                         </div>
                         <div class="row row-bordered overflow-visible g-0">
                           <div class="dropdown-shortcuts-item col">
                             <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                               <i class="ti ti-chart-bar fs-4"></i>
                             </span>
                             <a href="index.html" class="stretched-link">Dashboard</a>
                             <small class="text-muted mb-0">User Profile</small>
                           </div>
                           <div class="dropdown-shortcuts-item col">
                             <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                               <i class="ti ti-settings fs-4"></i>
                             </span>
                             <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                             <small class="text-muted mb-0">Account Settings</small>
                           </div>
                         </div>
                         <div class="row row-bordered overflow-visible g-0">
                           <div class="dropdown-shortcuts-item col">
                             <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                               <i class="ti ti-help fs-4"></i>
                             </span>
                             <a href="pages-faq.html" class="stretched-link">FAQs</a>
                             <small class="text-muted mb-0">FAQs & Articles</small>
                           </div>
                           <div class="dropdown-shortcuts-item col">
                             <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                               <i class="ti ti-square fs-4"></i>
                             </span>
                             <a href="modal-examples.html" class="stretched-link">Modals</a>
                             <small class="text-muted mb-0">Useful Popups</small>
                           </div>
                         </div>
                       </div>
                     </div>
                   </li>
                   <!-- Quick links -->
   
                   <!-- Notification -->
                   <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                     <a
                       class="nav-link dropdown-toggle hide-arrow"
                       href="javascript:void(0);"
                       data-bs-toggle="dropdown"
                       data-bs-auto-close="outside"
                       aria-expanded="false">
                       <i class="ti ti-bell ti-md"></i>
                       <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end py-0">
                       <li class="dropdown-menu-header border-bottom">
                         <div class="dropdown-header d-flex align-items-center py-3">
                           <h5 class="text-body mb-0 me-auto">Notification</h5>
                           <a
                             href="javascript:void(0)"
                             class="dropdown-notifications-all text-body"
                             data-bs-toggle="tooltip"
                             data-bs-placement="top"
                             title="Mark all as read"
                             ><i class="ti ti-mail-opened fs-4"></i
                           ></a>
                         </div>
                       </li>
                       <li class="dropdown-notifications-list scrollable-container">
                         <ul class="list-group list-group-flush">
                           <li class="list-group-item list-group-item-action dropdown-notifications-item">
                             <div class="d-flex">
                               <div class="flex-shrink-0 me-3">
                                 <div class="avatar">
                                   <img src="{{asset('assets/img/avatars/1.png" alt class="h-auto rounded-circle')}}" />
                                 </div>
                               </div>
                               <div class="flex-grow-1">
                                 <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                                 <p class="mb-0">Won the monthly best seller gold badge</p>
                                 <small class="text-muted">1h ago</small>
                               </div>
                               <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <a href="javascript:void(0)" class="dropdown-notifications-read"
                                   ><span class="badge badge-dot"></span
                                 ></a>
                                 <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                   ><span class="ti ti-x"></span
                                 ></a>
                               </div>
                             </div>
                           </li>
                           <li class="list-group-item list-group-item-action dropdown-notifications-item">
                             <div class="d-flex">
                               <div class="flex-shrink-0 me-3">
                                 <div class="avatar">
                                   <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                 </div>
                               </div>
                               <div class="flex-grow-1">
                                 <h6 class="mb-1">Charles Franklin</h6>
                                 <p class="mb-0">Accepted your connection</p>
                                 <small class="text-muted">12hr ago</small>
                               </div>
                               <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <a href="javascript:void(0)" class="dropdown-notifications-read"
                                   ><span class="badge badge-dot"></span
                                 ></a>
                                 <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                   ><span class="ti ti-x"></span
                                 ></a>
                               </div>
                             </div>
                           </li>
                           <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                             <div class="d-flex">
                               <div class="flex-shrink-0 me-3">
                                 <div class="avatar">
                                   <img src="{{asset('assets/img/avatars/2.png" alt class="h-auto rounded-circle')}}" />
                                 </div>
                               </div>
                               <div class="flex-grow-1">
                                 <h6 class="mb-1">New Message ✉️</h6>
                                 <p class="mb-0">You have new message from Natalie</p>
                                 <small class="text-muted">1h ago</small>
                               </div>
                               <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <a href="javascript:void(0)" class="dropdown-notifications-read"
                                   ><span class="badge badge-dot"></span
                                 ></a>
                                 <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                   ><span class="ti ti-x"></span
                                 ></a>
                               </div>
                             </div>
                           </li>
                           <li class="list-group-item list-group-item-action dropdown-notifications-item">
                             <div class="d-flex">
                               <div class="flex-shrink-0 me-3">
                                 <div class="avatar">
                                   <span class="avatar-initial rounded-circle bg-label-success"
                                     ><i class="ti ti-shopping-cart"></i
                                   ></span>
                                 </div>
                               </div>
                               <div class="flex-grow-1">
                                 <h6 class="mb-1">Whoo! You have new order 🛒</h6>
                                 <p class="mb-0">ACME Inc. made new order $1,154</p>
                                 <small class="text-muted">1 day ago</small>
                               </div>
                               <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <a href="javascript:void(0)" class="dropdown-notifications-read"
                                   ><span class="badge badge-dot"></span
                                 ></a>
                                 <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                   ><span class="ti ti-x"></span
                                 ></a>
                               </div>
                             </div>
                           </li>
                           <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                             <div class="d-flex">
                               <div class="flex-shrink-0 me-3">
                                 <div class="avatar">
                                   <img src="{{asset('assets/img/avatars/9.png" alt class="h-auto rounded-circle')}}" />
                                 </div>
                               </div>
                               <div class="flex-grow-1">
                                 <h6 class="mb-1">Application has been approved 🚀</h6>
                                 <p class="mb-0">Your ABC project application has been approved.</p>
                                 <small class="text-muted">2 days ago</small>
                               </div>
                               <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <a href="javascript:void(0)" class="dropdown-notifications-read"
                                   ><span class="badge badge-dot"></span
                                 ></a>
                                 <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                   ><span class="ti ti-x"></span
                                 ></a>
                               </div>
                             </div>
                           </li>
                           <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                             <div class="d-flex">
                               <div class="flex-shrink-0 me-3">
                                 <div class="avatar">
                                   <span class="avatar-initial rounded-circle bg-label-success"
                                     ><i class="ti ti-chart-pie"></i
                                   ></span>
                                 </div>
                               </div>
                               <div class="flex-grow-1">
                                 <h6 class="mb-1">Monthly report is generated</h6>
                                 <p class="mb-0">July monthly financial report is generated</p>
                                 <small class="text-muted">3 days ago</small>
                               </div>
                               <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <a href="javascript:void(0)" class="dropdown-notifications-read"
                                   ><span class="badge badge-dot"></span
                                 ></a>
                                 <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                   ><span class="ti ti-x"></span
                                 ></a>
                               </div>
                             </div>
                           </li>
                           <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                             <div class="d-flex">
                               <div class="flex-shrink-0 me-3">
                                 <div class="avatar">
                                   <img src="{{asset('assets/img/avatars/5.png" alt class="h-auto rounded-circle')}}" />
                                 </div>
                               </div>
                               <div class="flex-grow-1">
                                 <h6 class="mb-1">Send connection request</h6>
                                 <p class="mb-0">Peter sent you connection request</p>
                                 <small class="text-muted">4 days ago</small>
                               </div>
                               <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <a href="javascript:void(0)" class="dropdown-notifications-read"
                                   ><span class="badge badge-dot"></span
                                 ></a>
                                 <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                   ><span class="ti ti-x"></span
                                 ></a>
                               </div>
                             </div>
                           </li>
                           <li class="list-group-item list-group-item-action dropdown-notifications-item">
                             <div class="d-flex">
                               <div class="flex-shrink-0 me-3">
                                 <div class="avatar">
                                   <img src="{{asset('assets/img/avatars/6.png" alt class="h-auto rounded-circle')}}" />
                                 </div>
                               </div>
                               <div class="flex-grow-1">
                                 <h6 class="mb-1">New message from Jane</h6>
                                 <p class="mb-0">Your have new message from Jane</p>
                                 <small class="text-muted">5 days ago</small>
                               </div>
                               <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <a href="javascript:void(0)" class="dropdown-notifications-read"
                                   ><span class="badge badge-dot"></span
                                 ></a>
                                 <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                   ><span class="ti ti-x"></span
                                 ></a>
                               </div>
                             </div>
                           </li>
                           <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                             <div class="d-flex">
                               <div class="flex-shrink-0 me-3">
                                 <div class="avatar">
                                   <span class="avatar-initial rounded-circle bg-label-warning"
                                     ><i class="ti ti-alert-triangle"></i
                                   ></span>
                                 </div>
                               </div>
                               <div class="flex-grow-1">
                                 <h6 class="mb-1">CPU is running high</h6>
                                 <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                                 <small class="text-muted">5 days ago</small>
                               </div>
                               <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <a href="javascript:void(0)" class="dropdown-notifications-read"
                                   ><span class="badge badge-dot"></span
                                 ></a>
                                 <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                   ><span class="ti ti-x"></span
                                 ></a>
                               </div>
                             </div>
                           </li>
                         </ul>
                       </li>
                       <li class="dropdown-menu-footer border-top">
                         <a
                           href="javascript:void(0);"
                           class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                           View all notifications
                         </a>
                       </li>
                     </ul>
                   </li>
                   <!--/ Notification -->
   
                   <!-- User -->
                   <li class="nav-item navbar-dropdown dropdown-user dropdown">
                     <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                       <div class="avatar avatar-online">
                         <img src="{{asset('assets/img/avatars/1.png" alt class="h-auto rounded-circle')}}" />
                       </div>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end">
                       <li>
                         <a class="dropdown-item" href="pages-account-settings-account.html">
                           <div class="d-flex">
                             <div class="flex-shrink-0 me-3">
                               <div class="avatar avatar-online">
                                 <img src="{{asset('assets/img/avatars/1.png" alt class="h-auto rounded-circle')}}" />
                               </div>
                             </div>
                             <div class="flex-grow-1">
                               <span class="fw-medium d-block">John Doe</span>
                               <small class="text-muted">Admin</small>
                             </div>
                           </div>
                         </a>
                       </li>
                       <li>
                         <div class="dropdown-divider"></div>
                       </li>
                       <li>
                         <a class="dropdown-item" href="pages-profile-user.html">
                           <i class="ti ti-user-check me-2 ti-sm"></i>
                           <span class="align-middle">My Profile</span>
                         </a>
                       </li>
                       <li>
                         <a class="dropdown-item" href="pages-account-settings-account.html">
                           <i class="ti ti-settings me-2 ti-sm"></i>
                           <span class="align-middle">Settings</span>
                         </a>
                       </li>
                       <li>
                         <a class="dropdown-item" href="pages-account-settings-billing.html">
                           <span class="d-flex align-items-center align-middle">
                             <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                             <span class="flex-grow-1 align-middle">Billing</span>
                             <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20"
                               >2</span
                             >
                           </span>
                         </a>
                       </li>
                       <li>
                         <div class="dropdown-divider"></div>
                       </li>
                       <li>
                         <a class="dropdown-item" href="pages-faq.html">
                           <i class="ti ti-help me-2 ti-sm"></i>
                           <span class="align-middle">FAQ</span>
                         </a>
                       </li>
                       <li>
                         <a class="dropdown-item" href="pages-pricing.html">
                           <i class="ti ti-currency-dollar me-2 ti-sm"></i>
                           <span class="align-middle">Pricing</span>
                         </a>
                       </li>
                       <li>
                         <div class="dropdown-divider"></div>
                       </li>
                       <li>
                         <a class="dropdown-item" href="auth-login-cover.html" target="_blank">
                           <i class="ti ti-logout me-2 ti-sm"></i>
                           <span class="align-middle">Log Out</span>
                         </a>
                       </li>
                     </ul>
                   </li>
                   <!--/ User -->
                 </ul>
               </div>
   
               <!-- Search Small Screens -->
               <div class="navbar-search-wrapper search-input-wrapper d-none">
                 <input
                   type="text"
                   class="form-control search-input container-xxl border-0"
                   placeholder="Search..."
                   aria-label="Search..." />
                 <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
               </div>
             </nav>
   
             <!-- / Navbar -->
   
             <!-- Content wrapper -->
             <div class="content-wrapper">
               <!-- Content -->
   
               <div class="container-xxl flex-grow-1 container-p-y">
                 <h4 class="py-3 mb-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
   
                 <!-- DataTable with Buttons -->
                 <div class="card">
                   <div class="card-datatable table-responsive pt-0">
                     <table class="datatables-basic table">
                       <thead>
                         <tr>
                           <th></th>
                           <th></th>
                           <th>id</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Date</th>
                           <th>Salary</th>
                           <th>Status</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                     </table>
                   </div>
                 </div>
                 <!-- Modal to add new record -->
                 <div class="offcanvas offcanvas-end" id="add-new-record">
                   <div class="offcanvas-header border-bottom">
                     <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                     <button
                       type="button"
                       class="btn-close text-reset"
                       data-bs-dismiss="offcanvas"
                       aria-label="Close"></button>
                   </div>
                   <div class="offcanvas-body flex-grow-1">
                     <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                       <div class="col-sm-12">
                         <label class="form-label" for="basicFullname">Full Name</label>
                         <div class="input-group input-group-merge">
                           <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                           <input
                             type="text"
                             id="basicFullname"
                             class="form-control dt-full-name"
                             name="basicFullname"
                             placeholder="John Doe"
                             aria-label="John Doe"
                             aria-describedby="basicFullname2" />
                         </div>
                       </div>
                       <div class="col-sm-12">
                         <label class="form-label" for="basicPost">Post</label>
                         <div class="input-group input-group-merge">
                           <span id="basicPost2" class="input-group-text"><i class="ti ti-briefcase"></i></span>
                           <input
                             type="text"
                             id="basicPost"
                             name="basicPost"
                             class="form-control dt-post"
                             placeholder="Web Developer"
                             aria-label="Web Developer"
                             aria-describedby="basicPost2" />
                         </div>
                       </div>
                       <div class="col-sm-12">
                         <label class="form-label" for="basicEmail">Email</label>
                         <div class="input-group input-group-merge">
                           <span class="input-group-text"><i class="ti ti-mail"></i></span>
                           <input
                             type="text"
                             id="basicEmail"
                             name="basicEmail"
                             class="form-control dt-email"
                             placeholder="john.doe@example.com"
                             aria-label="john.doe@example.com" />
                         </div>
                         <div class="form-text">You can use letters, numbers & periods</div>
                       </div>
                       <div class="col-sm-12">
                         <label class="form-label" for="basicDate">Joining Date</label>
                         <div class="input-group input-group-merge">
                           <span id="basicDate2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                           <input
                             type="text"
                             class="form-control dt-date"
                             id="basicDate"
                             name="basicDate"
                             aria-describedby="basicDate2"
                             placeholder="MM/DD/YYYY"
                             aria-label="MM/DD/YYYY" />
                         </div>
                       </div>
                       <div class="col-sm-12">
                         <label class="form-label" for="basicSalary">Salary</label>
                         <div class="input-group input-group-merge">
                           <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                           <input
                             type="number"
                             id="basicSalary"
                             name="basicSalary"
                             class="form-control dt-salary"
                             placeholder="12000"
                             aria-label="12000"
                             aria-describedby="basicSalary2" />
                         </div>
                       </div>
                       <div class="col-sm-12">
                         <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                         <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                       </div>
                     </form>
                   </div>
                 </div>
                 <!--/ DataTable with Buttons -->
   
                 <hr class="my-5" />
   
                 <!-- Complex Headers -->
                 <div class="card">
                   <h5 class="card-header">Complex Headers</h5>
                   <div class="card-datatable text-nowrap">
                     <table class="dt-complex-header table table-bordered">
                       <thead>
                         <tr>
                           <th rowspan="2">Name</th>
                           <th colspan="2">Contact</th>
                           <th colspan="3">HR Information</th>
                           <th rowspan="2">Action</th>
                         </tr>
                         <tr>
                           <th>E-mail</th>
                           <th>City</th>
                           <th>Position</th>
                           <th>Salary</th>
                           <th class="border-1">Status</th>
                         </tr>
                       </thead>
                     </table>
                   </div>
                 </div>
                 <!--/ Complex Headers -->
   
                 <hr class="my-5" />
   
                 <!-- Row grouping -->
                 <div class="card">
                   <h5 class="card-header">Row Grouping</h5>
                   <div class="card-datatable table-responsive">
                     <table class="dt-row-grouping table">
                       <thead>
                         <tr>
                           <th></th>
                           <th>Name</th>
                           <th>Position</th>
                           <th>Email</th>
                           <th>City</th>
                           <th>Date</th>
                           <th>Salary</th>
                           <th>Status</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tfoot>
                         <tr>
                           <th></th>
                           <th>Name</th>
                           <th>Position</th>
                           <th>Email</th>
                           <th>City</th>
                           <th>Date</th>
                           <th>Salary</th>
                           <th>Status</th>
                           <th>Action</th>
                         </tr>
                       </tfoot>
                     </table>
                   </div>
                 </div>
                 <!--/ Row grouping -->
   
                 <hr class="my-5" />
   
                 <!-- Multilingual -->
                 <div class="card">
                   <h5 class="card-header">Multilingual</h5>
                   <div class="card-datatable table-responsive">
                     <table class="dt-multilingual table">
                       <thead>
                         <tr>
                           <th></th>
                           <th>Name</th>
                           <th>Position</th>
                           <th>Email</th>
                           <th>Date</th>
                           <th>Salary</th>
                           <th>Status</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                     </table>
                   </div>
                 </div>
                 <!--/ Multilingual -->
               </div>
               <!-- / Content -->
   
               <!-- Footer -->
              
               <!-- / Footer -->
   
               <div class="content-backdrop fade"></div>
             </div>
             <!-- Content wrapper -->
           </div>
           <!-- / Layout page -->
         </div>
   
         <!-- Overlay -->
         <div class="layout-overlay layout-menu-toggle"></div>
   
         <!-- Drag Target Area To SlideIn Menu On Small Screens -->
         <div class="drag-target"></div>
       </div>
       <!-- / Layout wrapper -->
   
       <!-- Core JS -->
       <!-- build:js 'assets/vendor/js/core.js -->
   
 
   
       <!-- endbuild -->
   
       <!-- Vendors JS -->
    
     </body>
   </html>
   