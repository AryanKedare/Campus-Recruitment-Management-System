<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/style1.css">
		<nav class="navbar navbar-fixed-top" id="top-nav">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Campus Recruitment System</a>
				</div>
				<ul id="list1" class="nav navbar-nav">
					<li class="active"><a href="admin_dash.php">Home</a></li>
					<li class="active"><a href="index.html">Logout</a></li>
					
					
				</ul>
			</div>
		</nav>
		
		 <?php
			  session_start();

					
					function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

$conn = pg_connect("host=localhost port=5432 dbname=project user=postgres password=123") or die("Connection Failed");

				  
			if($_SERVER["REQUEST_METHOD"]=="POST"){
					$uname = $_POST['uname'];
					$sql1="SELECT * from students where email='".$_POST['uname']."';";
					$result = pg_query($GLOBALS['conn'],$sql1);
					if(pg_num_rows($result) == 0){
					    phpAlert(   "Wrong username entered!"   );
						//header('Location: student_dash.php');

					}else{
					$row=pg_fetch_assoc($result);
						
							$sql2="Delete from students where email='".$_POST['uname']."';";
							$result = pg_query($GLOBALS['conn'],$sql2);
							//phpAlert("Deleted!");
							//header('Location: index.html');
							$sql3="Delete from applications where s_mail='".$_POST['uname']."';";
							$result3 = pg_query($GLOBALS['conn'],$sql3);
							
							echo "<SCRIPT type='text/javascript'> //not showing me this
								alert('Deleted');
								window.location.replace(\"admin_dash.php\");
							</SCRIPT>";
						
					}
			}
        //echo $uname . "<BR>";
        //echo $pwd . "<BR>";
    
				 
           pg_close($conn);
          ?>
		
	</head>
	<body>

		
		<div class="well text-center" id="main">
  			<img class="img-responsive " src="Images/bye.png" height="200" width="700">
  		</div>
		
	<div class="well container-fluid text-center" id="frm1">
		<form action="" method="POST">
			<div>
				<label for="usrnm"><b>Enter Username to delete</b></label>
				<input type="text" placeholder="Enter Username" name="uname" id="usrnm" required>
			</div>
			<div>
				<button type="submit">Delete</button>
			</div>
        </form>
</div>
	
		
	</body>
	 <footer>
		<nav class="navbar navbad-default" id="bottom-nav">
			<div class="container-fluid">
				<div id="col1" >
					<ul id="blist1">
						<li><a href='#'>About Us</a></li>
						<li><a href='#'>FAQs</a></li>
						<li><a href='#'>Contact Us</a></li>
					</ul>
				</div>
				
				<div id="col2" >
					<ul id="blist1">
						<li><a href='#'>Privacy Policy</a></li>
						<li><a href='#'>Legal</a></li>
						<li><a href='#'>Work With Us</a></li>
					</ul>
				</div>
				
				<div id="col3" class=" container-fluid">
				
					<ul id="blist3" >
						<li><i class="fa fa-facebook fa-2x" ><a href='#'></a></i></li>
						<li><i class="fa fa-twitter fa-2x"><a href='#'></a></i></li>
						<li><i class="fa fa-instagram fa-2x"><a href='#'></a></i></li>
						<li><i class="fa fa-linkedin fa-2x"><a href='#'></a></i></li>
					</ul>
					<ul>
					<!--<p id="lic">site design / logo (c) Company_Name Inc.<br> licensed under Company_Name inc. </p>-->
					<li id="blist4">site design / logo (c) Company_Name Inc.<br> licensed under Company_Name inc.</li>
					</ul>
				</div>
			</div>
		</nav>
	</footer>
</html>
