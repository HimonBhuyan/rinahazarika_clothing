<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Seeders\StoreSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(StoreSeeder::class);
    }

    public function test_homepage_loads_with_assamese_heritage_elements(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('RINA HAZARIKA');
        $response->assertSee('Mekhela Sador');
        $response->assertSee('Bihu Ornaments');
    }

    public function test_catalog_page_displays_products_and_filters(): void
    {
        $response = $this->get(route('shop'));

        $response->assertStatus(200);
        $response->assertSee('Assamese Handloom');
        $response->assertSee('Categories');
    }

    public function test_product_detail_page_loads_with_craft_lore(): void
    {
        $product = Product::first();
        $this->assertNotNull($product);

        $response = $this->get(route('product.show', $product->slug));

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee('The Weaving', false);
        $response->assertSee('Metallurgical Lore', false);
    }

    public function test_heritage_story_page_loads(): void
    {
        $response = $this->get(route('heritage'));

        $response->assertStatus(200);
        $response->assertSee('The Three Sacred Silks of Assam');
        $response->assertSee('Sualkuchi');
    }

    public function test_contact_inquiry_can_be_submitted(): void
    {
        $response = $this->post(route('contact.submit'), [
            'name' => 'Himakshi Das',
            'email' => 'himakshi@example.com',
            'phone' => '+91 9876543210',
            'interest' => 'Bridal Mekhela Sador Commission',
            'message' => 'Looking for authentic Muga silk bridal set with Kingkhap motifs.',
        ]);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');
    }
}
