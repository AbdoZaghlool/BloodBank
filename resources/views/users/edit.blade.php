@extends('layouts.app')
@section('page_title')
Users
@endsection
{{--@inject("model","App\Models\User");--}}
@section('content')


  <!-- Main content -->
  <section class="content">


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add New User</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body">

        @include('layouts.partials.errors')

            {!! Form::model($model, ['action'=>['UserController@update' ,$model->id],'method'=>'PUT']) !!}

            <div class="form-group">
                <label for="name">Name</label>
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

           <div class="form-group">
                <label for="email">Email</label>
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>

           <div class="form-group">
                <label for="phone">Phone</label>
                {!! Form::text('phone', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>

            {!! Form::close() !!}

      </div>
    </div>
  </section>

@endsection
