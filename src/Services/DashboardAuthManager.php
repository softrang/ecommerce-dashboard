<?php

namespace softrang\EcommerceDashboard\Services;

use Illuminate\Contracts\Auth\Factory as AuthFactory;

class DashboardAuthManager
{
    protected $auth;

    public function __construct($app)
    {
        $this->auth = $app->make(AuthFactory::class);
    }

    public function guard($name = null)
    {
        $guard = $name ?? config('dashboard.guard', 'admin');
        return $this->auth->guard($guard);
    }

    public function user()
    {
        return $this->guard()->user();
    }

    public function check()
    {
        return $this->guard()->check();
    }

    public function logout()
    {
        return $this->guard()->logout();
    }

    public function attempt(array $credentials = [])
    {
        return $this->guard()->attempt($credentials);
    }
}
