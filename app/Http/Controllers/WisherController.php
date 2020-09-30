<?php

namespace App\Http\Controllers;

use App\Traits\ApiRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class WisherController extends Controller
{
    use ApiRequest;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth.custom');
    }
    public function index()
    {
        $wisher = session('wisher');
        $response = $this->apiRequest('get', config('apiRequests.wishlistApiUrl') . 'wisher_wishes?api_token=' . $wisher->api_token);
        return view('home', ['wisher' => $wisher, 'wishes' => $response->data]);
    }
    public function showProfile()
    {
        $wisher = session('wisher');
        $response = $this->apiRequest('get', config('apiRequests.wishlistApiUrl') . 'wisher_wishes?api_token=' . $wisher->api_token);
        return view('wisher-profile', ['wisher' => $wisher, 'wishes' => $response->data]);
    }
    public function updateProfile(Request $request)
    {
        $wisher = session('wisher');
        $params = array_merge($request->except(['_token', '_method']), ['api_token' => $wisher->api_token]);
        $response = $this->apiRequest('post', config('apiRequests.wishlistApiUrl') . 'wishers/' . $wisher->id, $params, 'multipart');
        $response && $response->code == 200 ? session(['wisher' => $response->data]) : "";
        return redirect()->back();
    }
    public function removeProfilePhoto()
    {
        $wisher = session('wisher');
        $params = ['api_token' => $wisher->api_token];
        $response = $this->apiRequest('delete', config('apiRequests.wishlistApiUrl') . 'remove_profile_photo/' . $wisher->id, $params);
        $response && $response->code == 200 ? session(['wisher' => $response->data]) : "";
        return redirect()->back();
    }
}
