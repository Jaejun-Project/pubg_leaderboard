<?php
session_start();
require 'config/config.php';

$page_url = $_SERVER['REQUEST_URI'];
// echo $page_url;

// Remove '&page=...' from the URL.
$page_url = preg_replace('/&page=\d+/', '', $page_url);
// echo "<br>";
// echo $page_url;

?>
<!DOCTYPE html>
<html>
<head>
<!-- 	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script> -->
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Results</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <style>
  th {
    text-align: center;
}	
  </style>
  </head>
<body>
	<?php include 'nav.php'; ?>

	<div class="container-fluid">
		<div class="row">
			<h1 class="col-12 mt-4">Leaderboards</h1>
		</div> <!-- .row -->
	</div> 
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">

	<?php
   
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if( $mysqli->connect_errno) :
		echo $mysqli->connect_error;
	else:

        $mysqli->set_charset('utf8');
         
        $sql_num_rows ="SELECT count(*) as count FROM leaderboard;";

        $results_num_rows = $mysqli->query($sql_num_rows);

		/* Check for results error here. */

		$row_num_rows = $results_num_rows->fetch_assoc();

		$num_results = $row_num_rows['count'];

		$results_per_page = 5;

		$last_page = ceil($num_results / $results_per_page);

		if ( isset($_GET['page']) && !empty($_GET['page']) ) {
			$current_page = $_GET['page'];
		} else {
			$current_page = 1;
		}

		if ($current_page < 1) {
			$current_page = 1;
		} elseif ($current_page > $last_page) {
			$current_page = $last_page;
		}

		$start_index = ($current_page - 1) * $results_per_page;


		$sql = "SELECT idleaderboard, name, rating, games, mode_.modeName as mode, region.regionName as region, kdrating
		 FROM leaderboard
				JOIN mode_
					ON leaderboard.idmode = mode_.idmode
				JOIN region
					ON leaderboard.idregion = region.idregion
				ORDER BY leaderboard.rating DESC"
		;
		$sql .= " LIMIT " . $start_index . ", " . $results_per_page;

		$sql .= ";";


		$results = $mysqli->query($sql);

		if (!$results) :
			// SQL Error.
			echo $mysqli->error;
		else :
			// Results Received.

	?>

			<div class="col-12">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item <?php echo ($current_page==1) ? 'disabled' : ''; ?>">
							<a class="page-link" href="<?php echo $page_url . '?page=1'; ?>">First</a>
						</li>
						<li class="page-item <?php echo ($current_page==1) ? 'disabled' : ''; ?>">
							<a class="page-link" href="<?php echo $page_url . '?page=' . ($current_page-1); ?>">Previous</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href=""><?php echo $current_page; ?></a>
						</li>
						<li class="page-item <?php echo ($current_page==$last_page) ? 'disabled' : ''; ?>">
							<a class="page-link" href="<?php echo $page_url . '?page=' . ($current_page+1); ?>">Next</a>
						</li>
						<li class="page-item <?php echo ($current_page==$last_page) ? 'disabled' : ''; ?>">
							<a class="page-link" href="<?php echo $page_url . '?page=' . $last_page; ?>">Last</a>
						</li>
					</ul>
				</nav>
			</div> <!-- .col -->



			 	<table class="table table-hover table-responsive mt-4">
			 	<thead>
			 		<tr>
			 			<th></th>
			 			<th>Rank</th>
			 			<th>Username</th>
			 			<th>Region</th>
			 			<th>Mode</th>
			 			<th>Rating</th>
			 			<th>K/D Rating</th>
			 			<th>Games</th>
			 		</tr>
			 		</thead>
			 		<tbody>

			 	<?php
			 		$rank =1;
			 		while($row = $results->fetch_assoc()):
	 			?>
			 		<tr>
			 		<td>
					<!-- details.php?var1=val1&var2=val2 -->
				
					</td>
			 			<td ><?php echo $rank?> </td>
			 			<td ><?php echo $row['name']; ?></td>
			 			<td ><?php echo $row['region']; ?></td>
			 			<td ><?php echo $row['mode']; ?></td>
			 			<td ><?php echo $row['rating']; ?></td>
			 			<td ><?php echo $row['kdrating']; ?></td>
			 			<td ><?php echo $row['games']; ?></td>
			 		</tr>
	 		<?php
	 			$rank++;
	 			endwhile;
 			?>
 				</tbody>
 			</table>

 			<div class="col-12">
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
							<li class="page-item <?php echo ($current_page==1) ? 'disabled' : ''; ?>">
								<a class="page-link" href="<?php echo $page_url . '?page=1'; ?>">First</a>
							</li>
							<li class="page-item <?php echo ($current_page==1) ? 'disabled' : ''; ?>">
								<a class="page-link" href="<?php echo $page_url . '?page=' . ($current_page-1); ?>">Previous</a>
							</li>
							<li class="page-item active">
								<a class="page-link" href=""><?php echo $current_page; ?></a>
							</li>
							<li class="page-item <?php echo ($current_page==$last_page) ? 'disabled' : ''; ?>">
								<a class="page-link" href="<?php echo $page_url . '?page=' . ($current_page+1); ?>">Next</a>
							</li>
							<li class="page-item <?php echo ($current_page==$last_page) ? 'disabled' : ''; ?>">
								<a class="page-link" href="<?php echo $page_url . '?page=' . $last_page; ?>">Last</a>
							</li>
						</ul>
					</nav>
				</div> <!-- .col -->



		<?php
			endif; /* ELSE Results Received */
		$mysqli->close();
	endif; /* ELSE Connection Success */
	?>
			</div> <!--end col-->
		</div> <!--end row-->

	</div><!-- end container-->




</body> 