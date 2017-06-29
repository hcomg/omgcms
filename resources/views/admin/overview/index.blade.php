@extends('admin.layouts.master')

@section('title', 'Overview')

@section('content')
  <div class="portlet light bordered portlet-no-padding">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-home font-dark"></i>
        <span class="caption-subject font-dark">@yield('title')</span>
      </div>
    </div>
    <div class="portlet-body">
      {{----}}
    </div>
  </div>
@endsection