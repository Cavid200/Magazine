<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable, HasTranslations;
    public $translatable = ['title', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_posts','post_id','category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
    public function comments(){
        return $this->hasMany(Comment::class)->where('isActive',1);
    }
    
}
