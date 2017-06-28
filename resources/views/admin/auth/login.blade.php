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

  <title>OMG! CMS - Login to system</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon shortcut" href="{{ asset('favicon.ico') }}">

  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/bootstrap/css/bootstrap.min.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/font-awesome/css/font-awesome.min.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/simple-line-icons/css/simple-line-icons.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/select2/css/select2.min.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/select2/css/select2-bootstrap.min.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/pace/pace-theme-minimal.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/toastr/toastr.min.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/mcustom-scrollbar/jquery.mCustomScrollbar.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/bootstrap-tabdrop/css/tabdrop.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/packages/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/css/core.css') }}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/css/themes/default.css') }}">

  <script src="{{ asset('assets/packages/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/dropzone.js') }}"></script>

</head>

<body class="login" id="module">

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="content">
  <h3 class="form-title font-green">Login to system</h3>
  <div class="content-wrapper">
    <form method="POST" action="{{ url('admin/login') }}" class="login-form">
      <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span></span>
      </div>
      <div class="form-group">
        <label class="control-label">Email</label>
        <input class="form-control form-control-solid placeholder-no-fix" placeholder="Email"
               name="email" type="email" />
      </div>

      <div class="form-group">
        <label class="control-label">Password</label>
        <input class="form-control form-control-solid placeholder-no-fix" placeholder="Password"
               name="password" type="password" />
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-xs-6">
            <div class="checkbox checkbox-primary">
              <label class="check mt-checkbox mt-checkbox-outline">
                <input class="styled" name="remember" type="checkbox" value="1"> Remember me?
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group form-actions">
        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Sign in</button>
      </div>

    </form>
  </div>
</div>
<div class="copyright"> Copyright {{ date('Y') }} &copy; OMGCMS. Version: <span>1.0</span> </div>

<div id="delete-crud-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="til_img"></i><strong>Confirm delete</strong></h4>
      </div>

      <div class="modal-body with-padding">
        <p>Do you really want to delete this record?</p>
      </div>

      <div class="modal-footer">
        <a class="pull-left btn btn-danger" id="delete-crud-entry" href="#">Delete</a>
        <button class="pull-right btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- end Modal -->
<div id="delete-many-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="til_img"></i><strong>Confirm delete</strong></h4>
      </div>

      <div class="modal-body with-padding">
        <p>Do you really want to delete this record?</p>
      </div>

      <div class="modal-footer">
        <a class="pull-left btn btn-danger" id="delete-many-entry" href="#">Delete</a>
        <button class="pull-right btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- end Modal -->

<script type="text/javascript">

  var OMGCMS = OMGCMS || {};

  OMGCMS.variables = {
    youtube_api_key: 'AIzaSyCV4fmfdgsValGNR3sc-0W3cbpEZ8uOd60'
  };

  OMGCMS.routes = {
    home: '{{ url('/') }}',
    admin: '{{ url('admin') }}',
    media: '{{ url('admin/media/popup') }}',
    media_upload_from_editor: '{{ url('admin/media/files/upload-from-editor') }}',
    change_plugin_status: '{{ url('admin/plugins/change%7D') }}'
  };

  OMGCMS.languages = {
    'tables': {
      'filter': 'Type to filter...',
      'activated': 'activated',
      'deactivated': 'deactivated',
      'excel': 'Excel',
      'export': 'Export',
      'csv': 'CSV',
      'pdf': 'PDF',
      'print': 'Print',
      'reset': 'Reset',
      'reload': 'Reload'
    },
    'notices_msg': {
      'success': 'Success!',
      'error': 'Error!',
      'processing_request': 'We are processing your request.!',
    },
    'pagination': {
      'previous': '&laquo; Previous',
      'next': 'Next &raquo;'
    },
    'media': {
      'processing': 'Processing...',
      'not_valid_youtube_link': 'The url supplied was not a valid YouTube link...',
      'env_not_config': 'This environment is not configured for Youtube media attachments.'
    },
    'system': {
      'character_remain': 'character(s) remain'
    }
  };

</script>

<script type="text/javascript">
  $(document).ready(function () {

  });
</script>

<script src="{{ asset('assets/packages/respond.min.js') }}"></script>
<script src="{{ asset('assets/packages/excanvas.min.js') }}"></script>
<script src="{{ asset('assets/packages/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('assets/packages/modernizr/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/packages/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/packages/jquery.uniform/jquery.uniform.min.js') }}"></script>
<script src="{{ asset('assets/packages/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/packages/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/core.js') }}"></script>
<script src="{{ asset('assets/packages/jquery-cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('assets/packages/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/packages/pace/pace.min.js') }}"></script>
<script src="{{ asset('assets/packages/mcustom-scrollbar/jquery.mCustomScrollbar.js') }}"></script>
<script src="{{ asset('assets/packages/stickytableheaders/jquery.stickytableheaders.js') }}"></script>
<script src="{{ asset('assets/packages/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}"></script>
<script src="{{ asset('assets/packages/jquery-waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/packages/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/packages/jquery-validation/js/additional-methods.min.js') }}"></script>
<script src="{{ asset('assets/plugins/language/js/language-global.js') }}"></script>

</body>
</html>
