<?php

namespace App\Http\Controllers;


use App\Models\News;


class NewsController extends Controller
{

    public function index(){




       // $news = DB::table('news')->get();
        $news = News::query()->paginate(7);


        return view('news.index')->with('news', $news);
    }

    public function show( News $news){

       // $news = DB::table('news')->find($id);
       // $news = News::query()->find($id);

        return view('news.one')->with('news', $news);
    }
}
