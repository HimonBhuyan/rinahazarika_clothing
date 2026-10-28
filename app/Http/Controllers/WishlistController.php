<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class WishlistController extends Controller
{
    private const SESSION_KEY = 'assamese_wishlist';

    public function index(): View
    {
        $wishlistIds = Session::get(self::SESSION_KEY, []);
        $products = Product::whereIn('id', $wishlistIds)->with('category')->get();

        return view('wishlist.index', compact('products'));
    }

    public function toggle(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $productId = (int) $validated['product_id'];
        $wishlist = Session::get(self::SESSION_KEY, []);

        $added = false;
        if (in_array($productId, $wishlist)) {
            $wishlist = array_values(array_diff($wishlist, [$productId]));
            $message = 'Item removed from wishlist.';
        } else {
            $wishlist[] = $productId;
            $added = true;
            $message = 'Item saved to your Assamese heritage wishlist!';
        }

        Session::put(self::SESSION_KEY, $wishlist);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'added' => $added,
                'message' => $message,
                'count' => count($wishlist),
            ]);
        }

        return redirect()->back()->with('success', $message);
    }
}
