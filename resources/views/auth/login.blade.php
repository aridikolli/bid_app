<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark text-light py-4">
    <div class="container">
        <h1>Login</h1>

        @if(session('status'))
            <div class="text-danger">
                {{session('status')}}

            </div>
        @endif
    </div>
</header>
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{route('login')}}" method="Post">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Enter username" >
                    </div>
                    @error('username')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" >
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <h3 class="justify-content center mt-5"> Don't you have an account ? </h3>
                <a href="{{route('register')}}" class="mt-5 btn btn-primary"> Register here </a>
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
