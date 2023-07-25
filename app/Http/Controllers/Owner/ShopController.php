<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next) {

            // dd($request->route()->parameter('shop'));
            // dd(Auth::id());

            $id = $request->route()->parameter('shop');
            if (!is_null($id)) {
                $shopOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int)$shopOwnerId;
                $ownerId = Auth::id();
                if ($shopId !== $ownerId) {
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        // phpinfo();
        $ownerId = Auth::id();
        $shops = Shop::where('owner_id', $ownerId)->get();

        return view('owner.shops.index', compact('shops'));
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        // dd(Shop::findOrFail($id));
        return view('owner.shops.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {

        Log::info('ddd');

        $request->validate([
            'name' => ['max:50'],
            'information' => ['required', 'string', 'max:1000'],
            'is_selling' => ['required'],
        ]);

        Log::info('dddaaa');
        // $imageFile = $request->image;
        // if (!is_null($imageFile)) {
        //     Storage::putFile('public/shops', $imageFile);
        // }

        $shop = Shop::findOrFail($id);
        $shop->name = $request->shop;
        $shop->information = $request->information;
        $shop->is_selling = $request->is_selling;
        $shop->save();
        Log::info('dddaaaccc');
        return redirect()->route('owner.shops.index')->with([
            'message' => '更新しました。',
            'status' => 'info'
        ]);
    }
}
