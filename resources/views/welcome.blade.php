@extends('layout.main')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Todo List App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2d2642681e.js" crossorigin="anonymous"></script>

</head>

<body class="bg-light d-flex align-items-center min-vh-100" style="background-image: url('/assets/17973908.jpg'); background-size:cover; background-repeat:no-repeat;">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="text-primary">Login to Todo List App</h2>
            <p>Please sign in with your Google account.</p>
        </div>
        <div class="d-grid text-center">
            <a href="" class="btn btn-success btn-lg"><i class="fa-brands fa-google fa-beat"></i> Sign in with Google</a>
        </div>
    </div>
</body>

</html>
@endsection