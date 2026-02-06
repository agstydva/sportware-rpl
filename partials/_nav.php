<?php 
// Check if session is already started, if not start it
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check login status
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}

$sql = "SELECT * FROM `sitedetail`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$systemName = $row['systemName'];

echo '<style>
        .navbar-custom {
            background-color: #343a40 !important; /* Dark background */
        }
        .navbar-custom .nav-link {
            color: #ffc107 !important; /* Yellow text */
        }
        .navbar-custom .nav-link:hover {
            color: #fff3cd !important; /* Light yellow on hover */
        }
        .navbar-custom .navbar-brand h4 {
            color: #ffc107 !important; /* Yellow brand text */
        }
        .navbar-custom .nav-item.active .nav-link {
            color: #ffc107 !important; /* Yellow for active item too */
            font-weight: bold; /* Bold for active item */
        }
        /* Profile image styling untuk konsistensi */
        .profile-image {
            object-fit: cover !important;
            border: 2px solid #ffc107;
            transition: all 0.3s ease;
        }
        .profile-image:hover {
            transform: scale(1.05);
            border-color: #fff3cd;
        }
      </style>
      <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
<img src="img/sportware-logo.jpeg" alt="Logo" style="width:40px; height:40px; border-radius:50%; margin-right:10px;">
      <a class="navbar-brand" href="index.php">
      <h4><b>'.$systemName.'</b></h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          
        </ul>
        <form method="get" action="search.php" class="form-inline my-2 my-lg-0 mx-3 search-form">
          <div class="search-wrapper position-relative">
            <input class="form-control mr-sm-2 search-input" type="search" name="search" id="search" placeholder="Search products..." aria-label="Search" required minlength="2" maxlength="50" autocomplete="off">
            <div class="search-suggestions" id="searchSuggestions"></div>
          </div>
          <button class="btn btn-warning my-2 my-sm-0" type="submit">
            <i class="fas fa-search"></i> Search
          </button>
        </form>';

        // Add search styling and JavaScript
        echo '<style>
          .search-wrapper {
            position: relative;
          }
          
          .search-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
            display: none;
          }
          
          .search-suggestion-item {
            padding: 10px 15px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
            transition: background-color 0.2s;
          }
          
          .search-suggestion-item:hover {
            background-color: #f8f9fa;
          }
          
          .search-suggestion-item:last-child {
            border-bottom: none;
          }
          
          .search-input:focus + .search-suggestions {
            display: block;
          }
        </style>
        
        <script>
        document.addEventListener("DOMContentLoaded", function() {
          // Profile image update handler
          if(sessionStorage.getItem("profileImageUpdated")) {
            sessionStorage.removeItem("profileImageUpdated");
            // Force refresh navbar profile image
            var navbarImg = document.querySelector(".navbar img[src*=\"person-\"]");
            if(navbarImg) {
              var currentSrc = navbarImg.src;
              var newSrc = currentSrc.split("?")[0] + "?t=" + new Date().getTime();
              navbarImg.src = newSrc;
            }
          }
          
          // Search functionality
          const searchInput = document.getElementById("search");
          const suggestionsDiv = document.getElementById("searchSuggestions");
          let timeout;
          
          if(searchInput && suggestionsDiv) {
            searchInput.addEventListener("input", function() {
              clearTimeout(timeout);
              const query = this.value.trim();
              
              if(query.length < 2) {
                suggestionsDiv.style.display = "none";
                return;
              }
              
              timeout = setTimeout(function() {
                fetch("autocomplete.php?query=" + encodeURIComponent(query))
                  .then(response => response.json())
                  .then(data => {
                    suggestionsDiv.innerHTML = "";
                    
                    if(data.length > 0) {
                      data.forEach(function(item) {
                        const div = document.createElement("div");
                        div.className = "search-suggestion-item";
                        div.textContent = item;
                        div.addEventListener("click", function() {
                          searchInput.value = item;
                          suggestionsDiv.style.display = "none";
                        });
                        suggestionsDiv.appendChild(div);
                      });
                      suggestionsDiv.style.display = "block";
                    } else {
                      suggestionsDiv.style.display = "none";
                    }
                  })
                  .catch(error => {
                    console.error("Error fetching suggestions:", error);
                    suggestionsDiv.style.display = "none";
                  });
              }, 300);
            });
            
            // Hide suggestions when clicking outside
            document.addEventListener("click", function(e) {
              if(!e.target.closest(".search-wrapper")) {
                suggestionsDiv.style.display = "none";
              }
            });
          }
        });
        </script>';

        $countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
        $countresult = mysqli_query($conn, $countsql);
        $countrow = mysqli_fetch_assoc($countresult);      
        $count = $countrow['SUM(`itemQuantity`)'];
        if(!$count) {
          $count = 0;
        }

        echo '<a href="viewCart.php"><button type="button" class="btn btn-primary mx-2" title="MyCart">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
</svg>
          <i class="bi bi-cart">(<span id="cartCount">' .$count. '</span>)</i>
        </button></a>';

        echo '<a href="wishlist.php"><button type="button" class="btn btn-danger mx-2" title="MyCart">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
</svg>
          <i class="bi bi-cart"> Favorite</i>
        </button></a>';

        echo '<a href="viewOrder.php"><button type="button" class="btn btn-success mx-2" title="MyCart">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
  <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6z"/>
</svg>
          <i class="bi bi-cart"> Your Order</i>
        </button></a>';


        if($loggedin){
          echo '<ul class="navbar-nav mr-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> Welcome ' .$username. '</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="partials/_logout.php">Logout</a>
              </div>
            </li>
          </ul>
          <div class="text-center image-size-small position-relative">
            <a href="viewProfile.php"><img src="img/person-' .$userId. '.jpg?v=' . time() . '" class="rounded-circle profile-image" onError="this.src = \'img/profilePic.jpg\'" style="width:40px; height:40px; object-fit: cover;"></a>
          </div>';
        }
        else {
          echo '
          <button type="button" class="btn btn-warning mx-2"  data-toggle="modal" data-target="#loginModal">Login</button>
          <button type="button" class="btn btn-warning mx-2"  data-toggle="modal" data-target="#signupModal">SignUp</button>';
        }
            
  echo '</div>
    </nav>';

    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You can now login.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> ' .$_GET['error']. '
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You are logged in
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> Invalid Credentials
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
?>

