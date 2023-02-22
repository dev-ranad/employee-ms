<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('index') }}"><span
            class="logo-name">Employee</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
          <a href="{{ route('index') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Employee Attandance</li>
        <li><a class="nav-link" href="{{ route('get_attandance_show') }}">Give Attandance</a></li>
        <li class="menu-header">Reports</li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Attandance Report</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('get_all') }}">All Attandance</a></li>
            <li><a class="nav-link" href="{{ route('get_present') }}">Present Employee</a></li>
            <li><a class="nav-link" href="{{ route('get_absence') }}">Absence Employee</a></li>
          </ul>
        </li>
      </ul>
    </aside>
  </div>
