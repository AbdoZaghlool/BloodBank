@extends('layouts.app')
@inject('clients', 'App\Models\Client')
@inject('donations', 'App\Models\DonationRequest')
@section('page_title')
    Admin Dashboard
@endsection
@section('content')


  <!-- Main content -->
  <section class="content">

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12 m-1">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">our Clients</span>
                <span class="info-box-number">{{$clients->count()}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 m-1">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fa fa-ambulance"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Donation Request</span>
                <span class="info-box-number">{{$donations->count()}}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p > welcome,<strong> {{ auth()->user()->name }} </strong>You are logged in!
        </p>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>









@endsection
