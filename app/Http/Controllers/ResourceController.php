<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\StoreBook;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBook $request)
    {
        //
        (new Book())
            ->fill($request->validated())
            ->save();

        return redirect()->route('books.resource');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('eloquent.form', [
            'action' => action('EloquentController@books'),
            'method' => 'POST',
            'old' => EloquentController::OLD_FALLBACK,
            'history' => Book::orderBy('updated_at', 'desc')->limit(5)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('eloquent.form', [
            'action' => action('EloquentController@books', ['id' => $id]),
            'method' => 'PATCH',
            'old' => Book::findOrFail($id),
            'history' => Book::orderBy('updated_at', 'desc')->limit(5)->get(),
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBook $request, $id)
    {
        //
        (Book::find($id))
            ->fill($request->validated())
            ->save();

        return redirect()->route('books.resource');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Book::find($id)->delete();

        return redirect()->route('books.resource');
    }
}
