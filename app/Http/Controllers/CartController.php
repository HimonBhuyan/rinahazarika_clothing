<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cart
    ) {}

    public function index(): View
    {
        $items = $this->cart->getItems();
        $subtotal = $this->cart->getSubtotal();
        $discount = $this->cart->getDiscountAmount();
        $shipping = $this->cart->getShippingCost();
        $giftWrap = $this->cart->getGiftWrapCost();
        $hasGiftWrap = $this->cart->hasGiftWrap();
        $coupon = $this->cart->getCoupon();
        $total = $this->cart->getTotal();

        return view('cart.index', compact(
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

    public function add(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1|max:10',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $quantity = (int) ($validated['quantity'] ?? 1);

        $this->cart->add($product, $quantity);

        if ($request->boolean('buy_now')) {
            return redirect()->route('checkout.index');
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "{$product->name} added to your Assamese Heritage cart!",
                'cartCount' => $this->cart->getCount(),
                'subtotal' => $this->cart->getSubtotal(),
                'total' => $this->cart->getTotal(),
            ]);
        }

        return redirect()->back()->with(
            'success',
            "{$product->name} has been added to your cart."
        );
    }

    public function update(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:0|max:20',
        ]);

        $this->cart->update((int) $validated['product_id'], (int) $validated['quantity']);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'cartCount' => $this->cart->getCount(),
                'subtotal' => $this->cart->getSubtotal(),
                'discount' => $this->cart->getDiscountAmount(),
                'shipping' => $this->cart->getShippingCost(),
                'giftWrap' => $this->cart->getGiftWrapCost(),
                'total' => $this->cart->getTotal(),
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function remove(Request $request, int $id): RedirectResponse|JsonResponse
    {
        $this->cart->remove($id);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'cartCount' => $this->cart->getCount(),
                'subtotal' => $this->cart->getSubtotal(),
                'discount' => $this->cart->getDiscountAmount(),
                'shipping' => $this->cart->getShippingCost(),
                'giftWrap' => $this->cart->getGiftWrapCost(),
                'total' => $this->cart->getTotal(),
                'message' => 'Item removed from your cart.',
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from your cart.');
    }

    public function clear(): RedirectResponse
    {
        $this->cart->clear();

        return redirect()->route('cart.index')->with('success', 'Cart cleared.');
    }

    public function applyCoupon(Request $request): RedirectResponse
    {
        $request->validate(['code' => 'required|string']);

        $applied = $this->cart->applyCoupon($request->input('code'));

        if ($applied) {
            return redirect()->route('cart.index')->with('success', 'Bihu discount code applied successfully!');
        }

        return redirect()->route('cart.index')->with('error', 'Invalid promo code. Try "BIHU2026" or "AXOM10" for 10% off.');
    }

    public function removeCoupon(): RedirectResponse
    {
        $this->cart->removeCoupon();

        return redirect()->route('cart.index')->with('info', 'Promo coupon removed.');
    }

    public function toggleGiftWrap(Request $request): RedirectResponse
    {
        $enabled = $request->boolean('gift_wrap');
        $this->cart->setGiftWrap($enabled);

        return redirect()->route('cart.index')->with(
            'success',
            $enabled ? 'Traditional red-and-white Gamusa gift wrapping added (+₹150)' : 'Gamusa gift wrapping removed.'
        );
    }
}
