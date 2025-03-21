<?php
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
