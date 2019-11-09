@extends('layouts.app')
@section('page_title')
Contacts
@endsection
@section('content')


  <!-- Main content -->
  <section class="content">


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List Of Contacts</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body">
          <br>
          @include('layouts.partials.errors')
          <br>
          {!! Form::open(['method' => 'get']) !!}
          <div class="row">
              <div class="col-md-3">
                  <div class="form-group">
                      {!! Form::text('name',request()->input('name'),[
                      'placeholder' => 'client name',
                      'class' => 'form-control'
                      ]) !!}
                  </div>
              </div>
              <div class="col-md-1">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
              {!! Form::close() !!}
        @if(count($records))
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Subject</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Created_At</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$record->name}}</td>
                            <td class="text-center">{{$record->email}}</td>
                            <td class="text-center">{{$record->phone}}</td>
                            <td class="text-center">{{$record->subject}}</td>
                            <td class="text-center">{{$record->message}}</td>
                            <td class="text-center">{{$record->created_at}}</td>
                            <td class="text-center">
                                {!! Form::open(['action'=>['ContactController@destroy' ,$record->id],'method'=>'delete']) !!}
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else

            <div class="alert alert-danger" role="alert">
                    <p>No data found!</p>
            </div>

        @endif

      </div>
    </div>
  </section>









@endsection
