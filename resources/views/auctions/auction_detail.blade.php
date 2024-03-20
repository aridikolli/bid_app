
@php
    use Illuminate\Support\Facades\DB;
    function dateDiffInDays($date1, $date2)
            {
                $diff = strtotime($date2) - strtotime($date1);
                return abs(round($diff / 86400));
            }
            $dt = new DateTime();
            $current_date= $dt->format('Y-m-d');

@endphp
    @if($auction==null)
     @php
     return redirect()->route('newAuction');
     @endphp
    @endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark text-light py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>All Auctions</h1>
        <div>
            <a href="#" class="btn btn-success"> Home </a>
            <a href="#" class="btn btn-danger">Logout</a>
        </div>
    </div>
</header>

<main class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Auction Name: {{$auction->name}}</h2>
                @php
                    $user=DB::table('users')->where('id',$auction->user_id)->first();
                @endphp
                <p>Auction Creator: {{$user->username}}</p>
                @php
                    $dayDifference = dateDiffInDays($auction->end_date, $current_date);
                @endphp
                <p>Time Remaining: {{$dayDifference}} Days</p>
                <p>Description : {{$auction->description}}</p>
                <p>Current Highest Bid: $500</p>
                <p>Highest Bidder: Jane Smith</p>
                <form>
                    <div class="form-group">
                        <label for="bidAmount">Your Bid:</label>
                        <input type="number" class="form-control" id="bidAmount" placeholder="Enter bid amount" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Bid</button>
                </form>
            </div>
        </div>
    </div>
</main>
<footer class="bg-dark text-light py-3">
    <div class="container text-center">
        <p>&copy; 2024 Auction Site</p>
    </div>
</footer>
</body>
</html>
