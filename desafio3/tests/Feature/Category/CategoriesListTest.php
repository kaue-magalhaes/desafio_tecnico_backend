<?php

/* 
Testa se a navegação da página inicial para a página de categorias está funcionando corretamente.

Este teste foi criado ao identificar que os links de navegação na página inicial não estavam 
funcionando corretamente. O teste verifica se a página de categorias é carregada corretamente e 
se a categoria esperada está presente na resposta.
*/

namespace Tests\Feature\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Product;
use App\Models\Category;

class CategoriesListTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test the categories list page returns a successful response and contains the category.
     *
     * @return void
     */
    public function testProductListReturnsSuccessfulResponse()
    {
        $category = factory(Category::class)->create([
            'name' => 'Category 1',
        ]);

        factory(Category::class, 9)->create();

        $response = $this->get(route('categories.list'));
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Category 1', $response->getContent());
    }
}
