<?php

namespace App\Services;


use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Events\Dispatcher;

class RegisterService
{
    private $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function register(RegisterRequest $request): User
    {
        $user = User::register(
            $request['name'],
            $request['email'],
            $request['password']
        );

        $this->dispatcher->dispatch(new Registered($user));

        return $user;
    }
}
