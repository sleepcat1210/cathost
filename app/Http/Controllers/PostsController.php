<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Posts;
use App\Http\Models\Users;
use App\Http\Models\Comments;
use App\Http\Models\Zans;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Storage;

class PostsController extends Controller {

    //文章列表
    public function index() {
        $data = Posts::orderBy('id', 'desc')->withCount(['comments', 'zans'])->with(['user'])->paginate(3);
        return view('posts/index', compact(['data']));
    }

    //文章详情
    public function show(Posts $posts) {
        return view('posts/show', compact(['posts']));
    }

    //文章添加
    public function create() {
        if (empty(\Auth::user()->id)) {
            return redirect('login');
        }
        return view('posts/create');
    }

    //文章插入
    public function store(Request $request) {
        $this->validate(request(), [
            'title' => "required|string|max:1000",
            'content' => "required|string|min:10",
        ]);
        $user_id = \Auth::id();
        $param = array_merge(request(['title', 'content']), compact('user_id'));
//        dd($param);
        $data = Posts::create($param);
        return redirect('/posts');
    }

    //文章编辑
    public function edit(Posts $posts) {
        $this->authorize('update', $posts);
        return view('posts/edit', compact(['posts']));
    }

    //文章编辑
    public function update(Request $request, Posts $posts) {
        $posts->update(request(['title', 'content']));
        return redirect("posts/show/{$posts->id}");
    }

    //文章删除
    public function delete(Posts $posts) {
        $this->authorize("delete", $posts);
        $posts->delete();
        return redirect("posts");
    }

    //上传图片
    public function uploadImg(Request $request){       
         $file = $request->file('file');
        if($file->isValid()){           
            $rst = $file->store('lesson','public');        
//             return asset('storage/'. $rst);
          echo json_encode(['success'=>true,'data'=>'storage/'. $rst]);
        }else{
            echo json_encode(['success'=>false]);
        }
        exit;       
      }
    //七牛云
//    public function uploadImg(Request $request) {
//        $file = $request->file('file');
//        if ($file->isValid()) {
//            $filename=  sha1(time().$file->getClientOriginalName()).".".$file->getClientOriginalExtension();
//             Storage::disk('qiniu')->put($filename,  file_get_contents($file->path()));           
//            echo json_encode(['success' => true, 'data' => Storage::disk('qiniu')->getDriver()->downloadUrl($filename)]);
//        } else {
//            echo json_encode(['success' => false]);
//        }
//        exit;
//    }

    //评论
    public function comments(Request $request) {
        $this->validate(request(), [
            'posts_id' => "required",
            'content' => "required",
        ]);
        $user_id = \Auth::id();
        $param = array_merge(request(['posts_id', 'content']), compact('user_id'));
        Comments::create($param);
        return back();
    }

    //添加zan
    public function zan(Posts $posts) {
        if (empty(\Auth::id())) {
            return redirect('login');
        }
        $param = [
            'user_id' => \Auth::id(),
            'posts_id' => $posts->id,
        ];
        Zans::create($param);
        return back();
    }

    //取消zan
    public function unzan(Posts $posts) {

        $posts->zan(\Auth::id())->delete();
        return back();
    }

}
