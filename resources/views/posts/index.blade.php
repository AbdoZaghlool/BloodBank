@extends('layouts.app')
@section('page_title')
Posts
@endsection
@section('content')


  <!-- Main content -->
  <section class="content">


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List Of Posts</h3>
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
        <a class="btn btn-primary" href="{{url('post/create')}}"><i class="fa fa-plus"></i> New Post</a>

        @if(count($records))
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Content</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$record->title}}</td>
                            <td class="text-center">{{$record->content}}</td>
                            <td class="text-center">{{$record->category->name}}</td>
                            <td class="text-center"><a class="btn btn-secondary" href="{{url(route('post.edit',$record->id))}}">Edit</a></td>
                            <td class="text-center">
                                {!! Form::open(['action'=>['PostController@destroy' ,$record->id],'method'=>'delete']) !!}
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
