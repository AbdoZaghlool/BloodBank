@extends('layouts.app')
@section('page_title')
Donations
@endsection
@section('content')


  <!-- Main content -->
  <section class="content">


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List Of Donaitons</h3>
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
        {{-- <a class="btn btn-primary" href="{{url('city/create')}}"><i class="fa fa-plus"></i> New City</a> --}}

        @if(($record))
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Paitant Name</th>
                            <th class="text-center">Paitant Phone</th>
                            <th class="text-center">Paitant Age</th>
                            <th class="text-center">Blood Type</th>
                            <th class="text-center">Bags Number</th>
                            <th class="text-center">Hospital Name</th>
                            <th class="text-center">Hospital Address</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Details</th>
                            <th class="text-center">Published At</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">{{$record->paitant_name}}</td>
                            <td class="text-center">{{$record->paitant_phone}}</td>
                            <td class="text-center">{{$record->paitant_age}}</td>
                            <td class="text-center">{{$record->bloodType->name}}</td>
                            <td class="text-center">{{$record->bags_num}}</td>
                            <td class="text-center">{{$record->hospital_name}}</td>
                            <td class="text-center">{{$record->hospital_address}}</td>
                            <td class="text-center">{{$record->city->name}}</td>
                            <td class="text-center">{{$record->details}}</td>
                            <td class="text-center">{{$record->created_at}}</td>
                            <td class="text-center">
                                {!! Form::open(['action'=>['DonationController@destroy' ,$record->id],'method'=>'delete']) !!}
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
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
