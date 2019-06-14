@extends('layouts.app')

@section('title')
  <title>Product lines</title>
@endsection

@section('content')
  <div class="content">
      <div class="title">
        <h1>Product lines</h1>
      </div>

      @if ($lines->count())
        <ul>
          @foreach ($lines as $line)
            <li>
              <h2><a href={{"/lines/$line->id"}}>{{$line->name}}</a></h2>
              <form method="POST" action={{"/lines/$line->id"}}>
                @method('DELETE')
                {{ csrf_field() }}
                <button type="submit" class="button">Delete Line</button>
              </form>
              <br>
            </li>
          @endforeach
        </ul>
      @else
        No product lines entered yet!
      @endif
  </div>
@endsection
