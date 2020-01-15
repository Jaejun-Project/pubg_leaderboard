<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <style>
  
.carousel-item.active,
.carousel-item-next,
.carousel-item-prev {
  display: block;
}

	 #searchForm {
			position:fixed;
		  top:55%;


		}
  input[type="text"]:disabled {
      background: #dddddd;
  }

@media (orientation: portrait) { 
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
        width:100%;
        height:auto;
    }
}

@media (orientation: landscape) { 
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
        width:100%;
        height:96vh;
    }
}

</style>
</head>
<body>
	<?php include 'nav.php'; ?>

<div id="pubg" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#pubg" data-slide-to="0" class="active"></li>
    <li data-target="#pubg" data-slide-to="1"></li>
    <li data-target="#pubg" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/back1.jpg" alt="PUBG1">
    </div>
    <div class="carousel-item">
      <img src="image/back2.jpg"  alt="PUBG3">
    </div>
    <div class="carousel-item">
      <img src="image/back3.jpg"  alt="PUBG3">
    </div>
  </div>
    
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#pubg" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#pubg" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<div class="container">

 
 <form class="col-sm-10  justify-content-center" id="searchForm" action="stat.php" method="GET">
    <div class="input-group">
    
      <?php if ( !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false ): ?>

      <input type="text" class="form-control" name="pubgname" disabled placeholder="Must login to view your stats." required=""><span class="input-group-btn">
          
      <?php else: ?>
        <input type="text" class="form-control" name="pubgname" placeholder="Enter PUBG usernmae to search for stats." required=""><span class="input-group-btn">
      <?php endif; ?>
        <button type="submit" class="btn btn-default">
          <span class="glyphicon glyphicon-search"></span> Search
        </button>
    </div>
  </form>
</div>

</body>
</html>




