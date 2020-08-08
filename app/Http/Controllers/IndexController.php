<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Author;
class IndexController extends Controller
{
    public function index()
    {
      $data = Post::leftJoin('authors', 'authors.id', 'posts.user_id')->select('posts.*','authors.name')->paginate(15);
      return view('welcome', ['data' => $data]);
      // dd($data);
    }
}
