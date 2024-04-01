<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //





public function index()
{


     function dateDiffInDays($date1, $date2)
{
    $diff = strtotime($date2) - strtotime($date1);
    return -(round($diff / 86400));
}

    $auctions=Auction::orderBy('end_date','asc')->get();
    $dt = new DateTime();
    $current_date= $dt->format('Y-m-d');
    foreach ($auctions as $auction){
        $dayDifference = dateDiffInDays($auction->end_date, $current_date);
        if($dayDifference<0){
            $owner=User::find($auction->user_id);
            $owner->balance=$owner->balance+$auction->highest_bid;
            $owner->save();
            $auction->delete();
        }
    }
    $auctions=Auction::orderBy('end_date','asc')->get();
    return view('auctions.allAuctions',['auctions'=>$auctions]);

}




}
