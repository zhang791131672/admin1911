<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TestController extends Controller
{
    //
    public function upload(){
        return view('test.upload');
    }

    /**
     * 图片上传
     * @param Request $request
     */
    public function uploadDo(Request $request){
        $img_data=$request->file('img');
        //图片名称
        $img_name=$img_data->getClientOriginalName();
        //图片大小
        $img_size=$img_data->getClientSize();
        //图片类型
        $img_ext=$img_data->getClientOriginalExtension();
        $img_name=Str::random(8).'.'.$img_ext;
        $res=$img_data->storeAs('/public/images',$img_name);
        echo $res;
    }
}
