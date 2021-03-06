@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('shares.update', $share->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="title">Title :</label>
          <input type="text" class="form-control" name="title" value={{ $share->title }} />
        </div>
        <div class="form-group">
          <label for="description">Description :</label>
          <input type="text" class="form-control" name="description" value={{ $share->description }} />
        </div>
        <div class="form-group">
          <label for="photo">Photo :</label>
          <input type="text" class="form-control" name="photo" value={{ $share->photo }} />
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="text" class="form-control" name="price" value={{ $share->price }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection