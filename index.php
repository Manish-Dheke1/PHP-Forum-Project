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
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/slider-1.jpg" style="height: 600px; width: 400px;" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="img/slider-2.jpg" style="height: 600px; width: 400px;" class="d-block w-100" alt="Random">
            </div>
            <div class="carousel-item">
            <img src="img/slider-4.jpg" style="height: 600px; width: 400px;" class="d-block w-100" alt="...">
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
            $id = $row['category_id'];
            $cat = $row['category_name'];
            $desc = $row['category_description'];

            echo '<div class="col-md-4 my-2">
                <div class="card " style="width: 18rem;">
                    <img src="img/card-'. $id .'.jpg" class="card-img-top" alt="image for this category">
                    <div class="card-body">
                        <h5 class="card-title"> <a href="threadlist.php?catid='. $id .'">'.$cat.'</a> </h5>
                        <p class="card-text">'. substr($desc, 0, 200) .'</p>
                        <a href="threadlist.php?catid='. $id .'" class="btn btn-primary">View Threads</a>
                    </div>
                </div>
            </div>';
           }
           ?>

           <!-- Use a for loop to iterate through categories -->
            
            


         </div>
      </div>
      

    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
  </body>
</html>