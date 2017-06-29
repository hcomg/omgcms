<!-- Navbar -->
<div class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">

    <button type="button" class="navbar-toggle offcanvas">
      <span class="sr-only">Toggle navigation</span>
      <i class="icon icon-menu"></i>
    </button>
    <a class="navbar-brand" href="{{ url('admin') }}">
      <span>OMG!</span>CMS
    </a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
      <span class="sr-only">Toggle navbar</span>
      <i class="icon icon-grid"></i>
    </button>
    <div class="menu-toggler sidebar-toggle">
      <span></span>
    </div>
  </div>

  <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">

    <li class="dropdown">
      <a class="dropdown-toggle dropdown-header-name" href="{{ url('/') }}" target="_blank">
        <i class="fa fa-globe"></i> <span>View website</span>
      </a>
    </li>

    <li class="dropdown">
      <a class="dropdown-toggle dropdown-header-name" href="{{ url('admin/config') }}">
        <i class="fa fa-cogs"></i>
      </a>
    </li>

    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="icon-envelope-open"></i>
        <span class="badge badge-default"> 1 </span>
      </a>
      <ul class="dropdown-menu">
        <li class="external">
          <h3>You have <span class="bold">1 New</span> Messages</h3>
          <a href="javascript:;">View all</a>
        </li>
        <li>
          <ul class="dropdown-menu-list scroller" style="height: 70px;" data-handle-color="#637283">
            <li>
              <a href="#">
                <span class="photo">
                    <img src="{{ asset('assets/images/default-avatar.jpg') }}" class="img-circle" alt="Demo contact">
                </span>
                <span class="subject">
                  <span class="from"> Demo contact </span>
                  <span class="time">2017-01-15 16:19:27 </span>
                </span>
                <span class="message"> 0123456789 - admin@admin.com </span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>

    <li class="dropdown dropdown-user">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <img alt="{{ (Auth::user()->display_name) ? Auth::user()->display_name : Auth::user()->name }}"
             class="img-circle" src="{{ asset('assets/images/default-avatar.png') }}" />
        <span class="username username-hide-on-mobile">
          {{ (Auth::user()->display_name) ? Auth::user()->display_name : Auth::user()->name }}
        </span>
        <i class="fa fa-angle-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-default">
        <li><a href="#"><i class="icon-user"></i> Profile</a></li>
        <li>
          <a href="javascript:;" onclick="return document.getElementById('logoutForm').submit();">
            <i class="icon-key"></i> Logout
          </a>
        </li>
      </ul>
      <form style="display: none;" action="{{ route('admin.page_logout') }}" method="post" id="logoutForm">
        {{ csrf_field() }}
      </form>
    </li>
  </ul>
</div>
<!-- /navbar -->