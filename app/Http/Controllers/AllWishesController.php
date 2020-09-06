<?php

namespace App\Http\Controllers;

use App\Traits\ApiRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;

class AllWishesController extends Controller
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
   public function index()
    {
        $wisher = session('wisher');
        $response = $this->apiRequest('get', config('apiRequests.wishlistApiUrl').'wishes');
        $wishes = $response->data;
        return view('welcome', ['wisher' => $wisher, 'wishes' => $wishes]);
    }
     public function search(Request $request)
    {

        $wisher = session('wisher');
        $response = $this->apiRequest('post', config('apiRequests.wishlistApiUrl').'wishes/search', ['title' => $request->title]);
        $wishes = $response->data;
        $resultsMessage = $wishes ? 'Search results for ' : "Sorry, we could'nt find any results matching";
        $resultsMessage .= " '$request->title'";
        return view('search-wish', ['wisher' => $wisher, 'wishes' => $wishes]);

    }
    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
