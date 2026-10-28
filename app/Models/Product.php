<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $guarded = [];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'images' => 'array',
            'price' => 'decimal:2',
            'original_price' => 'decimal:2',
            'rating' => 'decimal:2',
            'in_stock' => 'boolean',
            'is_featured' => 'boolean',
            'is_bestseller' => 'boolean',
            'is_bihu_special' => 'boolean',
            'is_new' => 'boolean',
        ];
    }

    /**
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasMany<Review, $this>
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function getPrimaryImageAttribute(): string
    {
        $images = $this->images;
        if (! empty($images) && is_array($images)) {
            return $images[0];
        }

        return 'images/products/placeholder.svg';
    }

    public function getDiscountPercentAttribute(): int
    {
        if ($this->original_price && $this->original_price > $this->price) {
            return (int) round((($this->original_price - $this->price) / $this->original_price) * 100);
        }

        return 0;
    }

    public function getFormattedPriceAttribute(): string
    {
        return '₹'.number_format($this->price, 0);
    }

    public function getFormattedOriginalPriceAttribute(): ?string
    {
        return $this->original_price ? '₹'.number_format($this->original_price, 0) : null;
    }
}
