<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param Request $request
     * @return Collection<int, Book>
     */
    public function index(Request $request): Collection
    {
        return Book::all();
    }
}
