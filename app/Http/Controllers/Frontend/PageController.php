<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public const PAGES = array (
  0 => 'about',
  1 => 'cart',
  2 => 'checkout',
  3 => 'confirm',
  4 => 'credit',
  5 => 'edit-profile',
  6 => 'index',
  7 => 'invoice',
  8 => 'order-product',
  9 => 'payment-history',
  10 => 'product',
  11 => 'product-detail',
  12 => 'purchase-history',
  13 => 'purchase-order',
  14 => 'catalogue',
  15 => 'claim-list',
  16 => 'claim-product',
  17 => 'contact',
  18 => 'new-model',
  19 => 'notifications',
  20 => 'point-reward',
  21 => 'privacy-policy',
  22 => 'promotion',
  23 => 'promotion-detail',
  24 => 'register-claim',
  25 => 'top-sale',
  26 => 'point-reward-detail',
);

    // Preserve old design links while using the newly supplied screens.
    public const ALIASES = ['claims' => 'claim-list', 'rewards' => 'point-reward'];

    public function home(Request $request)
    {
        return $this->show($request, 'index');
    }

    public function show(Request $request, string $page)
    {
        if ($page === 'orders') {
            return redirect()->route('frontend.page', ['page' => 'purchase-history']);
        }


        if (array_key_exists($page, self::ALIASES)) {
            return redirect()->route('frontend.page', ['page' => self::ALIASES[$page]]);
        }

        abort_unless(in_array($page, self::PAGES, true), 404);

        return view('frontend.pages.'.$page);
    }

}
