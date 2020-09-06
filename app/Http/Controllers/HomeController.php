<?php

namespace App\Http\Controllers;

use App\Traits\ApiRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiRequest;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.custom');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wisher = session('wisher');
        $response = $this->apiRequest('get', config('apiRequests.wishlistApiUrl') . 'wisher_wishes?api_token=' . $wisher->api_token);
        return view('home', ['wisher' => $wisher, 'wishes' => $response->data]);
    }
}
