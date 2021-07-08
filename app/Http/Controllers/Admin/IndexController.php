<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\News;
use http\Env\Request;

class IndexController extends Controller
{
    public function ajax(){
        return view('admin.ajax');
    }



    public function send(Request $request){
       return response()->json([
          'id' => $request->id,
           'state' => 'ok',
       ]);

    }



    public function test1(News $news)
    {


        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename= "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function test2()
    {
        return response()->download('cla.jpg');
    }

}
