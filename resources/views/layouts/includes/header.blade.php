<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Student Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ request()->is('student*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('student.index') }}">Students</a>
        </li>
        <li class="nav-item {{ request()->is('mark*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('mark.index') }}">Marks</a>
        </li>
      </ul>
    </div>
  </nav>
</header>