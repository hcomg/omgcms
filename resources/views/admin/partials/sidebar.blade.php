<!-- Sidebar -->
<div class="sidebar">
  <div class="sidebar-content">
    <!-- User dropdown -->
    <div class="user-menu dropdown">
      <a href="#"
         class="dropdown-toggle">
        <img alt="profile image" src="{{ asset('assets/images/default-avatar.png') }}"
             class="img-circle">
        <div class="user-info">
          {{ (Auth::user()->display_name) ? Auth::user()->display_name : Auth::user()->name }}
          <span>{{ time_elapsed_string(Auth::user()->last_login) }}</span>
        </div>
      </a>

    </div>
    <!-- /user dropdown -->
    <!-- Main navigation -->
    <ul class="navigation">
      <li class="nav-item {{ is_active_menu('admin.page_overview') }}">
        <a href="{{ url('admin/overview') }}" class="nav-link nav-toggle">
          <i class="fa fa-home"></i>
          <span class="title">Overview</span>
        </a>
      </li>
      <li class="navigation-header">
        <span>{{ trans('general.system_settings') }}</span>
      </li>
      <li class="nav-item {{ is_active_menu('admin.page_settings') }}">
        <a href="{{ url('admin/settings') }}" class="nav-link nav-toggle">
          <i class="fa fa-cog"></i>
          <span class="title">Settings</span>
        </a>
      </li>
      <li class="nav-item {{ is_active_menu('admin.page_languages') }}">
        <a href="{{ url('admin/languages') }}" class="nav-link nav-toggle">
          <i class="fa fa-language"></i>
          <span class="title">Languages</span>
        </a>
      </li>
    </ul>
    <!-- /main navigation -->
  </div>
</div>
<!-- /sidebar -->