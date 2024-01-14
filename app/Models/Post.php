<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    //neprepisujeme id, user
    // protected $guarded = ['id'];

    protected $guarded = [];
//daj mi post vzdy aj s tymto
    //  protected $with = ['category','author'];     namiesto with a load

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'excerpt',
        'body',
        'slug',
        'image_path',

    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }


    public function category() {
        //post belong to category
        return $this->belongsTo(Category::class);
    }

    public function author() {
        //post belong to category
        return $this->belongsTo(User::class,'user_id');       //foreign key nie je author_id ale user_id
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
