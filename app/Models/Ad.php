<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'region_id',
        'prix',
        'adresse',
        'image'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->belongsToMany(User::class);
    }

    public function isLiked()
    {
        if (auth()->check()) {
           return auth()->user()->likes->contains('id', $this->id);
        }
    }

}
