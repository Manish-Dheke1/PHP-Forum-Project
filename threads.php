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


      <!-- Category container starts here  -->
      <div class="container my-3">
          <!-- Jumbotron -->
          <div class="p-5 mb-4 border rounded-3" style="background-color:#e9ecef;">
              <h1 class="display-4">Welcome to Python forums</h1>
              <p class="lead">Python is powerful programming language</p>
              <hr class="my-4">
              <p>This is peer to peer discussion forum for sharing knowledge with each other</p>
              <p class="lead">
                  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
              </p>
          </div>
      </div>

      <div class="container">
        <h1>Browse Questions</h1>

        <div class="d-flex">
            <div class="flex-shrink-0">
              <img src="..." alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
              This is some content from a media component. You can replace 
              this with any content and adjust it as needed.
            </div>
          </div>
          
      </div>
      
    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
  </body>
</html>