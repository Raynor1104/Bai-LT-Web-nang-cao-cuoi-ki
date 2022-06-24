<?php
$serverName = "localhost";
$userName = "root";
$password = "12345";
$dbName = "movies_db";

// Create connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

$id = $_POST["id"];
$title = $_POST["title"];
$director = $_POST["director"];
$date = $_POST["date"];
$studio = $_POST["studio"];
$revenue = $_POST["revenue"];

// Check connection
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO movies (id, title, director, date, studio, revenue)
VALUE ('{$id}', '{$title}', '{$director}', '{$date}', '{$studio}', '{$revenue}')";

if ($conn->query($sql) === TRUE) {
    $success = "Movie added.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Movie - add</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.min.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">Movie Database</h3>
            </div>
        </header>

        <main class="px-3">
            <h1><?php echo $success?></h1>
            <p class="lead">
                <a href="moviesDB.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Home page</a>
            </p>
        </main>

        <footer class="mt-auto text-white-50">
            <p><i class="fa-regular fa-copyright"></i> Copyright by <a href="" class="text-white">Raynor</a>.</p>
        </footer>
    </div>
  </body>
</html>
