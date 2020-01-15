<?php
require 'config/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Confirmation | DVD Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>	


	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Confirmation</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<div class="row mt-4">
			<div class="col-12">

<?php

if ( !isset($_POST['email']) || empty($_POST['email'])
	|| !isset($_POST['username']) || empty($_POST['username'])
	|| !isset($_POST['password']) || empty($_POST['password'])
) :

// Error. Required Input Empty.
?>

<div class="text-danger">Please fill out all required fields.</div>
                
<div class="row mt-4 mb-4">
    <div class="col-12">
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-primary">Back to register Form</a>
    </div> <!-- .col -->
</div> <!-- .row -->


<?php


else :

			// All required fields present.
			

			$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if ($conn->connect_errno) :
				// DB Error
				echo $conn->connect_error;
			else :
				// Connection Succuess

				$sql_username= "SELECT * FROM user WHERE name = '" . $conn->real_escape_string($_POST['username']) . "';";
			//	$results = $conn->query($sql_username);
                
                $result = mysqli_query($conn, $sql_username);
           //     $password = hash('sha256', $_POST['password']);
               
				if(mysqli_num_rows($result) == 0){
               
                    
                $sql = "INSERT INTO user (name, password, email)
                            VALUES ('"
                . $conn->real_escape_string($_POST['username'])
                . "', '" 
                . $conn->real_escape_string($_POST['password'])
                . "', '"
                . $conn->real_escape_string($_POST['email'])
                . "');";

                
                $results = $conn->query($sql);
				if (!$results) :
					// SQL Error
					echo $conn->error;
				else :
                   
                    ?>   
					<div class="text-success"><span class="font-italic"></span>successfully registered.</div>
                    <div class="row mt-4 mb-4">
                        <div class="col-12">
                            <a href="index.php" role="button" class="btn btn-primary">Back to Home </a>
                        </div> <!-- .col -->
                    </div> <!-- .row -->
             
                <?php
                    endif;
				}
				else{
                    ?>
					<div class="text-danger">Username already exist. Try other username.</div>
                
                    <div class="row mt-4 mb-4">
                        <div class="col-12">
                            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-primary">Back to register Form</a>
                        </div> <!-- .col -->
                    </div> <!-- .row -->
            
                <?php
				}
               
	
	?>

				



	 <?php
				
				$conn->close();
			endif; /* DB Connection Connection Error */
    endif;
    ?>


	

			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->

</body>
</html>