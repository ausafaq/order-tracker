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
        Product line name: <br>
        <input type="textarea" name="ordered_by" value="[]" required>
        <br>
        Enter as a comma-separated list enclosed with [].
      </div>

      <br>

      <div>
        <button type="submit">Add Product Line</button>
      </div>
    </form>
  </div>
@endsection
