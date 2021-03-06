<?php

namespace App\Traits\Auth;

use App\Traits\ApiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

trait RegistersUsers
{
    use RedirectsUsers, ApiRequest;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $rules = [
            'username' => 'required|string|min:2',
            'email' => 'email',
            'password' => 'required|string|confirmed|min:8',
        ];
        $validatedData = Validator::make($request->all(), $rules);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $response = $this->apiRequest('post', config('apiRequests.wishlistApiUrl') . 'register', $request->except('_token'), 'multipart');
        if ($response) {
            switch ($response->code) {
                case 200:
                    session(['wisher' => $response->data]);
                    return redirect('home');
                default:
                    return redirect()->back()->with('registerError', $response->errors)->withInput();
                    break;
            }
        }
        // $this->validator($request->all())->validate();

        // event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
