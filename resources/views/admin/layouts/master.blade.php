<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
  @include('admin.partials.head_tags')
</head>

<body class="" id="module">

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

@include('admin.partials.navbar')

<!-- Page container -->
<div class="page-container col-md-12 ">

  @include('admin.partials.sidebar')

  <!-- Page content -->
  <div class="page-content">
    <ol class="breadcrumb">
      <li><a href="{{ url('admin') }}">{{ trans('page.home.title') }}</a></li>
      <li class="active">@yield('title')</li>
    </ol>
    <div class="clearfix"></div>

    @yield('content')

    @include('admin.partials.footer')

  </div>
  <!-- /page content -->
  <div class="clearfix"></div>
</div>
<!-- /page container -->

@include('admin.partials.modal')
@include('admin.partials.scripts')

</body>
</html>
