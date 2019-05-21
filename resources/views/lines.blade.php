@extends('layouts.app')

@section('title')
  <title>Product lines</title>
@endsection

@section('content')
  <div class="content">
      <div class="title">
        <h1>Product lines</h1>
      </div>

      <div>
        <h2><a href="lines/create">Add product line</a></h2>
      </div>

      @if ($lines->count())
        <ul>
          @foreach ($lines as $line)
            <li>
              <h2><a href={{"/lines/$line->id"}}>{{$line->name}}</a></h2>
            </li>
          @endforeach
        </ul>
      @else
        No product lines entered yet!
      @endif
  </div>
@endsection
