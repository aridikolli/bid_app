<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\User;
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
        return redirect()->route('home');

    }

    public function detail($id)
    {
        $auction=DB::table('auctions')->find($id);
        return view('auctions.auction_detail',['auction'=>$auction]);
    }

    public  function save(Request $request)
    {
        $id=$request->id;
        $price=$request->amount;
        $auction=Auction::find($id);
        if(!$auction->bidder_id){
            if($price>$auction->starting_bid){
              if($price<auth()->user()->balance){
                  $auction->highest_bid=$price;
                  $auction->bidder_id=auth()->user()->id;
                  $user=auth()->user();
                  $user->balance=$user->balance-$price;
                  $user->save();
                  $auction->save();

                  return back()->with('status','Bid is saved successfully');
              }
              else{
                  return back()->with('status','You do not have enough funds');
              }
            }
            else{
                return back()->with('status','Bid amount should be greater than initial price');
            }
        }
        else{
            if($price>$auction->highest_bid){
                if($price<auth()->user()->balance){
                    $auction->highest_bid=$price;
                    $auction->bidder_id=auth()->user()->id;
                    $user=auth()->user();
                    $user->balance=$user->balance-$price;
                    $user->save();
                    $auction->save();
                    return back()->with('status','Bid is saved successfully');
                }
                else{
                    return back()->with('status','You do not have enough funds');
                }
            }
            else{
                return back()->with('status','Bid amount should be greater than highest actual bid');
            }
        }
    }

    public function delete($id)
    {
        $auction=Auction::find($id);
        if (!$auction->bidder_id){
            $auction->delete();

        }
        else{
            $bidder=User::find($auction->bidder_id);
            $bidder->balance=$bidder->balance+$auction->highest_bid;
            $bidder->save();
            $auction->delete();
        }
        return back()->with('status','Auction successfully deleted');
    }
}
