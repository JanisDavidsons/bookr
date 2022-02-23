<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 */
class Book extends Model
{
    protected $fillable = ['title', 'description', 'author'];
}
