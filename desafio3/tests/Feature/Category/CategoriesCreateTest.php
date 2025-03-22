<?php

/*
Testa se a criação de categorias está funcionando corretamente.

Este teste foi criado ao identificar que a criação de categorias não estava funcionando corretamente.
O teste verifica se a página de criação de categorias é carregada corretamente e se a categoria esperada está presente na resposta.
*/

namespace Tests\Feature\Category;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoriesCreateTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test if the category creation page returns a successful response.
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