<?php

namespace App\Http\Controllers;

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

    public function index(Request $request): array
    {
        return [
            ['title' => 'War of the Worlds'],
            ['title' => 'A Wikle in Time']
        ];
    }
}
