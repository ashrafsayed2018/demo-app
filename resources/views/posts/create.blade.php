@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-8 offset-md-2">

             <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                     <label for="title"> Post Title </label>
                     <input type="text" name="title" class="form-control" id="content">
                 </div>
                 <div class="form-group">
                     <label for="content"> Content</label>
                     <input type="text" name="content" class="form-control" id="content">
                 </div>
                 <div class="form-group">
                     <select name="category" class="form-control">

                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach

                     </select>
                 </div>
                 <div class="form-group">
                     <label for="image"> Image </label>
                     <input type="file" name="image" class="form-control" id="image">
                 </div>
                 <div class="form-group">
                    <input type="submit" value="create" class="btn btn-success">
                </div>
             </form>
          </div>
      </div>
  </div>

@endsection
