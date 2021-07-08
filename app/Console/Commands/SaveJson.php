<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\{News, Category};

class SaveJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(News $news, Category $category)
    {
        File::put(storage_path() . '/news.json', json_encode($news->getNews(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        File::put(storage_path() . '/category.json', json_encode($category->getCategories(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    return 0;
    }
}
