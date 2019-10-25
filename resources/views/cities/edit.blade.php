@extends('layouts.app')
@section('page_title')
Cities
@endsection
@section('content')


  <!-- Main content -->
  <section class="content">


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add New City</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body">

        @include('errors')

            {!! Form::model($model, ['action'=>['CityController@update' ,$model->id],'method'=>'PUT']) !!}

            <div class="form-group">
                <label for="name">Name</label>
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>

            {!! Form::close() !!}

      </div>
    </div>
  </section>

@endsection
