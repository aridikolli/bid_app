<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //

public function index()
{
    $auctions=DB::table('auctions')->orderBy('end_date','asc')->get();

    return view('auctions.allAuctions',['auctions'=>$auctions]);

//    $given_date=$auctions[1]->end_date;
//    $dt = new DateTime();
//    $current_date= $dt->format('Y-m-d');
//    function dateDiffInDays($date1, $date2)
//    {
//        $diff = strtotime($date2) - strtotime($date1);
//        return abs(round($diff / 86400));
//    }
//    $dateDiff = dateDiffInDays($current_date, $given_date);
//    return $current_date. " ". $given_date." ".$dateDiff;
}

}
