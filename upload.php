<?php include 'includes/config.php'; 
      include 'includes/header.php';
  
  ?>

<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ;
    $description = $_POST['description'];
    $image = $_FILES['image'];
}
    
        $targetDir = "assets/images/";
   
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // create dir if not exists
        }

        $filename = basename($image["name"]);
        
        $targetFile = $targetDir . $filename;

        if ($image['size'] > 5000000) {
            header("location:index.php?alert=img_upload");
                } else {

        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            $stmt = $pdo->prepare("INSERT INTO images (title, description, filename) VALUES (?, ?, ?)");
            $stmt->execute([$title, $description, $filename]);
            header("location:index.php?success=added");
            exit;
        } else {
    }     header("location:index.php?alert=error");
    }

?>


<?php include 'includes/footer.php'; ?>
