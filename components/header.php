<?php
  session_start();
  include("config.php");
  if(isset($_SESSION['user_id'])) {
    $sql = "SELECT * FROM users WHERE uid={$_SESSION['user_id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  }
  $title = basename($_SERVER['PHP_SELF']);
  $homeActive = $aboutActive = $becomeDonorActive = $searchDonorActive = $loginActive = " ";
  switch($title) {
    case "index.php" :
      $_title = "Home";
      $homeActive = "active";
      break;
    case "about.php" :
      $_title = "About";
      $aboutActive = "active";
      break;
    case "becomeDonor.php" : 
      $_title = "Become A Donor";
      $becomeDonorActive = 'active';
      break;
    case "searchDonor.php" :
      $_title = "Search A Donor";
      $searchDonorActive = "active";
      break;
    case "login.php" :
      $_title = "Login";
      $loginActive = "active";
      break;
    case "profile.php":
      $_title = "{$_SESSION['fullName']}'s Profile";
      break;
    case "update-user.php":
      $_title = "{$_SESSION['fullName']}'s Profile Update";
      break;
    default:
      $_title = "Blood Bank";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_title; ?></title>
    <link rel="shortcut icon" href="images\blood-ga7768b22f_1280.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- navbar-light bg-light -->
<nav class="navbar px-5 navbar-expand-lg navbar-light bg-dark text-white" style="color: white">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="/bloodBank/index.php"><img src="images\blood-ga7768b22f_1280.png" alt=""><span>450</span><i>ml</i></a>
    <button style="background: white; font-size: .6rem;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span style="color: white; font-size: .6rem;" class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link <?php if($title === "index.php") {echo "active";} ?> text-white" aria-current="page" href="/bloodBank/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($title === "about.php") {echo "active";} ?> text-white" aria-current="page" href="/bloodBank/about.php">About Us</a>
        </li>
        <?php
          if(!isset($_SESSION['user_id'])) {
            echo "<li class='nav-item'>
          <a class='nav-link {$becomeDonorActive} text-white' aria-current='page' href='/bloodBank/becomeDonor.php'>Become A Donor</a>
        </li>";
          }
        ?>
        <li class="nav-item">
          <a class="nav-link <?php if($title === "searchDonor.php") {echo "active";} ?> text-white" aria-current="page" href="/bloodBank/searchDonor.php">Search Donor</a>
        </li>
        <?php
          if(!isset($_SESSION['user_id'])) {
            echo "<li class='nav-item'>
          <a class='nav-link {$loginActive} text-white' aria-current='page' href='/bloodBank/login.php'>Login</a>
        </li>";
          }
        ?>
        <?php
          if(isset($_SESSION['user_id'])) {
            if($row['image']) {
              $img = $row['image'];
            } else {
              $img = "images\profileimages.png";
            }
            echo "<li class='nav-item dropdown'>
            <a class='nav-link text-white dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'> <img src='{$img}' /> </a>
            <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
              <li><a class='dropdown-item' href='/bloodBank/profile.php'>Profile</a></li>
              <li><a class='dropdown-item' href='/bloodBank/logout.php'>Logout</a></li>
            </ul>
          </li>";
          }
        ?>
          <?php
            if( isset($_SESSION['role']) && $_SESSION['role'] == 1) {
              echo "<li class='nav-item dropdown'>
              <a class='nav-link text-white dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Admin Panel
              </a>
              <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
              <li><a class='dropdown-item' href='admin-add-user.php'>Add Admin</a></li>
              <li><a class='dropdown-item' href='users.php'>Users</a></li>
            </ul>
            </li>";
            }
          ?>
      </ul>
    </div>
  </div>
</nav>
