<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
      #ques{
        min-height: 633px;
      }
    </style>
    
    <title>Welcome to iDiscuss - Coding Forums</title>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
    $id =  $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id = ". $id; 
           $result = mysqli_query($conn, $sql);
           while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
           }
    ?>

    <div class="flex-grow-1">
      <!-- Category container starts here  -->
      <div class="container my-4">
          <!-- Jumbotron -->
          <div class="p-5 mb-4 border rounded-3" style="background-color:#e9ecef;">
              <h1 class="display-4"> <?php echo $title; ?> </h1>
              <p class="lead"><?php echo $desc; ?></p>
              <hr class="my-4">
              <p>This is peer to peer discussion forum for sharing knowledge with each other. 
                Be respectful and civil to others, do not post offensive or inappropriate content, 
                stay on topic in all discussions, avoid spam or unauthorized advertising, respect 
                everyone’s privacy. </p>
              <p class="lead">
                <b>Posted by: Manish</b>  
              </p>
          </div>
      </div>

      <div class="container" id="ques">
        <h1 class="py-2">Discussions</h1>
            
          
      </div>

    </div>  <!-- End of flex-grow-1 -->
      
    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
  </body>
</html>