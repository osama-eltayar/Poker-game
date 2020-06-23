<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body class="">
      <div class="text-center">
        <h1>Poker Game</h1>
      </div>
      <div class="container text-center">
        @yield('content')
      </div>
</body>

</html>
