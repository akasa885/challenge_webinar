<?php

namespace App\Http\Controllers\Authors;

use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Authors\SummernoteController;


use Auth;
use App\Post;
use App\Author;

class PostingController extends Controller
{
    protected $sn;
    public function __construct()
    {
      $this->sn = new SummernoteController;
    }
    public function getAllpost(Author $author)
    {
      $id = auth()->id();
      $data = $this->IncludePost($author,$id);
      // $data = $tempdata[0];
      // dd($data);
      return DataTables::of($data)
       ->editColumn("created_at", function ($data) {
         return date("m/d/Y", strtotime($data->created_at));
       })
       ->editColumn('pic_thumbnail', function ($data){
         if ($data->pic_thumbnail == null) {
           $img = "<img src=\"/images/default/no-image.png\"/ height=\"50px\" width=\"90px\">'";
         }
         else {
          $img = "<img src=\"data:image/png;base64,'.base64_encode($data->pic_thumbnail).'\"/>'";
         }
         return $img;
       })
       ->editColumn('status_post', function ($data){
         if($data->status_post == 0){
          $status = "<div class=\"mb-2 mr-2 badge badge-info\">Draft</div>";
        }else{
          $status = "<div class=\"mb-2 mr-2 badge badge-success\">Published</div>";
        }
        return $status;
       })
       ->addColumn('Options', function ($data){
         $edit = "<a href=".route('author.post.editPost',['id' => $data->id])." aria-expanded=\"false\" class=\"btn-shadow btn btn-info\" style=\"margin-right:0.2rem;\">
                                            <span class=\"btn-icon-wrapper pr-2 opacity-7\">
                                                <i class=\"fa fa-trash fa-w-20\"></i>
                                            </span>
                                            Edit
                                        </a>";
        $edit .= "<a href=".route('author.post.delPost',['id' => $data->id])." aria-expanded=\"false\" class=\"btn-shadow btn btn-danger\" style=\"margin-right:0.2rem;\">
                                           <span class=\"btn-icon-wrapper pr-2 opacity-7\">
                                               <i class=\"fa fa-trash fa-w-20\"></i>
                                           </span>
                                           Hapus
                                       </a>";
        return $edit;
       })
       ->rawColumns(['pic_thumbnail','status_post','Options'])
       ->make(true);
    }

    public function viewContentPost()
    {
      return view('author.posts.viewPost');
    }

    public function createContent()
    {
      return view('author.posts.createPost');
    }

    public function storeContent(Request $request)
    {
      $messages = [
      'required' => ':attribute harap diisi',
      'min' => ':attribute harus diisi minimal :min karakter',
      'max' => ':attribute harus diisi maksimal :max karakter',
      'before' => ':attribute harap memasukkan sebelum sekarang',
      ];
      $this->validate($request, [
        'titleHeader' => 'required|max:50',
        'headThumbnail' => 'image|mimes:jpg,png,jpeg,gif|max:5120',
        'excerpt' => 'required|max:200',
        'description' => 'required'
      ],$messages);

      $detail = $this->sn->storeContent($request->description);
      if ($request->file('headThumbnail') != null) {
        // $imgdata = addslashes(file_get_contents($request->file('headThumbnail')));
        // $imgpropert = getimagesize($request->file('headThumbnail'));
        $path = $request->file('headThumbnail')->getRealPath();
        $thumb = file_get_contents($path);
        $base64 = base64_encode($thumb);
        try {
            Post::insert([
              'user_id' => auth()->id(),
              'title' => $request->titleHeader,
              'pic_thumbnail' => $base64,
              'excerpt' => $request->excerpt,
              'content' => $detail,
              'status_post' => $request->action,
            ]);
        } catch (\Exception $e) {
          return $e;
        }
      }else{
        try {
            Post::insert([
              'user_id' => auth()->id(),
              'title' => $request->titleHeader,
              'excerpt' => $request->excerpt,
              'content' => $detail,
              'status_post' => $request->action,
            ]);
        } catch (\Exception $e) {
          return $e;
        }
      }
      return "success";
    }

    public function editPosting($id)
    {
        $data = Post::find($id);
        return view('author.posts.editPost', ['data' => $data]);
    }

    public function deletePosting($id)
    {
      $postid = $id;
      Post::where('id',$postid)->delete();
      return "deleted";
    }

    private function IncludePost(Author $author, $id)
    {
        $sel = $author->find($id);
        $posts   =  $sel->posts()->latestfirst()->get();

        return $posts;
    }
}
