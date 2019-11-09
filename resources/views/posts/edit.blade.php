@extends('layouts.app')
@section('page_title')
Categories
@endsection
@section('content')


  <!-- Main content -->
  <section class="content">


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Update Category</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body">

        @include('layouts.partials.errors')
        {!! Form::model($model, ['action'=>['PostController@update', $model->id], 'method'=>'put']) !!}

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
                    <option value="{{ $category->id }}" @if($category->id == $model->category_id) echo selected  @endif >{{ $category->name }}</option>
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
