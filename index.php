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

    <!-- Slider starts here -->
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://www.sourcesplash.com/i/random?q=apple,code" style="height: 600px; width: 400px;" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://www.sourcesplash.com/i/random?q=programmers,google" style="height: 600px; width: 400px;" class="d-block w-100" alt="Random">
            </div>
            <div class="carousel-item">
            <img src="https://www.sourcesplash.com/i/random?q=coding,java" style="height: 600px; width: 400px;" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

      <!-- Category container starts here  -->
      <div class="container my-3">
         <h2 class="text-center my-3">iDiscuss - Browse Categories</h2>
         <div class="row">
           <!-- Fetch all categories -->
           <?php 
           $sql = "SELECT * FROM `categories`"; 
           $result = mysqli_query($conn, $sql);
           while($row = mysqli_fetch_assoc($result)){
            echo $row['category_id'];
           }
           ?>

           <!-- Use a for loop to iterate through categories -->
            <div class="col-md-4 my-2">
                <div class="card " style="width: 18rem;">
                    <img src="https://www.sourcesplash.com/i/random?q=coding,java" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="#" class="btn btn-primary">View Threads</a>
                    </div>
                </div>
            </div>
            
          
            
            
        
            


         </div>
      </div>
      

    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
  </body>
</html>