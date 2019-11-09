@extends('layouts.app')
@section('page_title')
Settings
@endsection
@section('content')


  <!-- Main content -->
  <section class="content">


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Update Settings</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body">

        @include('layouts.partials.errors')
        {{-- {!! Form::model($model, ['action'=>['PostController@update', $model->id], 'method'=>'put']) !!} --}}

        {!! Form::model($settings, ['action'=>['SettingController@update', $settings->id], 'method'=>'PUT' ]) !!}

        <div class="form-group">
            <label for="notifications_settings_text">Title</label>
            {!! Form::text('notifications_settings_text', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="about_app">About App</label>
            {!! Form::text('about_app', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            {!! Form::text('phone', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="fb_url">Facebook</label>
            {!! Form::text('fb_url', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="tw_url">Twiter</label>
            {!! Form::text('tw_url', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="insta_url">Instagram</label>
            {!! Form::text('insta_url', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="youTube_url">YouTube</label>
            {!! Form::text('youTube_url', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="whatsApp_url">Whats App</label>
            {!! Form::text('whatsApp_url', null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>

        {!! Form::close() !!}
      </div>
    </div>
  </section>

@endsection
