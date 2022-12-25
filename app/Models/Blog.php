<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'category_id' , 'author_id' , 'image' , 'keywords' , 'description' , 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function getCategory(){
        return Category::find($this->category_id);
    }
    public function getAuthor(){
        return Author::find($this->author_id);
    }

    public function author()
    {
        return $this->belongsTo(Author::class , 'author_id');
    }
  public function countViews()
    {
        return BlogViews::where('blog_id',$this->id)->count();
    }
}
