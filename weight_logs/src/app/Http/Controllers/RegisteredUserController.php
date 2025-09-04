<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Laravel\Fortify\Fortify;
use App\Http\Requests\RegisterRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class RegisteredUserController extends Controller
{
        /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show the registration view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\RegisterViewResponse
     */
    public function create(Request $request): RegisterViewResponse
    {
        return app(RegisterViewResponse::class);
    }

    /**
     * Create a new registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\CreatesNewUsers  $creator
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request, CreatesNewUsers $creator): RedirectResponse
    {
        // ユーザー情報登録
        event(new Registered($user = $creator->create($request->all())));

        $this->guard->login($user);

        return redirect('/register/step2');
        
    }
}
