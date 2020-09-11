<?php

namespace Illuminate\Foundation\Auth;

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
            'email' => 'required|string| email',
            'password' => 'required|string|confirmed|min:8',
        ];
        $validatedData = Validator::make($request->all(), $rules);
        if($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $response = $this->apiRequest('post', config('apiRequests.wishlistApiUrl').'register', $request->except('_token'));
        if($response) {
            switch ($response->code) {
                case 1062:
                    return redirect()->back()->with('duplicateEntry', $response->message)->withInput();
                    break;
                case 200:
                    session(['wisher' => $response->data]);
                    return redirect('home');
                default:
                    return Redirect::back()->with('registerError', 'An error occurred whiles registering you')->withInput();
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
