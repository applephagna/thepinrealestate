<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use DB;
use File;
use Illuminate\Http\Request;

class LanguageTranslationController extends Controller
{
  public function index()
  {
 	  $languages = Language::all();
   	$columnsCount = $languages->count();
    if($languages->count() > 0){
      foreach ($languages as $key => $language){
        if ($key == 0) {
          $columns[$key] = $this->openJSONFile($language->code);
        }
        $columns[++$key] = ['data'=>$this->openJSONFile($language->code), 'lang'=>$language->code];
      }
    }
 	  return view('translations.languages', compact('languages','columns','columnsCount'));
  }   

  public function store(Request $request)
  {
	  $request->validate([
    'key' => 'required',
    'value' => 'required',
	]);
	$data = $this->openJSONFile('en');
  $data[$request->key] = $request->value;
  $this->saveJSONFile('en', $data);
  return redirect()->route('languages');
  }

  public function destroy($key)
  {
    $languages = DB::table('languages')->get();
    if($languages->count() > 0){
      foreach ($languages as $language){
        $data = $this->openJSONFile($language->code);
        unset($data[$key]);
        $this->saveJSONFile($language->code, $data);
      }
    }
    return response()->json(['success' => $key]);
  }

  private function openJSONFile($code){
    $jsonString = [];
    if(File::exists(base_path('resources/lang/'.$code.'.json'))){
      $jsonString = file_get_contents(base_path('resources/lang/'.$code.'.json'));
      $jsonString = json_decode($jsonString, true);
    }
    return $jsonString;
  }

  private function saveJSONFile($code, $data){
    ksort($data);
    $jsonData = json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    file_put_contents(base_path('resources/lang/'.$code.'.json'), stripslashes($jsonData));
  }

  public function transUpdate(Request $request){
    $data = $this->openJSONFile($request->code);
    $data[$request->pk] = $request->value;
    $this->saveJSONFile($request->code, $data);
    return response()->json(['success'=>'Done!']);
  }

  public function transUpdateKey(Request $request){
    $languages = DB::table('languages')->get();
    if($languages->count() > 0){
      foreach ($languages as $language){
        $data = $this->openJSONFile($language->code);
        if (isset($data[$request->pk])){
          $data[$request->value] = $data[$request->pk];
          unset($data[$request->pk]);
          $this->saveJSONFile($language->code, $data);
        }
      }
    }
    return response()->json(['success'=>'Done!']);
  }
}