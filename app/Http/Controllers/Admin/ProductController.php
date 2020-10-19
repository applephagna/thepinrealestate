<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
// use App\Models\ImageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
  function __construct()
  {
     $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
     $this->middleware('permission:product-create', ['only' => ['create','store']]);
     $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
     $this->middleware('permission:product-delete', ['only' => ['destroy']]);
  }

  public function index()
  {
    $products = Product::latest()->paginate(5);
    return view('admin.products.index',compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
  }

  public function create()
  {
    return view('admin.products.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
        'name' => 'required',
        'detail' => 'required',
    ]);
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $image_name = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('uploads/thumbnail/product');
      if (!\file_exists($destinationPath)) {
          mkdir($destinationPath, 0777, true);
      }
      // reisize image before upload
      $resize_image = Image::make($image->getRealPath());
      $resize_image->resize(150, 150, function ($constraint) {
          $constraint->aspectRatio();
      })->save($destinationPath . '/' . $image_name);
      // upload original image
      $destinationPath = public_path('uploads/product');
      $image->move($destinationPath, $image_name);
    } else {
        $image_name = null;
    }
    if (isset($request->status)) {
        $status = true;
    } else {
        $status = false;
    }
    Product::create([
        'name' => $request->name,
        'detail' => $request->detail,
        'status' => $status,
        'image' => $image_name,
    ]);
    return redirect()->route('admin.products.index')
                      ->with('success','Product created successfully.');
  }

  public function show(Product $product)
  {
    return view('admin.products.show',compact('product'));
  }

  public function edit(Product $product)
  {
    return view('admin.products.edit',compact('product'));
  }

  public function update(Request $request, Product $product)
  {
    $this->validate($request, [
        'name' => 'required',
        'detail' => 'required',
    ]);
    $old_image = $product->image;
    $thumbnailPath = public_path('uploads/thumbnail/product');
    $destinationPath = public_path('uploads/product');
    // return $destinationPath.'/'.$old_image;
    if ($request->hasFile('image')) {
      if (!is_null($product->image) && File::exists($thumbnailPath . '/' . $product->image)) {
        File::delete($thumbnailPath . '/' . $product->image);
      }
      if (!is_null($product->image) && File::exists($destinationPath . '/' . $product->image)) {
        File::delete($destinationPath . '/' . $product->image);
      }
      $image = $request->file('image');
      $image_name = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
      // reisize image before upload
      if (!\file_exists($thumbnailPath)) {
        mkdir($thumbnailPath, 0777, true);
      }
      $resize_image = Image::make($image->getRealPath());
      $resize_image->resize(150, 150, function ($constraint) {
          $constraint->aspectRatio();
      })->save($thumbnailPath . '/' . $image_name);
      // upload original image
      $image->move($destinationPath, $image_name);
    } else {
      $image_name = $old_image;
    }
    if (isset($request->status)) {
      $status = true;
    } else {
      $status = false;
    }
    $product->update([
        'name' => $request->name,
        'detail' => $request->detail,
        'status' => $status,
        'image' => $image_name,
    ]);
    return redirect()->route('admin.products.index')
                    ->with('success','Product updated successfully');
  }

  public function destroy(Product $product)
  {
    $thumbnailPath = public_path('uploads/thumbnail/product');
    $destinationPath = public_path('uploads/product');
    if (!is_null($product->image) && File::exists($thumbnailPath . '/' . $product->image)) {
        File::delete($thumbnailPath . '/' . $product->image);
    }
    if (!is_null($product->image) && File::exists($destinationPath . '/' . $product->image)) {
        File::delete($destinationPath . '/' . $product->image);
    }
    $product->delete();
    return redirect()->route('admin.products.index')
                    ->with('success','Product deleted successfully');
  }

  public function dropzone()
  {
    $product = Product::pluck('name','id');
    return view('products.image_gallery',compact('product'));
  }

//   public function dropzoneStore(Request $request)
//   {
//     // $this->validate($request, [
//     //     'file' => 'required',
//     //     'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//     // ]);

//     $image = $request->file('file');
//     $imageName = $image->getClientOriginalName();
//     $product_group = str_slug($request->product_group);
//     $uploadpath = public_path() . '\\uploads\\dropzone\\' . $product_group . '\\';
//     $image->move($uploadpath, $imageName);
//     // $image_name = rand() . '.' . $file->getClientOriginalExtension();
//     $image_gallery = new ImageGallery();
//     $image_gallery->product_id = $request->product_id;
//     $image_gallery->product_group = str_slug($request->product_group);
//     $image_gallery->gallery_image = $imageName;
//     $image_gallery->save();

//     return response()->json(['success'=>$imageName]);
//   }

//   public function dropzonedelete(Request $request)
//   {
//     $filename = $request->get('filename');
//     $delete_image = ImageGallery::where('gallery_image', $filename)->first();
//     $product_group = $delete_image->product_group;
//     $delete_image->delete();
//     $uploadpath = public_path() . '\\uploads\\dropzone\\' .  $product_group . '\\';
//     $path = $uploadpath . $filename;
//     if (file_exists($path)) {
//         unlink($path);
//     }
//     return $filename;
//   }

//   public function gallery_list()
//   {
//     return view('products.gallery_list');
//   }

//   public static function imageGalleryUpload($filename,$ObjModel, $path = null,$product_id,$fieldID)
//   {
//     if(request()->hasFile($filename)){
//       $dir = 'uploads/' . $path .'/';
//       foreach (request()->$filename as $file) {
//         $filename = rand(). '.' . $file->getClientOriginalExtension();
//         $ObjModel = new $ObjModel;
//         $ObjModel->$fieldID = $product_id;
//         $ObjModel->gallery_image = $filename;
//         if($ObjModel->save()){
//           $file->move($dir,$filename);
//         }
//       }
//     }
//   }


}
