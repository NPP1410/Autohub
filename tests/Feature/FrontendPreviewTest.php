<?php

namespace Tests\Feature;

use App\Http\Controllers\Frontend\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class FrontendPreviewTest extends TestCase
{
    public function test_all_supplied_pages_render_without_backend_authentication(): void
    {
        foreach (PageController::PAGES as $page) {
            $this->get('/frontend/'.$page.'.php')->assertOk();
        }
        $this->assertGuest('admin');
    }

    public function test_home_has_isolated_asset_base_and_backend_root_is_preserved(): void
    {
        $this->get('/frontend')->assertOk()->assertSee(url('frontend').'/', false);
        $this->get('/')->assertRedirect('/webpanel/login');
        $route = Route::getRoutes()->match(Request::create('/webpanel/login', 'GET'));
        $this->assertStringContainsString('Webpanel\\AuthController@getLogin', $route->getActionName());
    }

    public function test_unknown_pages_and_partial_files_are_not_exposed(): void
    {
        $this->get('/frontend/not-a-page.php')->assertNotFound();
        $this->get('/frontend/inc_header.php')->assertNotFound();
        $this->get('/frontend/scriptjs.php')->assertNotFound();
    }

    public function test_pending_design_and_orders_links_do_not_break_navigation(): void
    {
        $this->get('/frontend/claims.php')->assertOk()->assertSee('ยังไม่มีไฟล์ออกแบบ');
        $this->get('/frontend/orders.php')->assertRedirect('/frontend/purchase-history.php');
    }

    public function test_customer_signin_preview_does_not_use_admin_authentication(): void
    {
        Auth::shouldReceive('guard')->never();
        $this->post('/frontend/signin.php', ['email' => 'preview@example.test', 'password' => 'not-stored'])
            ->assertRedirect('/frontend/signin.php')
            ->assertSessionHas('frontend.notice');
        $this->assertArrayNotHasKey('password', session()->getOldInput());
    }

    public function test_frontend_logout_preserves_admin_session_data(): void
    {
        $this->withSession(['backend-preview-marker' => 'preserved'])
            ->get('/frontend/logout.php')
            ->assertRedirect('/frontend/signin.php')
            ->assertSessionHas('backend-preview-marker', 'preserved');
    }
}
