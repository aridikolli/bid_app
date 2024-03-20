<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuctionController extends Controller
{
    //

    public function  index()
    {
        return view('auctions.auction');
    }

    public function store(Request $request)
    {
        $this->validate($request,
        [
           'name'=>'required|min:3',
            'description'=>'required|min:10',
            'starting_price'=>'required|min:0',
            'end_date'=>'required',
        ]);
        $auction=new Auction();
        $auction->name=$request->name;
        $auction->description=$request->description;
        $auction->starting_bid=$request->starting_price;
        $auction->end_date=$request->end_date;
        $auction->user_id=auth()->user()->id;
        $auction->highest_bid=0;
        $auction->save();
        return redirect()->route('newAuction');

    }

    public function detail($id)
    {
        $auction=DB::table('auctions')->find($id);
        return view('auctions.auction_detail',['auction'=>$auction]);
    }
}
