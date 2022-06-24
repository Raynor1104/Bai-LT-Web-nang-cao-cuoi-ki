<?php
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

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
?>

<!-- HTML -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Movie Database</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.min.css">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="" class="navbar-brand">Movie Database</a>
                <a href="index.php" class="btn btn-outline-warning">Sign out</a>
            </div>
        </nav>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Director</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Studio</th>
                    <th scope="col">Revenue</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <th scope="row"> <?php echo $row['id']?> </th>
                    <td> <?php echo "<a href = movie_detail.php?id={$row['id']}>{$row['title']}</a>"?> </td>
                    <td> <?php echo $row['director']?> </td>
                    <td> <?php echo $row['date']?> </td>
                    <td> <?php echo $row['studio']?> </td>
                    <td> <?php echo $row['revenue']?> </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="bg-success text-white rounded px-5 py-2">
            <h2 class="text-center">Add new movie form:</h2>
            <form action="movie_add.php" method="post">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id">
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="director">Director:</label>
                    <input type="text" class="form-control" name="director">
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="text" class="form-control" name="date">
                </div>
                <div class="form-group">
                    <label for="studio">Studio:</label>
                    <input type="text" class="form-control" name="studio">
                </div>
                <div class="form-group">
                    <label for="revenue">Revenue:</label>
                    <input type="text" class="form-control" name="revenue">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-outline-info btn-lg"><i class="fa-solid fa-plus"></i> Add</button>
                </div>
            </form>
            <footer class="mt-4 text-white text-center">
                <p>&copy; Copyright by <a href="" class="text-white">Raynor</a>.</p>
            </footer>
        </div>
        
    </body>
</html>
<!-- End of HTML -->
<?php
$conn->close();
?>