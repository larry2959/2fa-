<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <style>
    /* General Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #fdf6e3; /* Cream background */
      color: #333; /* Standard text color */
    }

    /* Navbar Styling */
    .navbar {
      background-color: #1a2421; /* Dark Jungle Green */
      padding: 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .navbar-brand {
      color: #fdf6e3; /* Cream text for brand */
      font-size: 1.5rem;
      font-weight: bold;
      text-transform: uppercase;
      text-decoration: none;
    }

    .navbar-brand:hover {
      color: #c8b560; /* Subtle gold hover */
    }

    .nav-links {
      display: flex;
      gap: 1.5rem;
      list-style: none;
    }

    .nav-link {
      color: #fdf6e3; /* Cream text for links */
      font-size: 1rem;
      text-transform: uppercase;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .nav-link:hover {
      color: #c8b560; /* Subtle gold hover */
    }

    .auth-links {
      margin-left: auto; /* Push to the far right */
      display: flex;
      gap: 1rem;
    }

    .nav-item .active {
      font-weight: bold;
      text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .nav-links, .auth-links {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }
    }
  </style>
</head>
<body>
<nav class="navbar">
  <a class="navbar-brand" href="#">SYSTEM MAC O</a>
  <ul class="nav-links">
    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
  </ul>
  <div class="auth-links">
    <a class="nav-link" href="../login.php">Log In</a>
    <a class="nav-link" href="../SignUp.php">Sign Up</a>
  </div>
</nav>
</body>
</html>
