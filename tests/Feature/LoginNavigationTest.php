<?php

namespace Tests\Feature;

use App\Http\Controllers\Webpanel\AuthController;
use Illuminate\Http\Request;
use Tests\TestCase;

class LoginNavigationTest extends TestCase
{
    public function test_home_and_legacy_public_url_redirect_to_login(): void
    {
        $this->get('/')->assertRedirect('/webpanel/login');
        $this->get('/public')->assertRedirect('/webpanel/login');
    }

    public function test_invalid_normal_form_redirects_with_errors_without_flashing_password(): void
    {
        $this->post('/webpanel/login', ['password' => 'do-not-flash'])
            ->assertRedirect('/webpanel/login')
            ->assertSessionHasErrors('username');
        $this->assertArrayNotHasKey('password', session()->getOldInput());
    }

    public function test_invalid_ajax_form_still_returns_json(): void
    {
        $this->postJson('/webpanel/login', [])
            ->assertStatus(422)
            ->assertJson(['result' => 'error']);
    }

    public function test_successful_normal_form_response_redirects_to_dashboard(): void
    {
        $controller = new class extends AuthController {
            public function successfulResponse(Request $request)
            {
                return $this->loginResponse($request, ['result' => 'success']);
            }
        };
        $response = $controller->successfulResponse(Request::create('/webpanel/login', 'POST'));
        $this->assertSame(302, $response->getStatusCode());
        $this->assertSame(url('webpanel'), $response->getTargetUrl());
    }

    public function test_successful_ajax_response_preserves_redirect_payload(): void
    {
        $controller = new class extends AuthController {
            public function successfulResponse(Request $request)
            {
                return $this->loginResponse($request, ['result' => 'success', 'redirect' => url('webpanel')]);
            }
        };
        $request = Request::create('/webpanel/login', 'POST');
        $request->headers->set('Accept', 'application/json');
        $response = $controller->successfulResponse($request);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame(url('webpanel'), $response->getData(true)['redirect']);
    }
}
