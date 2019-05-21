@extends('layouts.app')

@section('title')
  <title>Edit {{$item->title}}</title>
@endsection

@section('content')
  <div>
    <h2>Edit {{$item->title}}</h2>
    <form method="POST" action={{"/lines/$line->id/items/$item->id"}}>
      @method('PATCH')
      {{ csrf_field() }}

      @if ($errors->any())
        <div class="notification is-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div>
        Item title: <br>
        <input type="text" name="title" value="{{$item->title}}" required>
      </div>
      <div>
        Ordered by: <br>
        <input type="textarea" name="ordered_by" value="{{$item->ordered_by}}" required>
        <br>
        Enter as a comma-separated list enclosed with [].
      </div>

      <br>

      <div>
        <button type="submit">Edit {{$item->title}}</button>
      </div>
    </form>
  </div>
@endsection
