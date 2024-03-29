@extends('layouts.app')
@inject('model', 'App\Models\Post')

@section('page_title')
Posts
@endsection
@section('content')


  <!-- Main content -->
  <section class="content">


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add New Post</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body">

        @include('layouts.partials.errors')
            {!! Form::model($model, ['action'=>'PostController@store']) !!}

            <div class="form-group">
                <label for="title">Title</label>
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                {!! Form::text('content', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id">
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        no categories yet !
                    @endforelse
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

            {!! Form::close() !!}

      </div>
    </div>
  </section>

@endsection
