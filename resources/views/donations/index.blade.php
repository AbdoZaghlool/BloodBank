@extends('layouts.app')

@inject('cities', 'App\Models\City')
@inject('types', 'App\Models\BloodType')

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
          <div>
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
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::select('city_id',$cities->pluck('name'),null,[
                            'placeholder' => 'select city',
                            'class' => 'select2 form-control',
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::select('blood_type_id',$types->pluck('name'),null,[
                            'placeholder' => 'select blood type',
                            'class' => 'select2 form-control',
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
             </div>

        @if(count($records))
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Paitant Name</th>
                            <th class="text-center">Hospital Name</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Show</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$record->paitant_name}}</td>
                            <td class="text-center">{{$record->hospital_name}}</td>
                            <td class="text-center">{{$record->city->name}}</td>
                            <td class="text-center"><a href="donation/show?id={{$record->id}}" >more details</a> </td>
                            <td class="text-center">
                                {!! Form::open(['action'=>['DonationController@destroy' ,$record->id],'method'=>'delete']) !!}
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
