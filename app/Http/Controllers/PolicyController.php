<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\StoreBook;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PolicyController extends Controller
{
    const OLD_FALLBACK = [
        'isbn'=> "",
        'title'=> "",
        'price'=> "",
        'publisher'=> "",
        'published'=> "",
    ];

    public function show(?Book $book)
    {
        return isset($book->id)
            ? view('authorization.form', [
                'action' => route('books', ['book' => $book]),
                'method' => 'PATCH',
                'old' => $book,
                'history' => Book::orderBy('updated_at', 'desc')->limit(5)->get(),
            ])
            : view('authorization.form', [
                'action' => action('PolicyController@post'),
                'method' => 'POST',
                'old' => static::OLD_FALLBACK,
                'history' => Book::orderBy('updated_at', 'desc')->limit(5)->get(),
            ]);
    }

    public function post(StoreBook $req)
    {
        $book = (new Book())->fill($req->validated());

        $this->authorize('create', $book);
        
        $book->save();

        return redirect()->route('books');
    }

    public function patch(StoreBook $req, Book $book)
    {
        $book
            ->fill($req->validated())
            ->save();

        return redirect()->route('books');
    }

    public function delete(Book $book)
    {
        $user = User::find(Auth::user()->id);

        if ($user->can('delete', $book)) {
            $book->delete();
            return redirect()->route('books');
        } else {
            abort(403, trans('auth.policy_authorize'));
        }
    }
}
