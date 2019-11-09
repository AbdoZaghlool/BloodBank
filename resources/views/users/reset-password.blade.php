@extends('layouts.app')
@inject('model','App\Models\User')
@section('page_title')
Users
@endsection
@section('content')


     {!! Form::model($model, ['action'=>  route('password.email')   ]) !!}
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Your Email</label>
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

                {!! Form::close() !!}




@endsection
