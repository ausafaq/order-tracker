@extends('layouts.app')

@section('title')
  <title>All items</title>
@endsection

@section('content')
  <div class="content">
      <div class="title">
        <h1>All {{$state}} items</h1>
      </div>

      @if ($items->count())
        <ul>
          @foreach ($items as $item)
            <li>
              <h2><a href={{"/lines/$item->line/items/$item->id/edit"}}>{{$item->title}}</a></h2>
              Line: <a href={{"/lines/$item->line"}}>{{$item->name}}</a>
              <br>
              Ordered by: {{$item->ordered_by}}
              <br>
              State: {{$item->state}}
              @if ($item->state == "unordered")
                <br>
                <p style="color:#EA360F";><b>State: {{$item->state}}</b></p>
                <form method="POST" action={{"/lines/$item->line/items/$item->id/ordered"}}>
                  {{ csrf_field() }}
                  <button type="submit">Item ordered</button>
                </form>
              @elseif ($item->state == "ordered")
                <br>
                <p style="color:#E1EC06";><b>State: {{$item->state}}</b></p>
                <form method="POST" action={{"/lines/$item->line/items/$item->id/received"}}>
                  {{ csrf_field() }}
                  <button type="submit">Item received</button>
                </form>
              @else
                <br>
                <p style="color:#14EC06";><b>State: {{$item->state}}</b></p>
              @endif
            </li>
          @endforeach
        </ul>
      @else
        No items entered yet!
      @endif
  </div>
@endsection
