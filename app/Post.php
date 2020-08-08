<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;

class Post extends Model
{
    protected $fillable = [
      'user_id','title','pic_thumbnail','excerpt',
      'content','status_post',
    ];


    public function scopeLatestFirst($query)
    {
      return $query->orderBy('id','DESC');
    }

    public function user()
    {
      return $this->belongsTo(Author::class);
    }
}
