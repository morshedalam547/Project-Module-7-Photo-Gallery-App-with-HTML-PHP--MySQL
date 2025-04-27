
<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="row">
<?php
$stmt = $pdo->query("SELECT * FROM images ORDER BY upload_date DESC");
if ($stmt->rowCount() > 0) {
    foreach ($stmt as $row) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="assets/images/' . htmlspecialchars($row['filename']) . '" class="card-img-top">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
        echo '<p class="card-text">' . date("F j, Y, g:i a", strtotime($row['upload_date'])) . '</p>';    
       
        echo '<a href="delete.php?id=' . urlencode($row['id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this image?\')">Delete</a>';
        
        echo '</div></div></div>';
    }
} else {
    echo '<div class="col-md-12">';
    echo '<div class="alert alert-info">No images found.</div>';
    echo '</div>';
}






?>

</div>

<?php include 'includes/footer.php'; ?>





