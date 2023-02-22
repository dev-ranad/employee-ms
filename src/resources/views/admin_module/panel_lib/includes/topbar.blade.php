@php

$admin = App\Models\Admin::find(Auth::guard('admin')->id());
@endphp
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                                collapse-btn"> <i data-feather="align-justify"></i></a></li>
        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
            <i data-feather="maximize"></i>
          </a></li>
      </ul>
    </div>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown"
          class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('src/public/upload/admin/'. $admin->image) }}"
            class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
        <div class="dropdown-menu dropdown-menu-right pullDown">
          <div class="dropdown-title">Hello {{ $admin->name }}</div>
          <div class="dropdown-divider"></div>
          <a href="{{ route('admin.exit') }}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
            Exit
          </a>
        </div>
      </li>
    </ul>
  </nav>
