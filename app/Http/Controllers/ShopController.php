<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Http\Requests\StoreShopReqest;
use App\Http\Requests\UpdateShopReqest;
use Illuminate\Support\Facades\Gate;

/*いらないかも？*/
use Illuminate\Support\Facades\Validator;
use App\Models\User;

/*画像ファイル削除*/
use Illuminate\Support\Facades\Storage;

/*追加*/
use App\Imports\ShopsImport;
use App\Models\Review;
use Maatwebsite\Excel\Facades\Excel;


class ShopController extends Controller
{
    public function shop_data_create(StoreShopReqest $request)
    {
        /*ユーザーの認可　*/
        Gate::authorize('isAdmin_shop');
        /*パラメータ取得　*/
        $name = $request->name;
        $kana = $request->kana;
        $area_id = $request->area_id;
        $genre_id = $request->genre_id;
        $info = $request->info;
        $admin_user_id = Auth::id();

        /*店舗情報の新規作成　*/
        Shop::create([
            'name' => $name,
            'kana' => $kana,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'info' => $info,
            'admin_user_id' => $admin_user_id,
        ]);

        return redirect('/adminshop');
    }

    public function shop_data_update(UpdateShopReqest $request)
    {
        /*ユーザーの認可　*/
        Gate::authorize('isAdmin_shop');
        
        $shop = Shop::where('admin_user_id', Auth::id())->first();
        $form = $request->all();
        unset($form['_token']);
        /*店舗情報の更新　*/
        $shop->update($form);

        return redirect('/adminshop');
    }


    public function shop_image_add(Request $request)
    {
        /*ユーザーの認可　*/
        Gate::authorize('isAdmin_shop');
        $shop = Shop::where('admin_user_id', Auth::id())->first();
        if ($shop->image != null) {
            Storage::delete('public/shop_image/' . $shop->image);
        }
        /*店舗写真をストレージへ保存　*/
        $image_path = $request->file('image')->storeAs('public/shop_image', $shop->id);
        /*店舗写真のファイル名をデータベースへ保存*/
        $shop->image = basename($image_path);
        $shop->save();

        return redirect('/adminshop');
    }

    /*飲食店一覧の表示*/
    public function index()
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        $favorites = Favorite::where('user_id', Auth::id());
        return view('welcome', ['shops' => $shops, 'areas' => $areas, 'genres' => $genres, 'favorites' => $favorites]);
    }

    /*飲食店の詳細*/
    public function shop_detail($shop_id)
    {
        $shop = Shop::where('id', $shop_id)->first();
        return view('shop_detail', ['shop' => $shop,]);
    }

    /*お気に入りの追加・削除*/
    public function favorite_add(Request $request){
        $shop_id = $request->shop_id;
        $user_id = Auth::id();
        /*a*/
        Favorite::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
        ]);

        return back();
    }
    public function favorite_del(Request $request)
    {
        $shop_id = $request->shop_id;
        $user_id = Auth::id();

        $favorite = Favorite::where('user_id', $user_id)
        ->where('shop_id', $shop_id);
        $favorite->delete();
        return back();
        }



    /*以下、イメージのインポート*/
    public function image()
    {
        return view('image');
    }

    public function image_save(Request $request)
    {

        /*店舗写真をストレージへ保存　*/
        $image_path = $request->file('image')->storeAs('public/shop_image', $request->shop_id);

        $shop = Shop::find($request->shop_id);
        $shop->image = basename($image_path);
        $shop->save();

        return redirect('/image')->with('success', 'All good!');
    }


}
