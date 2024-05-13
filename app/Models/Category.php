<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $with = ['product', 'store'];

    public function getAllCategories()
    {
        $uniqueCategories = Category::select('name')->distinct()->get();
        
        // Mengembalikan daftar kategori unik
        return $uniqueCategories;
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
