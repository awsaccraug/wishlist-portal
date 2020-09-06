<?php

namespace App\Http\Controllers;

use App\Traits\ApiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WishController extends Controller
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
        $response = $this->apiRequest('get', config('apiRequests.wishlistApiUrl').'wishes?api_token='.$wisher->api_token);
        return redirect('home');
    }
    public function addWish(Request $request)
    {
        $wisher = session('wisher');
        $params = array_merge($request->except('_token'), ['api_token' => $wisher->api_token]);
        $response = $this->apiRequest('post', config('apiRequests.wishlistApiUrl').'wishes',$params);
        return redirect()->back();
    }
    public function updateWish(Request $request, $id)
    {
        $wisher = session('wisher');
        $params = array_merge($request->except(['_token', '_method']), ['api_token' => $wisher->api_token]);
        $this->apiRequest('put', config('apiRequests.wishlistApiUrl').'wishes/'.$id,$params);
        return redirect()->back();
    }
    public function deleteWish($id) {
        $wisher = session('wisher');
        $params = ['api_token' => $wisher->api_token];
        $response = $this->apiRequest('delete', config('apiRequests.wishlistApiUrl').'wishes/'.$id,$params);
        return redirect()->back();
    }
}
