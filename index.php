<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Post Listing</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2>Post Listing</h2>
<form method="GET" action="index.php" class="mb-3">
  <input type="text" name="search" placeholder="Search posts..." class="form-control" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
</form>

<?php
$results_per_page = 3;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = $search ? "WHERE title LIKE '%$search%' OR content LIKE '%$search%'" : "";

$sql = "SELECT COUNT(*) AS total FROM posts $where";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row['total'] / $results_per_page);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $results_per_page;

$sql = "SELECT * FROM posts $where LIMIT $start, $results_per_page";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='card mb-3 p-3'>
                <h4>{$row['title']}</h4>
                <p>{$row['content']}</p>
              </div>";
    }
} else {
    echo "<p>No posts found.</p>";
}

echo '<nav><ul class="pagination">';
for ($i = 1; $i <= $total_pages; $i++) {
    $active = $i == $page ? 'active' : '';
    echo "<li class='page-item $active'><a class='page-link' href='?page=$i&search=$search'>$i</a></li>";
}
echo '</ul></nav>';
?>

</body>
</html>