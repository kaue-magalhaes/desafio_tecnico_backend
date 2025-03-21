<?php

/* 
Testa se a navegação da página inicial para a página de produtos está funcionando corretamente.

Este teste foi criado ao identificar que os links de navegação na página inicial não estavam 
funcionando corretamente. O teste verifica se a página de produtos é carregada corretamente e 
se o produto esperado está presente na resposta.
*/
namespace Tests\Feature\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Product;
use App\Models\Category;

class ProductsListTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test the products list page returns a successful response and contains the product.
     *
     * @return void
     */
    public function testProductsListReturnsSuccessfulResponse()
    {
        $category = factory(Category::class)->create([
            'name' => 'Category 1',
        ]);

        factory(Product::class)->create([
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'price' => 100.00,
            'category_id' => 1,
        ]);

        factory(Product::class, 9)->create();

        $response = $this->get(route('products.list'));
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Product 1', $response->getContent());
    }
}
