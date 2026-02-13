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
    $id =  $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id = ". $id; 
           $result = mysqli_query($conn, $sql);
           while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
           }
    ?>

    <?php
    $showALert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){ 
      // Insert into thread db
      $th_title = $_POST['title'];
      $th_desc = $_POST['desc'];

      $th_title = str_replace("<", "&lt;", $th_title);
      $th_title = str_replace(">", "&gt;", "$th_title");

      $th_desc = str_replace("<", "&lt;", $th_desc);
      $th_desc = str_replace(">", "&gt;", "$th_desc"); 

      $sno = $_POST['sno'];
      $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      $showAlert = true;
      if($showAlert){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Your thread has been added! Please wait for community to respond
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
      }
    }
    ?>

    <div class="flex-grow-1">
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
                  <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
              </p>
          </div>
      </div>

    <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
     echo '<div class="container">
       <h1 class="py-2">Start a Discussion</h1>
          
          <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</div>
              </div>
              <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
              <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Elaborate Your Concern</label>
                  <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
              </div>
              
              <button type="submit" class="btn btn-success">Submit</button>
          </form>
     </div>';
    }
     else{
        echo '
        <div class="container">
        <h1 class="py-2">Start a Discussion</h1>
          <p class="lead">You are not logged in. Please login to start a discussion</p>
        </div>';
     }
      
     ?>

    
      <div class="container" id="ques">
        <h1 class="py-2">Browse Questions</h1>
            <?php
              $id =  $_GET['catid'];
              $sql = "SELECT * FROM `threads` WHERE thread_cat_id= ". $id; 
              $result = mysqli_query($conn, $sql);
              $noResult = true;
              while($row = mysqli_fetch_assoc($result)){
                  $noResult = false;
                  $id = $row['thread_id'];
                  $title = $row['thread_title'];
                  $desc = $row['thread_desc'];
                  $thread_time = $row['timestamp'];
                  $thread_user_id = $row['thread_user_id'];
                  $sql2 = "SELECT user_email FROM `users` where sno='$thread_user_id'";
                  $result2 = mysqli_query($conn, $sql2); 
                  $row2 = mysqli_fetch_assoc($result2);
                  

                  
      
        echo '  <div class="d-flex my-3">
              <div class="flex-shrink-0">
                <img src="img/default_user.png" width="34px" alt="...">
              </div>
              <div class="flex-grow-1 ms-3">'. 
                
                '<h5> <a class="text-dark" href="thread.php?threadid='. $id .'"> '. $title .' </a> </h5>
                  '. $desc .' 
                </div> '. ' <p class="fw-bold my-0"> Asked by: ' . $row2['user_email'] . ' at '. $thread_time .'</p> '.
            '</div>';
                
            }
          
          if($noResult){
            echo ' <div class="p-5 mb-4 border" style="background-color:#e9ecef;">
                <div class="container">
                  <p class="display-5">No Threads Found</p>
                  <p class="lead">
                    No Threads Found. Be the first person to ask a question. 
                  </p>
                </div>
              </div> ';
             }
               
            ?> 
          
          

      </div>

    </div>  <!-- End of flex-grow-1 -->
      
    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
  </body>
</html>