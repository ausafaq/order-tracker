<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Line;
use App\Item;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines = Line::orderBy('created_at', 'desc')->get();

        return view('lines')->with('lines', $lines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('create-line');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      request()->validate(
        [
          'name'=>['required','min:6']
        ]
      );

      $line = new Line();
      $line->name = request('name');
      $line->save();

      return redirect('lines');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Line $line)
    {
      $items = Item::where('line', $line->id)
        ->orderBy('created_at', 'desc')
        ->get();

      return view('items')->with('line', $line)->with('items', $items);
    }

    public function deletion()
    {
      $lines = Line::orderBy('created_at', 'desc')->get();

      return view('delete-line')->with('lines', $lines);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Line $line)
    {
        Item::where('line', $line->id)->delete();
        Line::find($line->id)->delete();

        return redirect('/lines');
    }

    public function index_redirect()
    {
      return redirect('/lines');
    }
}
