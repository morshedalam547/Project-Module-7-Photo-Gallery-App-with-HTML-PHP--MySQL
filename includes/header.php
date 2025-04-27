 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  </head>
<body  class="bg-light" >
<div class="container bg-dark text-light p-3 rounded my-4">
    <div class= "d-flex align-items-center justify-content-between px-3">
    <h2>
        <a href="index.php" class ="text-white text-decoration-none btn btn-success">Photo Gallery</a>
    </h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#addproduct">
    <i class="bi bi-plus-lg"></i>Upload Image</button> </div>
    
   </div>

<div class="container mt-3">

<!-- Alert Start -->
<?php

   if(isset($_GET['alert']))
   {
    if($_GET['alert']=='img_upload')
    {
      echo<<<alert
    <div class=" container alert alert-danger alert-dismissible text-center" role="alert">
       <strong>'File size is too large. Max size is 5MB'</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
      }
      if($_GET['alert']=='error')
      {
        echo<<<alert
      <div class=" container alert alert-danger alert-dismissible text-center" role="alert">
         <strong>Error uploading image</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      alert;
        }
      
   }
   else if(isset($_GET['success'])){
    
    if($_GET['success']=='added')
    {
      echo<<<alert
    <div class=" container alert alert-success alert-dismissible text-center" role="alert">
       <strong>Image Uploaded Successfully</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
    }
   }
    ?>
    <!-- Alert End -->
    
    
<!--Create Upload Image start---->

<div class="modal fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
 
   <form action="upload.php" method="POST" enctype="multipart/form-data">
   <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Image</h5>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">

    <span class="input-group-text">name</span>
    <input type="text" class="form-control" name="title" required>
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text">description</span>
        <textarea class="form-control" name="description" required></textarea>
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text">image</label>
        <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg" required>
    </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" name="addproduct">Upload</button>
      </div>
    </div>

   </form>
 
  </div>
</div>

<!--Create Upload Image End---->