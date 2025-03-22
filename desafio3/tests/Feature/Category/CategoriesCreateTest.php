<?php

namespace Tests\Feature\Category;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoriesCreateTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * 
     *
     * @return void
     */
    public function testCategoryCanBeCreatedSuccessfully()
    {
        $data = [
            'name' => 'New Category',
            'description' => 'This is a test category',
        ];

        $response = $this->post(route('categories.store'), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('categories.list'));
        $this->assertDatabaseHas('categories', $data);
    }
}