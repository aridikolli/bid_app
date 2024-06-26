@php
    use Illuminate\Support\Facades\DB;
    use App\Models\Auction;
    use App\Models\User;
    function dateDiffInDays($date1, $date2)
            {
                $diff = strtotime($date2) - strtotime($date1);
                return -(round($diff / 86400));
            }
            $dt = new DateTime();
            $current_date= $dt->format('Y-m-d');
 @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Auctions</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<header class="bg-dark text-light py-4">

    <div class="container d-flex justify-content-between align-items-center">
        <h1>All Auctions</h1>
        <div>
            <span class="mr-3">Hello, {{auth()->user()->username}}</span>
            <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
        </div>
    </div>
</header>
    @if($auctions->count()==0)
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <h1 class="mt-5">There are no auctions up to now</h1>
                    </div>
                </div>
            </div>
        </main>
    @else
        <main class="py-4">
            <div class="container">
                <div class="row">


    @foreach($auctions as $auction)

                        @php
                            $dayDifference = dateDiffInDays($auction->end_date, $current_date);
                        @endphp

                        <div class="col-lg-4 mb-4">
                            <div class="card">
                                <div class="card-body" style="height: 200px">

                                    <a href="/auctions/{{$auction->id}}">

                                        <h5 class="card-title">Product : {{$auction->name}} </h5>
                                    </a>
                                    @php
                                    $user=DB::table('users')->where('id',$auction->user_id)->first();
                                     @endphp
                                    <p class="card-text">Seller : {{$user->username}}.</p>
                                    @if($auction->bidder_id)
                                        <p class="card-text">Top Bid: {{$auction->highest_bid}}</p>
                                    @else
                                        <p class="card-text">No actual bid yet</p>

                                    @endif


                                    <p class="card-text">Time Remaining: {{$dayDifference}} days</p>

                                    @if($user->username===auth()->user()->username)
                                        <a href="auctions/delete/{{$auction->id}}" class="btn btn-primary">Delete</a>
                                    @endif
                                </div>
                            </div>
                        </div>


    @endforeach

            @endif

        </div>
        <a href="{{route('newAuction')}}" class=" bg-light p-3 rounded">New Auction</a>
        <h3 class="text-center mt-4 bg-light p-3 rounded">Your current wallet: {{auth()->user()->balance}}</h3>
    </div>
</main>
<footer class="bg-dark text-light py-3">
    <div class="container text-center">
        <p>&copy; 2024 Auction Site</p>
    </div>
</footer>
</body>
</html>
