<!-- sidebar.blade.php -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a class="btn btn-default" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                </li>
            @endguest
        </ul>
    </div>

  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('/bower_components/admin-lte/dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Reccuring Deposit</span>
    </a>

    <!-- Sidebar -->
    <!-- <div class="sidebar"> -->
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="{{ asset('/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info text-white">
          {{ Auth::user()->name }}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item has-treeview">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ route('importusers.index') }}" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>
                Import Users
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('rdusers.create') }}" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Create Users
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('accholder') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Account Holders
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('dailycollections.status') }}" class="nav-link">
              <i class="nav-icon fas fa-filter"></i>
              <p>Filter Users by collection status</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('dailycollections.date') }}" class="nav-link">
              <i class="nav-icon fas fa-filter"></i>
              <p>Filter Users by Date</p>
            </a>
          </li>

      </nav> 
    </div>
    <!-- /.sidebar -->
  </aside>