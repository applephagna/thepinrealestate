<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

  public function __construct()
	{
   $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','show']]);
   $this->middleware('permission:post-create', ['only' => ['create','store']]);
   $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
   $this->middleware('permission:post-delete', ['only' => ['destroy']]);
  }

  public function index()
  {
    $posts = Post::latest()->paginate(5);
    return view('posts.index',compact('posts'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'body' => 'required',
    ]);
    if($request->hasFile('image')){
      $image = $request->file('image');
      $image_name = uniqid().'-'.time() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('uploads/thumbnail/post');
      if(!\file_exists($destinationPath)){
        mkdir($destinationPath, 0777, true);
      }
      // reisize image before upload
      $resize_image = Image::make($image->getRealPath());
      $resize_image->resize(150, 150, function($constraint){
      $constraint->aspectRatio();
      })->save($destinationPath . '/' . $image_name);
      // upload original image
      $destinationPath = public_path('uploads/post');
      $image->move($destinationPath, $image_name);
    } else {
      $image_name =  null;
    }
    if (isset($request->status)) {
      $status = true;
    } else {
      $status = false;
    }
    Post::create([
      'title' => $request->title,
      'body' => $request->body,
      'status' => $status,
      'image' => $image_name,
    ]);
    return redirect()->route('admin.posts.index')
                    ->with('success','Product created successfully.');
  }

  public function show(Post $post)
  {
    return view('posts.show',compact('post'));
  }

  public function edit(Post $post)
  {
    return view('posts.edit',compact('post'));
  }

  public function update(Request $request, Post $post)
  {
    $this->validate($request, [
      'title' => 'required',
      'body' => 'required',
    ]);
    $old_image = $post->image;
    $thumbnailPath = public_path('uploads/thumbnail/post');
    $destinationPath =public_path('uploads/post');
    // return $destinationPath.'/'.$old_image;
    if($request->hasFile('image')){
      if (!is_null($post->image) && File::exists($thumbnailPath.'/'.$post->image)){
    		File::delete($thumbnailPath.'/'.$post->image);
      }
      if (!is_null($post->image) && File::exists($destinationPath.'/'.$post->image)){
    		File::delete($destinationPath.'/'.$post->image);
    	}
      $image = $request->file('image');
      $image_name = uniqid().'-'.time() . '.' . $image->getClientOriginalExtension();
      // reisize image before upload
      if(!\file_exists($thumbnailPath)){
        mkdir($thumbnailPath, 0777, true);
      }
      $resize_image = Image::make($image->getRealPath());
      $resize_image->resize(150, 150, function($constraint){
      $constraint->aspectRatio();
      })->save($thumbnailPath . '/' . $image_name);
      // upload original image
        $image->move($destinationPath, $image_name);
    } else {
      $image_name =  $old_image;
    }
    if (isset($request->status)) {
      $status = true;
    } else {
      $status = false;
    }
      $post->update([
        'title' => $request->title,
        'body' => $request->body,
        'status' => $status,
        'image' => $image_name,
      ]);
      return redirect()->route('admin.posts.index')
                      ->with('success','Product updated successfully');
  }

  public function destroy(Post $post)
  {
    $thumbnailPath = public_path('uploads/thumbnail/post');
    $destinationPath =public_path('uploads/post');
    if (!is_null($post->image) && File::exists($thumbnailPath.'/'.$post->image)){
      File::delete($thumbnailPath.'/'.$post->image);
    }
    if (!is_null($post->image) && File::exists($destinationPath.'/'.$post->image)){
      File::delete($destinationPath.'/'.$post->image);
    }
    $post->delete();
    return redirect()->route('admin.posts.index')
                    ->with('success','Product deleted successfully');
  }
}
