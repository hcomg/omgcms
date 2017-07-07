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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>OMG! CMS - {{ trans('page.login.title') }}</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon shortcut" href="{{ asset('favicon.ico') }}">

  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/bootstrap/css/bootstrap.min.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/pace/pace-theme-minimal.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/mcustom-scrollbar/jquery.mCustomScrollbar.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/css/core.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/css/themes/default.css') }}">

</head>

<body class="login" id="module">

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="content">
  <h3 class="form-title font-green">{{ trans('page.login.title') }}</h3>
  <div class="content-wrapper">
    <form method="POST" action="{{ url('admin/login') }}" class="login-form">
      @if($errors->any())
      <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
        <span>{{$errors->first()}}</span>
      </div>
      @endif
      <div class="form-group">
        <label class="control-label">{{ trans('form.email.label') }}</label>
        <input class="form-control form-control-solid placeholder-no-fix"
               placeholder="{{ trans('form.email.placeholder') }}"
               name="email" type="email" value="{{ old('email') }}" />
      </div>

      <div class="form-group">
        <label class="control-label">{{ trans('form.password.label') }}</label>
        <input class="form-control form-control-solid placeholder-no-fix"
               placeholder="{{ trans('form.password.placeholder') }}"
               name="password" type="password" />
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-xs-6">
            <div class="checkbox checkbox-primary">
              <label class="check mt-checkbox mt-checkbox-outline">
                <input class="styled" name="remember" type="checkbox" value="1"> {{ trans('form.remember_me') }}
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group form-actions">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> {{ trans('form.sign_in') }}</button>
      </div>

    </form>
  </div>
</div>
<div class="copyright"> Copyright {{ date('Y') }} &copy; OMGCMS. Version: <span>1.0</span> </div>

</body>
</html>
