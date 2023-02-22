
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('admin.index') }}"><span
            class="logo-name">Admin</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
          <a href="{{ route('admin.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Employee Manage</li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Employee List</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('admin.employee.get_all') }}">All Employees</a></li>
            <li><a class="nav-link" href="{{ route('admin.employee.get_active') }}">Active Employees</a></li>
            <li><a class="nav-link" href="{{ route('admin.employee.get_banned') }}">Banned Employees</a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="{{ route('admin.employee.post_data_create') }}">Add Employee</a></li>
        <li class="menu-header">Reports</li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Attandance Report</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('admin.employee.get_attandance') }}">All Attandance</a></li>
            <li><a class="nav-link" href="{{ route('admin.employee.get_present') }}">Present Employee</a></li>
            <li><a class="nav-link" href="{{ route('admin.employee.get_absence') }}">Absence Employee</a></li>
          </ul>
        </li>
      </ul>
    </aside>
  </div>
