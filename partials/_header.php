<?php 
session_start();

echo '  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">iDiscuss</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/forum">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Top Categories
                    </a>
                    <div class="dropdown-menu">';
                    $sql = "SELECT category_name, category_id FROM `categories` LIMIT 3";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){    
                       echo ' <a class="dropdown-item" href="threadlist.php?catid=' . $row['category_id'] . '">' . $row['category_name'] . '</a>';
                    }
                    echo '</div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>';
     
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<form class="d-flex align-items-center" role="search"> 
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/> 
        <button class="btn btn-success me-3" type="submit">Search</button> 
        <span class="text-white ms-2 text-nowrap me-2">Welcome '. $_SESSION['useremail'] .'</span> 
        <a href="partials/_logout.php" class="btn btn-outline-success">Logout</a>
    </form>';
    

}               
else{
    echo '<form class="d-flex align-items-center" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-success" type="submit">Search</button>
                    
                </form>
                <div class="mx-2"> 
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
                </div>';
}
               
    echo ' </div>
        </div>   
    </nav>';
 
include 'partials/_loginModal.php'; 
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> You can now login
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>