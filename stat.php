<?php
session_start();
include('statFunc.php');
require 'config/config.php';

$name = $_GET['pubgname'];

define('API_KEY', '41f2f139-3f92-4f92-8d44-12f36e215fa5
');
define('END_PONT', 'https://api.pubgtracker.com/v2/profile/pc/'. $_GET['pubgname']);

//set playtype
$arrayPlayType= array(
  "Solo", "Duo", "Squad", "Solo-fpp", "Duo-fpp", "Squad-fpp"
  )  ;
$header = ['TRN-Api-Key:' . API_KEY];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, END_PONT);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));

$token_response = curl_exec($ch);
$pubg = json_decode($token_response, true);


$solo_stats = NULL;
$duo_stats = NULL;
$squad_stats = NULL;
$solofpp_stats = NULL;
$duofpp_stats =NULL;
$squadfpp_stats = NULL;

if(array_key_exists('error', (array)$pubg) || $pubg == NULL){
  $check =false;
?>

<div class="text-danger">Wrong username</div>
                
<div class="row mt-4 mb-4">
    <div class="col-12">
        <a href="index.php" role="button" class="btn btn-primary">Back to register Form</a>
    </div> <!-- .col -->
</div> <!-- .row -->



<?php  

}
/// check if exist
//if(array_key_exists('error', $pubg))
else
{
  $check =true;
  if(isset($pubg['stats']))
  {
    $Stat=$pubg['stats'];
   // print_r($player);
    foreach ($Stat as $stat){
      if($stat['region'] =="na" && $stat['mode']== "solo")
      {
        $solo_stats = new statFunc($stat);
        
      }
       if($stat['region'] =="na" && $stat['mode']== "duo")
      {
        $duo_stats = new statFunc($stat);
        
      }
      if($stat['region'] =="na" && $stat['mode']== "squad")
      {
        $squad_stats = new statFunc($stat);
        
      }
      if($stat['region'] =="na" && $stat['mode']== "solo-fpp")
      {
        $solofpp_stats = new statFunc($stat);
        
      }
      if($stat['region'] =="na" && $stat['mode']== "duo-fpp")
      {
        $duofpp_stats = new statFunc($stat);
        
      }
      if($stat['region'] =="na" && $stat['mode']== "squad-fpp")
      {
        $squadfpp_stats = new statFunc($stat);
        
      }

   }
  }
}
$arrayStat = array(
  $solo_stats,
  $duo_stats,
  $squad_stats,
  $solofpp_stats,
  $duofpp_stats,
  $squadfpp_stats
  );



$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      if ($conn->connect_errno) :
        // DB Error
        echo $conn->connect_error;
      else :
        // Connection Succuess
       
        $sql_name = "SELECT count(*) as count FROM leaderboard WHERE name = '" . $_GET['pubgname'] . "';";
    
        $result_name_rows = $conn->query($sql_name);

        $rows_name = $result_name_rows->fetch_assoc();
        $num_results = $rows_name['count'];
      
        if( $num_results== 0){
          
          /* if ( !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false ){
              echo "not loggiend from stat";
              $userID=null;
           }
           else
           {
            $sql_nuserID = "SELECT * FROM user WHERE name= '" . $_SESSION['username'] ."';";
              echo $_SESSION['username'];

                $result_userid = mysqli_query($conn, $sql_nuserID);
                if(!$result_userid)
                {
                  echo $conn->$error;
                }
                else{
                  $row =$result_userid->fetch_assoc();
                  $userID = $row['iduser'];
                    echo "userID: " . $userID;

                }
              

           }*/
           if($solo_stats != null){
               $sql_mode = "SELECT * FROM mode_ WHERE modeName= '" . $solo_stats->getMode() ."';";
               
                $result_mode = mysqli_query($conn, $sql_mode);
                if(!$result_mode)
                {
                  echo $conn->$error;
                }
                else{
                  $row_mode =$result_mode->fetch_assoc();
                  $modeid = $row_mode['idmode'];   
                }
          
                $sql_region = "SELECT * FROM region WHERE regionName = '" . $solo_stats->getRegion() ."';";
          
                
                $result_region= mysqli_query($conn, $sql_region);
                if(!$result_region)
                {
                  echo $conn->$error;
                }
                else{
                  $row_region =$result_region->fetch_assoc();
                  $regionid = $row_region['idregion'];
              
                }
              

          $rating = str_replace( ',', '', $solo_stats->getRating());
           $sql = "INSERT INTO leaderboard (name, idregion, idmode, rating, kdrating, games)
                            VALUES ('"
                . $name
                . "', '" 
                . $regionid
                . "', '"
                . $modeid
                . "', '"
                . $rating
                . "', '"
                . $solo_stats->getKillRatio()
                . "', '"
                . $solo_stats->getRoundPlayed()
                . "');";

                 $result = mysqli_query($conn, $sql);
               }


        }
       endif;
  

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
    tr{
      height: 60px;
    }

  </style>
</head>
<body>

<?php

if($check == true):


 include 'nav.php'; ?>
<div class="jumbotron text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container">
  <div class="row">
  <?php 
  $count = 0;
  foreach ($arrayStat as $as){
    ?>
    <div class="col-sm-4">
       <table class="table table-dark" id="statTB">
        <?php if($as != null):?>
          <th>
          <h4>Rating <br/> </h4> <h5><?php echo $as->getRating();?></h5>
          </th>
          <th>
          <h5 class="text-right"><span class="badge badge-info"><?php echo $arrayPlayType[$count];?></span></h5>
          </th>
          <tr> 
            <td>
              K/D Ratio  <br/> <?php echo $as->getKillRatio(); ?>
            </td>    
            <td>
              Win Ratio <br/><?php echo $as->getWinRatio(); ?>
            </td>
          </tr>
          <tr>
            <td>
              Headshot Ratio <br/><?php echo $as->getHeadRatio();?>
            </td>
            <td>
              Avg Damage <br/> <?php echo $as->getAvgDmg();?>
            </td>           
          </tr>
          <tr>
            <td>
               Game Played <br/><?php echo $as->getRoundPlayed();?>
            </td>
            <td>
              Win <br/> <?php echo $as->getWin();?>
            </td>
          </tr>
          <tr>
            <td>
               Top10 <br/><?php echo $as->getTopTen();?>
            </td>
            <td>
             Loose <br/> <?php echo $as->getLosses();?>
            </td>
          </tr>
        <?php else: ?>
            <th>
                
            </th>
            <th>  
             <h5 class="text-right"><span class="badge badge-info"><?php echo $arrayPlayType[$count];?></span></h5>
            </th>
            <tr>
              <td>
                Never played
              </td>
              <td>
              </td>
            </tr>
            <tr>
              <td>
              </td>
              <td>
              </td>
            </tr>
            <tr>
              <td>
              </td>
              <td>
              </td>
            </tr>
            <tr>
              <td>
              </td>
              <td>
              </td>
            </tr>

        <?php endif; ?>
        </table>
                    
    </div>


 <?php $count++;} 

 endif;?>
    
   </div>
</div>


<script type="text/javascript">
  


</script>

</body>
</html>
