<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{

    public function index()
    {
        $images = Image::all();
        return view('images.index',compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $file = $request->file('file');
        if($file){
            $filename = $file->getClientOriginalName();		
            $filesize = $file->getClientSize();
            $extension = $file->getClientOriginalExtension();
            $file_title = rand().time().'.'.$extension;
            $uploadpath = \public_path().'/uploads/gallery/';
            $file->move($uploadpath,$file_title);
            $multi_images = Image::create([
                'image_title' => $filename,
                'image_name'  => $file_title,
                'image_size'  => $filesize,
                'image_extension' => $extension
            ]);
            if($multi_images){
                echo "True";        
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
