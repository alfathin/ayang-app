<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarder = [];
    // protected $with = ['category', 'product', 'user'];

    // protected $fillable = [
    //     'name',
    //     'user_id'
    // ];
    // protected $with = [
    //     'user'
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
