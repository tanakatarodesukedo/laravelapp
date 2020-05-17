<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $request)
    {
        $items = Board::with('person')->get();
        return view('board.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('board.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Board::$rules);
        $form = $request->all();
        unset($form['_token']);
        $board = new Board;
        $board->fill($form)->save();
        return redirect('/board');
    }
}
