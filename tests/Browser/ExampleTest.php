<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->type('title', '123')
                    ->type('text', 'test123')
                    ->press('Добавить новость')

                    ->assertSee('Мало букв в поле Заголовок');
        });
    }
}
