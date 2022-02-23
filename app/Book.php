<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 */
class Book extends Model
{
    /**
     * @var string[]
     */
    // phpcs:ignore
    protected $fillable = ['title', 'description', 'author'];
}
