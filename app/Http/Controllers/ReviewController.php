<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function review_create(StoreReviewRequest $request)
    {
        $reservation_id = $request->reservation_id;
        $stars = $request->stars;
        $comment = $request->comment;

        Review::create([
            'reservation_id' => $reservation_id, 
            'stars'=> $stars,
            'comment' => $comment,
        ]);
        return redirect('/mypage');

    }

    /*レビュー一覧へ*/
    public function review_show($shop_id)
    {
        $shop = Shop::where('id', $shop_id)->first();
        $reviews = $shop->reviews()->get();
        return view('shop_review', ['shop' => $shop, 'reviews' => $reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
