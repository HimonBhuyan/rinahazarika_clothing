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
     * @return array<int, array{id: int, name: string, slug: string, price: float, quantity: int, image: string, material: string, motif: ?string, subtotal: float}>
     */
    public function getItems(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }

    public function add(Product $product, int $quantity = 1): void
    {
        $items = $this->getItems();
        $id = $product->id;

        if (isset($items[$id])) {
            $items[$id]['quantity'] += $quantity;
            $items[$id]['subtotal'] = $items[$id]['quantity'] * $items[$id]['price'];
        } else {
            $items[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'assamese_name' => $product->assamese_name,
                'slug' => $product->slug,
                'price' => (float) $product->price,
                'quantity' => $quantity,
                'image' => $product->primary_image,
                'material' => $product->material_type,
                'motif' => $product->motif,
                'subtotal' => (float) ($product->price * $quantity),
            ];
        }

        Session::put(self::SESSION_KEY, $items);
    }

    public function update(int $productId, int $quantity): void
    {
        $items = $this->getItems();

        if (isset($items[$productId])) {
            if ($quantity <= 0) {
                unset($items[$productId]);
            } else {
                $items[$productId]['quantity'] = $quantity;
                $items[$productId]['subtotal'] = (float) ($items[$productId]['price'] * $quantity);
            }
            Session::put(self::SESSION_KEY, $items);
        }
    }

    public function remove(int $productId): void
    {
        $items = $this->getItems();
        if (isset($items[$productId])) {
            unset($items[$productId]);
            Session::put(self::SESSION_KEY, $items);
        }
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
