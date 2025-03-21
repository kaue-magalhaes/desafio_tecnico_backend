<?php

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
