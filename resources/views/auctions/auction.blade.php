<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Auction</title>
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
        <form action="submit_auction.php" method="post">
            <div class="form-group">
                <label for="item_name">Product Name:</label>
                <input type="text" id="item_name" name="item_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="starting_price">Starting Bid:</label>
                <input type="number" id="starting_price" name="starting_price" class="form-control" min="0" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="starting_price">Ending  Date:</label>

                <input type="date" id="end_date" name="end_date" class="form-control" min="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Auction</button>
        </form>
    </div>
</main>
<footer class="bg-dark text-light py-3">
    <div class="container text-center">
        <p>&copy; 2024 Auction Site</p>
    </div>
</footer>
</body>
</html>
