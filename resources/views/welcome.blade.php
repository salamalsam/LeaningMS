<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammad Salam">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin - Learning MS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{url('/')}}/assets/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin">
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Sign In</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
        </form>
    </main>
  </body>
</html>
