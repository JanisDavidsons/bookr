<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;

class BooksControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index_status_code_should_be_200()
    {
        $this->get('/books')->seeStatusCode(200);
    }

    public function test_index_should_return_a_collection_of_records(): void
    {
        $this->get('/books')
        ->seeJson([
            'title' => 'War of the Worlds'
        ])
        ->seeJson([
            'title' => 'A Winkle in Time'
        ]);
    }
}
