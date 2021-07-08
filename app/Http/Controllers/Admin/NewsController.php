<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller


{


    public function index()
    {
        return view('admin.index', [
            'news' => News::all(),
        ]);
    }

    public function create(News $news)
    {
        return view('admin.create')
            ->with('categories', Category::all())
            ->with('news', $news);
    }

    public function store(NewsRequest $request, News $news, Category $category){



        $request->validated();

        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
        }
        $news->image = $url;
        $result = $news->fill($request->all())->save();

        if ($result)
        return redirect()->route('news.show', $news->id)->with('success', "Новость добавлена!");
        else
            return redirect()->route('admin.news.create')->with('error', "Ошибка добавления!");


    }

    public function edit(News $news){
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::all()
            ]);
    }

    public function update(NewsRequest $request, News $news){
        $request->validated();
        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
        }
        $news->image = $url;
        $news->isPrivate = $request->has('isPrivate');
        $news->fill($request->all())->save();
        return redirect()->route('news.show', $news->id)->with('success', "Новость изменена!");

    }

    public function destroy(News $news){
        $news->delete();
        return redirect(route('admin.index'))->with('success', "Новость удалена");
    }

}
