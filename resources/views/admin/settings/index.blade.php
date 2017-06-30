@extends('admin.layouts.master')

@section('title', 'Settings')

@section('content')
  <form method="POST" action="{{ route('admin.action_settings_save') }}" accept-charset="UTF-8">
    @if($errors->any())
      <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
        <span>{{$errors->first()}}</span>
      </div>
    @endif
    <div class="tabbable-custom tabbable-tabdrop">
      <ul class="nav nav-tabs" id="settings-tab">
        @foreach($settingGroups as $index => $group)
          <li class="{{ ($index == 0) ? 'active' :'' }}">
            <a data-toggle="tab" href="#group_{{ $group->id }}">{{ $group->name }}</a>
          </li>
        @endforeach
      </ul>
      <div class="tab-content" style="overflow: inherit">
        @foreach($settingGroups as $index => $group)
        <div class="tab-pane {{ ($index == 0) ? 'active' :'' }}" id="group_{{ $group->id }}">
          @foreach($group->settings as $setting)
          <div class="col-md-6">
            <div class="form-group ">
              <label for="rich_editor" class="control-label">{{ $setting->setting_key }}</label>
              {!! generate_setting_input_field($setting) !!}
            </div>
            <div class="clearfix"></div>
          </div>
          @endforeach
        </div>
        @endforeach
        <div class="clearfix"></div>
        <div class="text-right col-xs-12">
          {{ csrf_field() }}
          <button type="submit" name="submit" value="save" class="btn btn-info">
            <i class="fa fa-save"></i> Save
          </button>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </form>

@endsection