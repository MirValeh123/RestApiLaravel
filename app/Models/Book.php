<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable=['name','image','price','qty','description'];
    public function authors() {
        return $this->belongsToMany(Author::class);
    }
}
