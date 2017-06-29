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
<script src="{{ asset('assets/packages/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/packages/datatables/extensions/Buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/packages/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('assets/packages/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/packages/datatables/extensions/Buttons/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/language/js/language-global.js') }}"></script>
<script src="{{ asset('assets/js/app_modules/datatables.js') }}"></script>