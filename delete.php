<?php include 'includes/config.php'; 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // First get the filename to delete the image file
    $stmt = $pdo->prepare("SELECT filename FROM images WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $filename = $stmt->fetch(PDO::FETCH_ASSOC)['filename'];
    $stmt->closeCursor();
    
   

    // Delete from the database
    $stmt = $pdo->prepare("DELETE FROM images WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);


    
    if ($stmt->execute()) {
        // Optionally delete the image file from the server
        $filePath = 'uploads/' . $filename;
        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file
        }
        echo "Image deleted successfully.";
        header("Location: index.php"); // Redirect to index page after deletion
        exit; // Ensure no further code is executed after redirection
    } else {
        echo "Error deleting image.";
    }

    // Removed unnecessary $stmt->close();
} else {
    echo "No ID specified.";
}

// Removed $conn->close(); as PDO does not require explicit connection closure.
?>

