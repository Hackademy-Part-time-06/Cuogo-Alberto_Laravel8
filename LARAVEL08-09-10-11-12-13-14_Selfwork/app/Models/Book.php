<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'pages', 'author_id', 'year', 'img'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
