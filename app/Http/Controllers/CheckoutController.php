<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct(
        protected CartService $cart
    ) {}

    public function index(): View|RedirectResponse
    {
        $items = $this->cart->getItems();

        if (empty($items)) {
            return redirect()->route('cart.index')->with('info', 'Your cart is empty. Please add products before checking out.');
        }

        $subtotal = $this->cart->getSubtotal();
        $discount = $this->cart->getDiscountAmount();
        $shipping = $this->cart->getShippingCost();
        $giftWrap = $this->cart->getGiftWrapCost();
        $hasGiftWrap = $this->cart->hasGiftWrap();
        $coupon = $this->cart->getCoupon();
        $total = $this->cart->getTotal();

        return view('checkout.index', compact(
            'items',
            'subtotal',
            'discount',
            'shipping',
            'giftWrap',
            'hasGiftWrap',
            'coupon',
            'total'
        ));
    }

    public function process(Request $request): RedirectResponse
    {
        $items = $this->cart->getItems();
        if (empty($items)) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:120',
            'customer_email' => 'required|email|max:150',
            'customer_phone' => 'required|string|min:10|max:15',
            'shipping_address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|min:4|max:10',
            'payment_method' => 'required|in:cod,upi,card',
            'has_gamusa_gift_wrap' => 'nullable|boolean',
            'order_notes' => 'nullable|string|max:1000',
        ]);

        $subtotal = $this->cart->getSubtotal();
        $discount = $this->cart->getDiscountAmount();
        $shipping = $this->cart->getShippingCost();
        $hasGiftWrap = $request->boolean('has_gamusa_gift_wrap') || $this->cart->hasGiftWrap();
        $giftWrapCost = $hasGiftWrap ? 150.0 : 0.0;
        $total = max(0, $subtotal - $discount + $shipping + $giftWrapCost);

        $orderNumber = 'AXOM-'.date('Ymd').'-'.strtoupper(Str::random(5));
        $coupon = $this->cart->getCoupon();

        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'shipping_address' => $validated['shipping_address'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'postal_code' => $validated['postal_code'],
            'subtotal' => $subtotal,
            'discount_amount' => $discount,
            'shipping_cost' => $shipping,
            'total_amount' => $total,
            'payment_method' => $validated['payment_method'],
            'payment_status' => $validated['payment_method'] === 'cod' ? 'pending' : 'paid_demo',
            'order_status' => 'confirmed',
            'coupon_code' => $coupon ? $coupon['code'] : null,
            'has_gamusa_gift_wrap' => $hasGiftWrap,
            'order_notes' => $validated['order_notes'] ?? null,
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['subtotal'],
                'image' => $item['image'],
                'motif' => $item['motif'] ?? null,
            ]);

            // Decrement stock quantity
            $product = Product::find($item['id']);
            if ($product && $product->stock_quantity > 0) {
                $product->decrement('stock_quantity', $item['quantity']);
            }
        }

        // Clear cart
        $this->cart->clear();

        return redirect()->route('order.success', ['order_number' => $order->order_number])
            ->with('success', 'অসমীয়া সাজ আৰু অলংকাৰ অৰ্ডাৰ নিশ্চিত হ’ল! Your heritage order has been placed.');
    }

    public function success(string $order_number): View
    {
        $order = Order::where('order_number', $order_number)
            ->with('items')
            ->firstOrFail();

        return view('checkout.success', compact('order'));
    }
}
