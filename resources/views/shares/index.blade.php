@extends('layout')

@section('content')
<style>
.uper {
  margin-top: 40px;
}
</style>
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}  
</div><br />
@endif
<h1>Ventes</h1>
<a href="{{ route('shares.create')}}" class="btn btn-primary create">Create Article</a>
<div class="uper uperindex">
  @foreach($shares as $share)
  <div class="contain">
    <h2>{{$share->title}}</h2>
    <img src="{{$share->photo}}" alt="{{$share->title}}">
    <p>{{$share->description}}</p>
    <h3>{{$share->price}} €</h3>
    <div class="button">
      <div class="buttons">
        @if(Auth::user()->id == $share->id_user)
        <a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Edit</a>
        <form action="{{ route('shares.destroy', $share->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>
<div>
  @endsection