<?php

namespace GetThingsDone\Account\Tests;

use GetThingsDone\Account\Http\Middleware\RedirectIfFromReferrer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class RedirectIfFromReferrerTest extends TestCase
{
    /** @test */
    public function it_should_redirect_if_from_referrer()
    {
        Auth::shouldReceive('check')->andreturn(true);
        session(['referrer' => 'http://example.com']);

        $middleware = new RedirectIfFromReferrer;
        $request = Request::create('test');

        $response = $middleware->handle($request, function () {
        });
        
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertStringContainsString('http://example.com', $response->getContent());
        $this->assertNull(session()->get('referrer'));
    }

    /** @test */
    public function it_should_not_redirect_if_unauthenticated()
    {
        Auth::shouldReceive('check')->andreturn(false);
        session(['referrer' => 'http://example.com']);

        $middleware = new RedirectIfFromReferrer;
        $request = Request::create('test');

        $response = $middleware->handle($request, function () {
        });
        
        $this->assertNull($response);
    }

    /** @test */
    public function it_should_not_redirect_if_not_from_referrer()
    {
        Auth::shouldReceive('check')->andreturn(true);

        $middleware = new RedirectIfFromReferrer;
        $request = Request::create('test');

        $response = $middleware->handle($request, function () {
        });
        
        $this->assertNull($response);
    }
}
