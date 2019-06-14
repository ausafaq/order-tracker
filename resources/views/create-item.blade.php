@extends('layouts.app')

@section('title')
  <title>Add item to {{$line->name}}</title>
@endsection

@section('content')
  <div>
    <h2>Add a new item to {{$line->name}}</h2>
    <form method="POST" action={{"/lines/$line->id/items"}}>
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
        <input type="text" name="title" placeholder="item title" required>
      </div>
      <div>
        Ordered by: <br>
        <input type="textarea" name="ordered_by" value="" required>
        <br>
      </div>

      <br>

      <div>
        <button type="submit">Add Item to Line</button>
      </div>
    </form>
  </div>
@endsection
