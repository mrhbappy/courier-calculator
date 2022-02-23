<aside class="main-sidebar bg-light" style="box-shadow: -2px -14px 5px #888888;">
    <!-- Brand Logo -->
    <a href="{{('dashboard')}}" class="brand-link d-block text-center">
      <img src="{{asset('/public')}}/img/logo.png" alt="Hamko Logo" class="brand-image float-none" style="">
      <br><span class="brand-text font-weight-light" style="position: relative;right: -7px;"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel d-block text-center">
        <div class="image">
          @php $profile = Auth::user() @endphp
          <img src="{{(!empty($profile->image))?url('public/img/'.$profile->image):url('public/img/null.png')}}" class="profile-user-img img-fluid img-square" alt="User Image" style="width: 4.1rem;">

        </div>
        <br>
        <div class="info">
          <a href="#" style="font-size:16px" class="text-dark">{{Auth::user()->name}}</a> <br>
        </div><br>
        <a style="" href="{{ route('logout') }}" onclick="event.preventDefault(); $('#logout-form').submit();"  class="p-2"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
        <br>

      </div>
      <hr class="m-2">

      <!-- SidebarSearch Form
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">

              <i class="nav-icon fas fa-tachometer-alt" aria-hidden="true"></i>


              <p>
                Dashboard

              </p>
            </a>
          </li>
          @can('profile-view')
          <li class="nav-item">
            <a href="{{route('profile.index')}}" class="nav-link">
                <i class="fa fa-user nav-icon" aria-hidden="true"></i>
              <p>
                My Profile

              </p>
            </a>
          </li>
          @endcan
          @can('user-list')
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
                <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                 <p>
                    Users
                     <i class="right fas fa-angle-left"></i>
                 </p>
             </a>

         </li>
          @endcan
          @can('role-list')
          <li class="nav-item">
            <a href="{{route('role.index')}}" class="nav-link">

                <i class="nav-icon fas fa-edit" aria-hidden="true"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          @endcan
          @can('rule-list')
          <li class="nav-item">
            <a href="{{route('shipping-rule.index')}}" class="nav-link">
                <i class="nav-icon fas fa-edit" aria-hidden="true"></i>
              <p>
                Shipping Rule
              </p>
            </a>
          </li>
          @endcan

          @can('calculator-create')
          <li class="nav-item">
            <a href="{{route('shipping.calculator.create')}}" class="nav-link">
                <i class="nav-icon fas fa-edit" aria-hidden="true"></i>
              <p>
                Shipping Calculator
              </p>
            </a>
          </li>
          @endcan

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


