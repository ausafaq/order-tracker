@extends('layouts.app')

@section('title')
  <title>Add product line</title>
@endsection

@section('content')
  <div class="content">
    <form method="POST" action="/lines">
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
        Product line name: <br>
        <input type="text" name="name" placeholder="Product line name" required>
      </div>

      <br>

      <div>
        <button type="submit">Add Product Line</button>
      </div>
    </form>
  </div>
@endsection
