<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
  <style>
    .is-completed{
      text-decoration: line-through;
    }
  </style>
  <title>
    @yield('title', 'Alvin\'s page')
  </title>
</head>
<body>
    <ul>
      <li>
        <a href="/home">Home</a>
      </li>
      <li>
        <a href="/about">About Us</a>
      </li>
      <li>
        <a href="/projects">Projects</a>
      </li>
      <li>
        <a href="/contact">Contact Us</a>
      </li>
    </ul>
    <hr>

    @yield('content')
</body>
</html>