<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Welcome to iDiscuss - Coding Forums</title>
  </head>
  <body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
    $id =  $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id = ". $id; 
           $result = mysqli_query($conn, $sql);
           while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
           }
    ?>

      <!-- Category container starts here  -->
      <div class="container my-4">
          <!-- Jumbotron -->
          <div class="p-5 mb-4 border rounded-3" style="background-color:#e9ecef;">
              <h1 class="display-4">Welcome to <?php echo $catname; ?> forums</h1>
              <p class="lead"><?php echo $catdesc; ?></p>
              <hr class="my-4">
              <p>This is peer to peer discussion forum for sharing knowledge with each other. 
                Be respectful and civil to others, do not post offensive or inappropriate content, 
                stay on topic in all discussions, avoid spam or unauthorized advertising, respect 
                everyone’s privacy. </p>
              <p class="lead">
                  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
              </p>
          </div>
      </div>

      <div class="container">
        <h1 class="py-2">Browse Questions</h1>

        <div class="d-flex my-3">
            <div class="flex-shrink-0">
              <img src="img/default_user.png" width="34px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
              <h5>Unable to install Pyaudio error in Windows</h5>
              This is some content from a media component. You can replace 
              this with any content and adjust it as needed.
            </div>
          </div>
          
      </div>
      
    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
  </body>
</html>