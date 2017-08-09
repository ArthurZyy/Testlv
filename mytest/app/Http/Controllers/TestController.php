<?php

namespace App\Http\Controllers;

use App\Contracts\TestContract;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /*//依赖注入
    public function __construct(TestContract $test){
        $this->test=$test;
    }

    public function index(){

        // $test = App::make('test');
        // $test->callMe('TestController');
        $this->test->callMe('TestController');
    }*/

    public function uploadImages(Request $request){
        if($request->ajax()){
            $file=$request->file('image');
            $path=$file->store('avatars','uploads');
            return response()->json(array('msg'=>$path));
        }
        return view('uploadimage');
    }
}
