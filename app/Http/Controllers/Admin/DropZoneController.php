<?php

namespace App\Http\Controllers\Admin;

use App\Models\ImageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DropZoneController extends Controller
{

	public function upload()
	{
		return view('dropzone');
	}

	public function store(Request $request)
	{
    $image = $request->file('file');
    $imageName = $image->getClientOriginalName();
    $uploadpath = public_path() . '\\uploads\\dropzone\\' . 'product_group' . '\\';
    $image->move($uploadpath, $imageName);      
    // $image->move(public_path('images/dropzone/'), $imageName);
    $imageUpload = new ImageGallery();
    $imageUpload  -> product_id = 1;
    $imageUpload -> product_group = 'product_group';
    $imageUpload  ->  gallery_image = $imageName;
    $imageUpload  ->  save();
    return response()->json(['success' => $imageName]);
    }

    public function delete(Request $request)
    {			
			$filename = $request->get('filename');
      ImageGallery::where('gallery_image', $filename)->delete();
      $uploadpath = public_path() . '\\uploads\\dropzone\\' . 'product_group' . '\\';
			$path = $uploadpath . $filename;
			if (file_exists($path)) {
					unlink($path);
			}
			return $filename;
    }
 	// function index()
  //   {
  //    return view('dropzone');
  //   }

  //   function upload(Request $request)
  //   {
  //    $image = $request->file('file');

  //    $imageName = time() . '.' . $image->extension();

  //    $image->move(public_path('images'), $imageName);

  //    return response()->json(['success' => $imageName]);
  //   }

  //   function fetch()
  //   {
  //    $images = \File::allFiles(public_path('images'));
  //    $output = '<div class="row">';
  //    foreach($images as $image)
  //    {
  //     $output .= '
  //     <div class="col-md-2" style="margin-bottom:16px;" align="center">
  //               <img src="'.asset('images/' . $image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
  //               <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
  //           </div>
  //     ';
  //    }
  //    $output .= '</div>';
  //    echo $output;
  //   }

  //   function delete(Request $request)
  //   {
  //    if($request->get('name'))
  //    {
  //     \File::delete(public_path('images/' . $request->get('name')));
  //    }
  //   }
}
