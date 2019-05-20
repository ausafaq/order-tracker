<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Line;
use App\Item;

class ItemController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Line $line)
    {
        return view('create-item')->with('line', $line);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Line $line)
    {
      request()->validate(
        [
          'title'=>['required','min:1'],
          'ordered_by'=>['required']
        ]
      );

      $item = new Item();
      $item->title = request('title');
      $item->line = $line->id;
      $item->ordered_by = request('ordered_by');
      $item->state = "unordered";
      $item->save();

      return redirect('lines');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Line $line, Item $item)
    {
      return view('edit-item')->with('line', $line)->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Line $line, Item $item)
    {
      request()->validate(
        [
          'title'=>['required','min:1'],
          'ordered_by'=>['required']
        ]
      );

      $item->title = request('title');
      $item->ordered_by = request('ordered_by');
      $item->save();
    }

    public function ordered(Line $line, Item $item)
    {
      if ($item->state = "unordered";) {
        $item->state = "ordered";
        $item->save();
      } else {
        throw new Exception("Item is in the wrong state for this operation.");
      }
    }

    public function received(Line $line, Item $item)
    {
      if ($item->state = "ordered";) {
        $item->state = "received";
        $item->save();
      } else {
        throw new Exception("Item is in the wrong state for this operation.");
      }
    }
}
