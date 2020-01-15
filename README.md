# pubg_leaderboard
Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore
 
@jaejun-min 
Jaejun-Project
/
pubg_leaderboard
1
00
 Code Issues 0 Pull requests 0 Actions Projects 0 Wiki Security Insights Settings
pubg_leaderboard/ProjectSummary.html
@jaejun-min jaejun-min l
34c1627 23 hours ago
65 lines (57 sloc)  2.03 KB
  
<!DOCTYPE html>
<html>
<head>
	<title>Final Project Proposal</title>
</head>
<body>
	<h1>Assignment 10: Final Project Proposal.</h1>

	<h2>
		Topic: 
	</h2> 
	<p>My website will provide the leaderboard for the game called the PlayerUnknown's Battleground. Users of the PlayerUnknown's Battleground can check their ranks and their status on how they have played their game from my website.
	</p>
	

	<h2>How my site works:</h2>
	<p>My web page will contain below pages. </p>
	<ul>
		<li>
			<h4>Leaderboards</h4>
			- Will display all players' rankings with ratings. <br/>
            - Once register user search player from main page, player's stats will store into database. <br/>
            - Retrieve player info from leaderboard table in Database. <br/>
		<li>
			<h4>Stats</h4>
			<p>- Will display more detailed information about individual user.</p>
            - Only register user can search player's stats. <br/>
            
		</li>
		<li>
			<h4>Sign up and Login page</h4>
			<p>- People can register and login for the web page.
			</p>

		</li>
	
	</ul>
	<h2>Database:</h2>
		<ul>
			<li>
			<h4>a</h4>
			- I will use the open API to get the PlayerUnknown's Battleground player stats. <br/><br />
			- I will also use MySQL to store the data on who have registered for the website. 
			</li>
			<li>
			<h4>b</h4>
			- The given API will provide players' stats, play mode, and play seasons. <br/><br/>
			- When audiences sign up for the web page, the sign-up page will require the user name, password, and email address And, all of these will be stored in the MySQL database. <br/><br/>
			</li>
			<li>
			<h4>c</h4>
			 -	The open API is given by "https://pubgtracker.com/site-api">https://pubgtracker.com/site-api.
			 - Login users' information will be come from the MySQL. 
#Database Diagram:
 1. API <a href="https://pubgtracker.com/site-api">https://pubgtracker.com/site-api.</a> <br/>
   2. Session <br/>
   3. Pagination <br/>


