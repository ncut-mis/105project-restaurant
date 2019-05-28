<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
date_default_timezone_set("Asia/Taipei");
class PostController extends Controller
{
    public function index()
    {
        $post = Post::where('restaurant_id', Auth::user()->restaurant_id)->get();
        return view('backstage.manager.post.index', ['posts' => $post]);
    }

    public function create()
    {
        return view('backstage.manager.post.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('pic');
        $destinationPath = 'img/post';
        $image=$file->getClientOriginalExtension();
        $file_name=(Carbon::now()->timestamp).'.'.$image;
        $file->move($destinationPath, $file_name);

        Post::create([
            'restaurant_id' => Auth::user()->restaurant_id,
            'pic'=>$file_name,
            'title' => $request['title'],
            'content' => $request['content'],
            'DateTime' => $request['DateTime'],
        ]);
        return redirect()->route('backstage.manager.post.index')->with('success','成功新增 !');
    }

    public function edit($id)
    {
        $post=Post::find($id);
        $data = ['posts' => $post];
        return view('backstage.manager.post.edit', $data);
    }

    public function update(Request $request,$id)
    {
        $post=Post::find($id);
        $file = $request->file('pic');
        $destinationPath = 'img/post';
        $image=$file->getClientOriginalExtension();
        $file_name=(Carbon::now()->timestamp).'.'.$image;
        $file->move($destinationPath, $file_name);

        $post->update([
            'restaurant_id' => Auth::user()->restaurant_id,
            'pic'=>$file_name,
            'title' => $request['title'],
            'content' => $request['content'],
            'DateTime' => $request['DateTime'],
        ]);
        return redirect()->route('backstage.manager.post.index')->with('success','修改成功 !');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('backstage.manager.post.index')->with('success','刪除完成 !');
    }
}
