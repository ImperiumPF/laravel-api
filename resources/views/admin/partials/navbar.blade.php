<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#">
        <i class="fa fa-bars"></i>
      </a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <p>{{{ Auth::user()->email }}}</p>
        <div class="dropdown-divider"></div>
        <a href="/logout" class="dropdown-item">
          <i class="fa fa-times mr-2"></i> Terminar Sessão
        </a>

      </div>
    </li>
  </ul>
</nav>