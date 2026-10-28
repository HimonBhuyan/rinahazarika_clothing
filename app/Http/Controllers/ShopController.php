<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        $categories = Category::where('is_active', true)
            ->orderBy('display_order')
            ->withCount('products')
            ->get();

        $featuredProducts = Product::where('is_featured', true)
            ->where('in_stock', true)
            ->with('category')
            ->take(8)
            ->get();

        $bihuSpecialProducts = Product::where('is_bihu_special', true)
            ->where('in_stock', true)
            ->with('category')
            ->take(6)
            ->get();

        $bestsellers = Product::where('is_bestseller', true)
            ->where('in_stock', true)
            ->with('category')
            ->take(6)
            ->get();

        $latestReviews = Review::with('product')
            ->where('rating', '>=', 4)
            ->latest()
            ->take(6)
            ->get();

        return view('shop.index', compact(
            'categories',
            'featuredProducts',
            'bihuSpecialProducts',
            'bestsellers',
            'latestReviews'
        ));
    }

    public function shop(Request $request): View
    {
        $query = Product::where('in_stock', true)->with('category');

        // Filter by Category
        if ($request->filled('category')) {
            $categorySlug = $request->input('category');
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        // Filter by Material Type
        if ($request->filled('material')) {
            $query->where('material_type', 'like', '%'.$request->input('material').'%');
        }

        // Filter by Motif
        if ($request->filled('motif')) {
            $query->where('motif', 'like', '%'.$request->input('motif').'%');
        }

        // Bihu Special flag
        if ($request->boolean('bihu')) {
            $query->where('is_bihu_special', true);
        }

        // Search Keyword
        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('assamese_name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('material_type', 'like', "%{$search}%")
                    ->orWhere('motif', 'like', "%{$search}%");
            });
        }

        // Price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', (float) $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', (float) $request->input('max_price'));
        }

        // Sorting
        $sort = $request->input('sort', 'newest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'popular':
                $query->orderBy('reviews_count', 'desc');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();

        $categories = Category::where('is_active', true)
            ->withCount('products')
            ->orderBy('display_order')
            ->get();

        $materials = [
            'Muga Silk' => 'Pure Muga Silk',
            'Paat Silk' => 'Mulberry Paat Silk',
            'Eri Silk' => 'Ahimsa Eri Silk',
            'Gold-washed' => 'Handcrafted Brass & Gold Wash',
            'Silver' => 'Traditional Silver & Meena',
        ];

        return view('shop.catalog', compact(
            'products',
            'categories',
            'materials'
        ));
    }

    public function product(string $slug): View
    {
        $product = Product::where('slug', $slug)
            ->with(['category', 'reviews'])
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('in_stock', true)
            ->take(4)
            ->get();

        return view('shop.product', compact('product', 'relatedProducts'));
    }

    public function heritage(): View
    {
        return view('pages.heritage');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function submitContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:20',
            'interest' => 'required|string',
            'message' => 'required|string|max:2000',
        ]);

        return redirect()->route('contact')->with(
            'success',
            'ধন্যবাদ! Thank you for reaching out. Our Assamese Handloom & Heritage Jewellery curator will contact you within 24 hours.'
        );
    }
}
