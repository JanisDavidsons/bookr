<?php

declare(strict_types=1);

namespace Tests\App\Http\Controllers;

use Tests\TestCase;

class BooksControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexStatusCodeShouldBe200()
    {
        $this->get('/books')->seeStatusCode(200);
    }

    public function testIndexShouldReturnACollectionOfRecords(): void
    {
        $this->get('/books')
        ->seeJson([
            'title' => 'War of the Worlds',
        ])
        ->seeJson([
            'title' => 'A Winkle in Time',
        ]);
    }

    public function testShouldReturnAValidBook(): void
    {
        $this->get('books/1')
            ->seeStatusCode(200)
            ->seeJson([
                'id'          => 1,
                'title'       => 'War of the Worlds',
                'description' => 'A science fiction masterpiece about Martians invading London',
                'author'      => 'H. G. Wells',
            ]);

        $data = json_decode($this->response->getContent(), true);
        $this->assertArrayHasKey('created_at', $data);
        $this->assertArrayHasKey('updated_at', $data);
    }

    public function testShouldFailWhenBookIdDoesNotExist(): void
    {
        $this->get('books/999999')
            ->seeStatusCode(404)
            ->seeJson([
                'error' => [
                    'message' => 'Book not found',
                ],
            ]);
    }

    public function testShowRouteShouldNotMatchAnInvalidRoute(): void
    {
        $this->get('/books/this-is-invalid');

        $this->assertDoesNotMatchRegularExpression(
            '/Book not found/',
            $this->response->getContent(),
            'BooksController@show rout matching when it should not.',
        );
    }

    public function testStoreShouldSaveNewBookInDatabase(): void
    {
        $this->post('books', [
            'id'          => 1,
            'title'       => 'The Invisible Man',
            'description' => 'An invisible man is trapped in the terror of his own creation',
            'author'      => 'H. G. Wells',
        ]);

        $this->seeJson(['created' => true]);
        $this->seeInDatabase('books', [
            'title' => 'The Invisible Man',
        ]);
    }

    public function testStoreShouldRespondWith201AndLocationHeader(): void
    {
        $this->post('books', [
            'id'          => 1,
            'title'       => 'The Invisible Man',
            'description' => 'An invisible man is trapped in the terror of his own creation',
            'author'      => 'H. G. Wells',
        ]);

        $this->seeStatusCode(201)->seeHeaderWithRegExp('Location', '#/books/[\d]+$#');
    }
}
