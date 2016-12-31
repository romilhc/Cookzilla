

<?php 
	require 'dbconn.php';
		session_start();
		?>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="homepage.php">Cookzilla</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <!-- Recipes Nav Bar -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recipes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">          
            
            <li class="divider"></li>
            <li><a href="getuserrecipe.php">View My Recipes</a></li>
            <li class="divider"></li>
			<li><a href="getAllRecipes.php">View All Recipes</a></li>
            <li class="divider"></li>
            <li><a href="recommendrecipe.php">Recommend Recipes</a></li>
            <li class="divider"></li>
            <li><a href="addRecipe.php">Add Recipes</a></li>
          </ul>
        </li>
        <!-- Groups Nav Bar -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Groups <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">          
            <li class="divider"></li>
            <li><a href="getusergroup.php">My Groups</a></li>
            <li class="divider"></li>
            <li><a href="getrestgroup.php">Rest of the Groups</a></li>
            <li class="divider"></li>
            <li><a href="creategroup.php">Create New Group</a></li>       
          </ul>
        </li>
        <!-- Events Nav Bar -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Events <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">          
          <li class="divider"></li>
            <li><a href="browse_events.php">Attended Events</a></li>  
            <li class="divider"></li>
            <li><a href="upcomingevents.php">Upcoming Events</a></li>

            <li class="divider"></li>
            <li><a href="createevents.php">Create Events</a></li>
                 
          </ul>
        </li>

        <!-- Follows Nav Bar -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Companions <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">          
            
            <li class="divider"></li>
            <li><a href="getfollowers.php?uname=<?php echo $_SESSION['user']?>">My Followers</a></li>
            <li class="divider"></li>
            <li><a href="getfollowing.php?uname=<?php echo $_SESSION['user']?>">My Following</a></li>  
            <li class="divider"></li>
            <li><a href="allusers.php">All Users</a></li>     
          </ul>
        </li>
      
      
	<li>
      <form class="navbar-form navbar-left" role="search" method="POST" action="search.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="keyword">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
	  </li>
      <!--<ul class="nav navbar-nav navbar-right">-->
        <li><a href="profile.php?uname=<?php echo $_SESSION['user']?>"><strong> <h5>
		
		<?php
		if(isset($_SESSION['user']))
		{
			$user = $_SESSION['user'];
			$sql_getname="select fname,lname from user where uname='".$_SESSION['user']."'";
			$result_getname=$conn->query($sql_getname);
			$row_getname=$result_getname->fetch_assoc();
			echo "Welcome ".$row_getname['fname']." ".$row_getname['lname']."!";
		}
		else
		{
		
		}
		?>
		</h5></strong></a></li>
		
		 <li>
    <a href = "logout.php"><strong><h5>Logout</h5></strong>
    </a></li>
      </ul>
    </div>
  </div>
</nav>