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
            $thread_user_id = $row['thread_user_id'];

            // Query the users table to find out name of OP
            $sql2 = "SELECT user_email FROM `users` where sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2); 
            $row2 = mysqli_fetch_assoc($result2); 
            $posted_by = $row2['user_email'];
           }
    ?> 

    <?php
    $showALert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){ 
      // Insert into comment db
      $comment = $_POST['comment'];
      $comment = str_replace("<", "&lt;", $comment);
      $comment = str_replace(">", "&gt;", "$comment");
      $sno = $_POST['sno'];
      $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      $showAlert = true;
      if($showAlert){ 
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Your comment has been added!
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
              <h1 class="display-4"> <?php echo $title; ?> </h1>
              <p class="lead"><?php echo $desc; ?></p>
              <hr class="my-4">
              <p>This is peer to peer discussion forum for sharing knowledge with each other. 
                Be respectful and civil to others, do not post offensive or inappropriate content, 
                stay on topic in all discussions, avoid spam or unauthorized advertising, respect 
                everyone’s privacy. </p>
              <p class="lead">
                Posted by: <b> <?php echo $posted_by ?></b>  
              </p>
          </div>
      </div>



    <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
     echo '<div class="container">
       <h1 class="py-2">Post a Comment</h1>
          
          <form action="'. $_SERVER['REQUEST_URI'] . '" method="post">
              <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Type your comment</label>
                  <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                  <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
              </div>
              
              <button type="submit" class="btn btn-success">Post Comment</button>
          </form>
     </div>';
    }
     else{
        echo '
        <div class="container">
        <h1 class="py-2">Post a Comment</h1>
          <p class="lead">You are not logged in. Please login to post Comments</p>
        </div>';
     }
      
     ?>

      <div class="container" id="ques">
        <h1 class="py-2">Discussions</h1>
            <?php 
              $id =  $_GET['threadid'];
              $sql = "SELECT * FROM `comments` WHERE thread_id= ". $id; 
              $result = mysqli_query($conn, $sql);
              $noResult = true;
              while($row = mysqli_fetch_assoc($result)){
                  $noResult = false;
                  $id = $row['comment_id'];
                  $content = $row['comment_content'];
                  $comment_time = $row['comment_time'];
                  $thread_user_id = $row['comment_by'];
                  $sql2 = "SELECT user_email FROM `users` where sno='$thread_user_id'";
                  $result2 = mysqli_query($conn, $sql2); 
                  $row2 = mysqli_fetch_assoc($result2);     
      
      echo '  <div class="d-flex my-3">
            <div class="flex-shrink-0">
              <img src="img/default_user.png" width="34px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3"> 
               <p class="fw-bold my-0"> ' . $row2['user_email'] . ' at '. $comment_time .'</p>
                '. $content .'
              </div>
          </div>';
              
          }
          
          if($noResult){
            echo ' <div class="p-5 mb-4 border" style="background-color:#e9ecef;>
                <div class="container">
                  <p class="display-5">No Comments Found</p>
                  <p class="lead">
                    Be the first person to comment.
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