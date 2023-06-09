 <!-- sidebar menu area start -->
 @php
     $usr = Auth::user();
 @endphp
 <div class="sidebar-menu">
     <div class="sidebar-header">
         <div class="logo">
             <a href="{{ route('admin.dashboard') }}">
                 <h2 class="text-white">Admin</h2>
             </a>
         </div>
     </div>
     <div class="main-menu">
         <div class="menu-inner">
             <nav>
                 <ul class="metismenu" id="menu">

                     {{-- @if ($usr->can('dashboard.view')) --}}
                     <li class="active">
                         <a href="javascript:void(0)" aria-expanded="true"><i
                                 class="ti-dashboard"></i><span>dashboard</span></a>
                         <ul class="collapse">
                             <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a
                                     href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                         </ul>
                     </li>
                     {{-- @endif --}}

                     {{-- @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') || $usr->can('role.delete')) --}}
                     <li>
                         <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                                 Roles & Permissions
                             </span></a>
                         <ul
                             class="collapse {{ Route::is('admin.role.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                             @if ($usr->can('read roles'))
                                 <li
                                     class="{{ Route::is('admin.roles') || Route::is('admin.roles.edit') ? 'active' : '' }}">
                                     <a href="{{ route('admin.roles') }}">All Roles</a>
                                 </li>
                             @endif
                             <li
                                 class="{{ Route::is('admin.permissions') || Route::is('admin.permissions.edit') ? 'active' : '' }}">
                                 <a href="{{ route('admin.permissions') }}">All Permissions</a>
                             </li>
                             @if ($usr->can('create role'))
                                 <li class="{{ Route::is('admin.roles.create') ? 'active' : '' }}"><a
                                         href="{{ route('admin.roles.create') }}">Create Role</a></li>
                             @endif
                         </ul>
                     </li>
                     {{-- @endif --}}


                     @if ($usr->can('manage admins'))
                         <li>
                             <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                     Admins
                                 </span></a>
                             <ul
                                 class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">

                                 @if ($usr->can('read admin'))
                                     <li
                                         class="{{ Route::is('admin.admins.index') || Route::is('admin.admins.edit') ? 'active' : '' }}">
                                         <a href="#">All Admins</a>
                                     </li>
                                 @endif

                                 @if ($usr->can('create admin'))
                                     <li class="{{ Route::is('admin.admins.create') ? 'active' : '' }}"><a
                                             href="#">Create Admin</a></li>
                                 @endif
                             </ul>
                         </li>
                     @endif

                     @if ($usr->can('manage users'))
                         <li>   
                             <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                     Users
                                 </span></a>
                             <ul class="collapse ">
                                 <li class="{{ Route::is('admin.users') ? 'active' : '' }}"><a
                                         href="{{ route('admin.users') }}">All Users</a>
                                 </li>

                                 @if ($usr->can('create user'))
                                     <li class="{{ Route::is('admin.user.create') ? 'active' : '' }}"><a
                                             href="{{ route('admin.user.create') }}">Create User</a> </li>
                                 @endif

                             </ul>
                         </li>
                     @endif

                 </ul>
             </nav>
         </div>
     </div>
 </div>
 <!-- sidebar menu area end -->
