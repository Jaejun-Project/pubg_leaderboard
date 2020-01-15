<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-dark mr-auto">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item" >
      <a class="nav-link" href="leaderboard.php">Leaderboards</a>
    </li>
        <li class="nav-item">
            <a class="nav-link" href="ProjectSummary.html"> Project Summary</a>
        </li>
    </ul>

     <ul class="navbar-nav ml-auto">
       <?php if ( !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false ) : ?>

        <li class="nav-item">
          <a class="nav-link" href="login.php"> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php"> Sign Up</a>
        </li>
      
       
        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Hello <?php echo $_SESSION['username']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="logout.php">Logout</a>
        </li>
      <?php endif; ?> 
  </ul>

</nav>
<script type="text/javascript">


</script>