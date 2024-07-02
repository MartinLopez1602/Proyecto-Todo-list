<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use Illuminate\Http\Request;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TodoItems = TodoItem::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('TodoItem.index', compact('TodoItems'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('TodoItem.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|max:255',
        ]);

        TodoItem::create([
            'user_id' => request()->user()->id,     
            'descripcion' => $request->input('descripcion'),

        ]);

        return redirect()->route('TodoItem.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoItem $todoItem)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TodoItem $todoItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TodoItem $todoItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
     
        $todoItem = TodoItem::find($id);
        $todoItem->delete();

        return back()->with('message', 'Item eliminado con éxito.');
        
    }
}
