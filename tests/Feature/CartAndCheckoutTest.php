<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use Database\Seeders\StoreSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartAndCheckoutTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(StoreSeeder::class);
    }

    public function test_can_add_product_to_cart_and_view(): void
    {
        $product = Product::first();
        $this->assertNotNull($product);

        $response = $this->post(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response->assertSessionHas('success');

        $cartView = $this->get(route('cart.index'));
        $cartView->assertStatus(200);
        $cartView->assertSee($product->name);
    }

    public function test_can_apply_bihu_promo_code(): void
    {
        $product = Product::first();
        $this->post(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->post(route('cart.coupon'), [
            'code' => 'BIHU2026',
        ]);

        $response->assertSessionHas('success');

        $cartView = $this->get(route('cart.index'));
        $cartView->assertSee('BIHU2026');
        $cartView->assertSee('Bihu Privilege Discount');
    }

    public function test_can_toggle_wishlist(): void
    {
        $product = Product::first();

        $response = $this->post(route('wishlist.toggle'), [
            'product_id' => $product->id,
        ]);

        $response->assertSessionHas('success');

        $wishlistView = $this->get(route('wishlist.index'));
        $wishlistView->assertStatus(200);
        $wishlistView->assertSee($product->name);
    }

    public function test_can_process_checkout_and_generate_order(): void
    {
        $product = Product::first();
        $this->post(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->post(route('checkout.process'), [
            'customer_name' => 'Maitreyee Kalita',
            'customer_email' => 'maitreyee@example.com',
            'customer_phone' => '9876543210',
            'shipping_address' => 'House 42, G.S. Road, Dispur',
            'city' => 'Guwahati',
            'state' => 'Assam',
            'postal_code' => '781005',
            'payment_method' => 'cod',
            'has_gamusa_gift_wrap' => 1,
        ]);

        $order = Order::where('customer_email', 'maitreyee@example.com')->first();
        $this->assertNotNull($order);

        $response->assertRedirect(route('order.success', $order->order_number));

        $successView = $this->get(route('order.success', $order->order_number));
        $successView->assertStatus(200);
        $successView->assertSee($order->order_number);
        $successView->assertSee('Thank You for Honoring Assamese Heritage');
    }
}
