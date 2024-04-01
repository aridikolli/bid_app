<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark text-light py-4">
    <div class="container">
        <h1>Register</h1>
    </div>

    @if(session('status'))
        <div class="text-danger">
            {{session('status')}}

        </div>
    @endif

</header>
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{route('register')}}" method="Post">
                    @csrf
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" name="first_name" class="form-control" id="firstName" value="{{old('first_name')}}" placeholder="Enter first name" >
                    </div>
                    @error('first_name')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" id="lastName"  value="{{old('last_name')}}" placeholder="Enter last name" >
                    </div>
                    @error('last_name')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" value="{{old('username')}}" id="username" placeholder="Enter username" >
                    </div>
                    @error('username')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control"  placeholder="Enter password" >
                    </div>

                    @error('password')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation" placeholder="Confirm password" >
                    </div>
                    @error('password_confirmation')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Register</button>

                </form>
                <h3 class="justify-content center mt-5"> Do you have an account ? </h3>
                <a href="{{route('login')}}" class="mt-5 btn btn-primary"> Login here </a>

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
