<?php
//echo "detail";
$uri = $_SERVER['REQUEST_URI'];
//echo $uri . "<br>";
$query_string = $_SERVER['QUERY_STRING'];
//echo $query_string . "<br>";
parse_str($query_string, $params);
//echo $params['id'] . "<br>";

$serverName = "localhost";
$userName = "root";
$password = "12345";
$dbName = "movies_db";

// Create connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

// Check connection
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$query = "SELECT * FROM movies WHERE id = {$params['id']}";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Movie Detail</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.min.css">
    </head>
    <body class="bg-dark text-white">
        <div class="container">
            <div class="border border-dark rounded px-5 py-2 mt-3">
                <h2 class="text-center">Details</h2>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <form action="movie_update.php" method="post">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $row['id']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $row['title']?>">
                        </div>
                        <div class="form-group">
                            <label for="director">Director:</label>
                            <input type="text" class="form-control" name="director" value="<?php echo $row['director']?>">
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="text" class="form-control" name="date" value="<?php echo $row['date']?>">
                        </div>
                        <div class="form-group">
                            <label for="studio">Studio:</label>
                            <input type="text" class="form-control" name="studio" value="<?php echo $row['studio']?>">
                        </div>
                        <div class="form-group">
                            <label for="revenue">Revenue:</label>
                            <input type="text" class="form-control" name="revenue" value="<?php echo $row['revenue']?>">
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-outline-success">Update</button>
                            <a href="moviesDB.php" class="btn btn-outline-primary">Homepage</a>
                        </div>
                    </form>
                    <form action="movie_delete.php" method="post">
                            <div class="text-center mt-3">
                                <div class="row">
                                    <div class="col-2">
                                    <input type="text" class="form-control" name="id" value="<?php echo $row['id']?>" readonly>
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i>Delete</button>
                                    </div>
                                </div>
                            </div>
                        </form>   
                    <?php
                    }
                    ?>
            </div>
            <footer class="mt-4 text-white-50 text-center">
                <p><i class="fa-regular fa-copyright"></i> Copyright by <a href="" class="text-white">Raynor</a>.</p>
            </footer>
        </div>
    </body>
</html>