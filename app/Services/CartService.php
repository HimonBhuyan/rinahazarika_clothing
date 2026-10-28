<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    private const SESSION_KEY = 'assamese_cart';

    private const COUPON_KEY = 'assamese_cart_coupon';

    private const GIFT_WRAP_KEY = 'assamese_gift_wrap';

    /**
     * @return array<int, array{id: int, name: string, assamese_name: ?string, slug: string, price: float, quantity: int, image: string, material: string, motif: ?string, subtotal: float}>
     */
    public function getItems(): array
    {
        $raw = Session::get(self::SESSION_KEY, []);
        if (empty($raw)) {
            return [];
        }

        // Backwards compatibility if stored as full array
        $first = reset($raw);
        if (is_array($first) && isset($first['name'])) {
            return $raw;
        }

        $productIds = array_keys($raw);
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
        $hydrated = [];

        foreach ($raw as $id => $quantity) {
            $qty = is_array($quantity) ? ($quantity['quantity'] ?? 1) : (int) $quantity;
            $productId = (int) $id;
            if (isset($products[$productId])) {
                $product = $products[$productId];
                $hydrated[$productId] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'assamese_name' => $product->assamese_name,
                    'slug' => $product->slug,
                    'price' => (float) $product->price,
                    'quantity' => $qty,
                    'image' => $product->primary_image,
                    'material' => $product->material_type,
                    'motif' => $product->motif,
                    'subtotal' => (float) ($product->price * $qty),
                ];
            }
        }

        return $hydrated;
    }

    public function add(Product $product, int $quantity = 1): void
    {
        $raw = Session::get(self::SESSION_KEY, []);
        $quantities = [];
        foreach ($raw as $key => $val) {
            $quantities[(int) $key] = is_array($val) ? ($val['quantity'] ?? 1) : (int) $val;
        }

        $id = $product->id;
        if (isset($quantities[$id])) {
            $quantities[$id] += $quantity;
        } else {
            $quantities[$id] = $quantity;
        }

        Session::put(self::SESSION_KEY, $quantities);
    }

    public function update(int $productId, int $quantity): void
    {
        $raw = Session::get(self::SESSION_KEY, []);
        $quantities = [];
        foreach ($raw as $key => $val) {
            $quantities[(int) $key] = is_array($val) ? ($val['quantity'] ?? 1) : (int) $val;
        }

        if ($quantity <= 0) {
            unset($quantities[$productId]);
        } else {
            $quantities[$productId] = $quantity;
        }

        Session::put(self::SESSION_KEY, $quantities);
    }

    public function remove(int $productId): void
    {
        $raw = Session::get(self::SESSION_KEY, []);
        $quantities = [];
        foreach ($raw as $key => $val) {
            $quantities[(int) $key] = is_array($val) ? ($val['quantity'] ?? 1) : (int) $val;
        }

        unset($quantities[$productId]);
        Session::put(self::SESSION_KEY, $quantities);
    }

    public function clear(): void
    {
        Session::forget(self::SESSION_KEY);
        Session::forget(self::COUPON_KEY);
        Session::forget(self::GIFT_WRAP_KEY);
    }

    public function getCount(): int
    {
        $count = 0;
        foreach ($this->getItems() as $item) {
            $count += $item['quantity'];
        }

        return $count;
    }

    public function getSubtotal(): float
    {
        $subtotal = 0.0;
        foreach ($this->getItems() as $item) {
            $subtotal += $item['subtotal'];
        }

        return (float) $subtotal;
    }

    public function applyCoupon(string $code): bool
    {
        $cleanCode = strtoupper(trim($code));
        if (in_array($cleanCode, ['BIHU2026', 'RONGALI', 'AXOM10', 'SILK10'])) {
            Session::put(self::COUPON_KEY, [
                'code' => $cleanCode,
                'percent' => 10,
                'description' => 'Festive Bihu Special 10% Discount applied',
            ]);

            return true;
        }

        if (in_array($cleanCode, ['ROYAL15', 'HERITAGE15'])) {
            Session::put(self::COUPON_KEY, [
                'code' => $cleanCode,
                'percent' => 15,
                'description' => 'Royal Heritage 15% Discount applied',
            ]);

            return true;
        }

        return false;
    }

    public function removeCoupon(): void
    {
        Session::forget(self::COUPON_KEY);
    }

    /**
     * @return array{code: string, percent: int, description: string}|null
     */
    public function getCoupon(): ?array
    {
        return Session::get(self::COUPON_KEY);
    }

    public function getDiscountAmount(): float
    {
        $coupon = $this->getCoupon();
        if (! $coupon) {
            return 0.0;
        }

        $subtotal = $this->getSubtotal();

        return (float) round(($subtotal * $coupon['percent']) / 100, 2);
    }

    public function setGiftWrap(bool $enabled): void
    {
        Session::put(self::GIFT_WRAP_KEY, $enabled);
    }

    public function hasGiftWrap(): bool
    {
        return (bool) Session::get(self::GIFT_WRAP_KEY, false);
    }

    public function getGiftWrapCost(): float
    {
        return $this->hasGiftWrap() ? 150.0 : 0.0;
    }

    public function getShippingCost(): float
    {
        $subtotal = $this->getSubtotal();
        // Free shipping on orders above ₹5000
        if ($subtotal >= 5000 || $subtotal === 0.0) {
            return 0.0;
        }

        return 199.0;
    }

    public function getTotal(): float
    {
        $subtotal = $this->getSubtotal();
        if ($subtotal === 0.0) {
            return 0.0;
        }

        $discount = $this->getDiscountAmount();
        $shipping = $this->getShippingCost();
        $giftWrap = $this->getGiftWrapCost();

        return (float) max(0, ($subtotal - $discount + $shipping + $giftWrap));
    }
}
