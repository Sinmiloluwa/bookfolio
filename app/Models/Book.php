<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','author','book_cover','user_id','pdf'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories','book_id','category_id');
    }

    public function getName() {
        return $this->categories->pluck('name');
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }
}
