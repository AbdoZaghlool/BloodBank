@extends('layouts.app')
@inject('model', 'App\Models\Role')
{{--@inject('permissions', 'App\Models\Permission')--}}

@section('page_title')
Roles
@endsection
@section('content')


  <!-- Main content -->
  <section class="content">


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add New Role</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body">

        @include('layouts.partials.errors')
            {!! Form::model($model, ['action'=>'RoleController@store']) !!}

            <div class="form-group">
                <label for="title">Name</label>
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="content">Display Name</label>
                {!! Form::text('display_name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="row">
<!--                --><?// print_r($permessions)?>
                    @forelse ($permissions as $key => $value)
                    <div class="col-sm-2">
                        <div class="form-check">
{{--                            <input name="permission_list[]" class="custom-checkbox" type="checkbox" value="{{$value}}" >--}}
                            {!! Form::checkbox('permission_list[]', $value) !!}

                            <label class="form-check-label" for="defaultCheck1">
                                {{$key}}
                            </label>
                        </div>
                    </div>
                    @empty
                       echo ('no permissions yet !');
                    @endforelse
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

            {!! Form::close() !!}

      </div>
    </div>
  </section>

@endsection
