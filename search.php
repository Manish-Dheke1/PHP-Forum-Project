<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
      #maincontainer{
        min-height: 788px;
      }
    </style>
    
    <title>Welcome to iDiscuss - Coding Forums</title>
  </head>
  <body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    
    

    <!-- Search Results -->
    <div class="container my-2 " id="maincontainer">
        <h1 class="py-2">Search results for <em>" <?php echo $_GET['search'] ?> "</em></h1>
        
        <?php 
        $noresults = true;
        $query = $_GET["search"];
        $sql = "SELECT * FROM threads WHERE match (thread_title, thread_desc) against ('$query')"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $url = "thread.php?threadid=". $thread_id;
            $noresults = false;
              
            // Display the search result
            echo '<div class="result">
                     <h3><a href="' . $url . '" class="text-dark">'. $title .'</a> </h3>
                     <p>' . $desc . '</p>
                  </div>';
            }
            
    if($noresults){
        echo '<div class="container my-4">
                    <div class="p-5 mb-4 border rounded-3" style="background-color:#e9ecef;">
                        <h1 class="py-2">No Results Found</h1>
                        <p class="lead">Suggestions: 
                        <ul>
                            <li>Make sure all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>  
                        </ul>    
                        </p>
                    </div>
              </div>';   
    }
    
    ?>

    </div>

    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
  </body>
</html>