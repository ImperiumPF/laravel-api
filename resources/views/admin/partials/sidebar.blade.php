<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{{ url('/backend') }}}" class="brand-link">
    <img src="{{ asset('/assets/images/dashboardLogo.png') }}" alt="Imperium Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light">Imperium</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="{{{ url('/backend') }}}" class="nav-link {{{ (Request::is('backend') ? 'active' : '') }}}">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>{{ __('admin.dashboard') }}</p>
          </a>
        </li>

        @if (Auth::user()->hasRole('Administrador'))
        <!-- Users -->
        <li class="nav-item has-treeview {{{ (Request::is('backend/users*') ? 'menu-open' : '') }}}">
          <a href="#" class="nav-link {{{ (Request::is('backend/users*') ? 'active' : '') }}}">
            <i class="nav-icon fa fa-users"></i>
            <p>{{ __('users.users') }}
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{{ url('/backend/users') }}}" class="nav-link {{{ (Request::is('backend/users') ? 'active' : '') }}}">
                <i class="fa fa-table nav-icon"></i>
                <p>{{ __('users.listU') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{{ url('/backend/users/create') }}}" class="nav-link {{{ (Request::is('backend/users/create') ? 'active' : '') }}}">
                <i class="fa fa-user-plus nav-icon"></i>
                <p>{{ __('users.add') }}</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Roles -->
        <li class="nav-item has-treeview {{{ (Request::is('backend/roles*') ? 'menu-open' : '') }}}">
          <a href="#" class="nav-link {{{ (Request::is('backend/roles*') ? 'active' : '') }}}">
            <i class="nav-icon fa fa-gavel"></i>
            <p>{{ __('roles.roles') }}
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{{ url('/backend/roles') }}}" class="nav-link {{{ (Request::is('backend/roles') ? 'active' : '') }}}">
                <i class="fa fa-table nav-icon"></i>
                <p>{{ __('roles.listR') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{{ url('/backend/roles/create') }}}" class="nav-link {{{ (Request::is('backend/roles/create') ? 'active' : '') }}}">
                <i class="fa fa-plus-square-o nav-icon"></i>
                <p>{{ __('roles.add') }}</p>
              </a>
            </li>
          </ul>
        </li>
        @endif

        <!-- Categories -->
        <li class="nav-item has-treeview {{{ (Request::is('backend/categories*') ? 'menu-open' : '') }}}">
          <a href="#" class="nav-link {{{ (Request::is('backend/categories*') ? 'active' : '') }}}">
            <i class="nav-icon fa fa-map-signs"></i>
            <p>{{ __('categories.categories') }}
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{{ url('/backend/categories') }}}" class="nav-link {{{ (Request::is('backend/categories') ? 'active' : '') }}}">
                <i class="fa fa-table nav-icon"></i>
                <p>{{ __('categories.list') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{{ url('/backend/categories/create') }}}" class="nav-link {{{ (Request::is('backend/categories/create') ? 'active' : '') }}}">
                <i class="fa fa-plus-square-o nav-icon"></i>
                <p>{{ __('categories.add') }}</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Places -->
        <li class="nav-item has-treeview {{{ (Request::is('backend/places*') ? 'menu-open' : '') }}}">
          <a href="#" class="nav-link {{{ (Request::is('backend/places*') ? 'active' : '') }}}">
            <i class="nav-icon fa fa-map-marker"></i>
            <p>
                {{ __('places.places') }}
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{{ url('/backend/places') }}}" class="nav-link {{{ (Request::is('backend/places') ? 'active' : '') }}}">
                <i class="fa fa-table nav-icon"></i>
                <p>{{ __('places.list') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{{ url('/backend/places/create') }}}" class="nav-link {{{ (Request::is('backend/places/create') ? 'active' : '') }}}">
                <i class="fa fa-plus-square-o nav-icon"></i>
                <p>{{ __('places.add') }}</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>