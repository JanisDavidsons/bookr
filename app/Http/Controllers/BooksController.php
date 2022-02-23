<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class BooksController extends Controller
{
    /**
     * @return Collection<int, Book>
     */
    public function index(): Collection
    {
        return Book::all();
    }

    /**
     * @return Builder|Builder[]|Collection<int, Model>|Model|JsonResponse|null
     */
    public function show(int $id)
    {
        try {
            return Book::query()->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return new JsonResponse([
                'error' => [
                    'message' => 'Book not found',
                ],
            ], 404);
        }
    }

    public function create(Request $request): JsonResponse
    {
        /**
         * @var Book
         */
        $book = Book::query()->create($request->all());

        return new JsonResponse(['created' => true], 201, [
            'Location' => route('books.show', ['id' => $book->id]),
        ]);
    }
}
