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
  14 => 'signin',
);

    // These screens were referenced by the design but not included in its files.
    public const PENDING = [
        'claims' => 'เคลมสินค้า',
        'forgot-password' => 'ลืมรหัสผ่าน',
        'notifications' => 'การแจ้งเตือน',
        'register' => 'สมัครสมาชิก',
        'rewards' => 'คะแนนสะสม',
        'search' => 'ค้นหาสินค้า',
    ];

    public function home(Request $request)
    {
        return $this->show($request, 'index');
    }

    public function show(Request $request, string $page)
    {
        if ($page === 'orders') {
            return redirect()->route('frontend.page', ['page' => 'purchase-history']);
        }

        if ($page === 'logout') {
            // Frontend preview does not sign out or modify the admin session.
            return redirect()->route('frontend.signin');
        }

        if (array_key_exists($page, self::PENDING)) {
            return view('frontend.pages.pending', ['pendingTitle' => self::PENDING[$page]]);
        }

        abort_unless(in_array($page, self::PAGES, true), 404);

        return view('frontend.pages.'.$page);
    }

    public function previewSignIn(Request $request)
    {
        // Authentication will be implemented separately from the admin guard.
        return redirect()->route('frontend.signin')->with(
            'frontend.notice',
            'หน้านี้เป็นตัวอย่างหน้าบ้าน ยังไม่ได้เชื่อมระบบสมาชิก ข้อมูลที่กรอกจะไม่ถูกบันทึก'
        );
    }
}
