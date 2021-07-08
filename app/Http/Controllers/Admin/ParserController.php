<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\News;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {

        $rssLinks = [
            'https://lenta.ru/rss/news',
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/championsleague.rss',
        ];

        $start = microtime(true);

        foreach ($rssLinks as $link) {
           NewsParsing::dispatch($link);
        }
        $end = microtime(true);
        dump($end - $start);

        return view('admin.index', [
            'news' => News::all(),
        ]);


    }
}
