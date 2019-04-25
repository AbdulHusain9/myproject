 <?php
                    $host="localhost";
                    $username="root";
                    $password="";
                    $db="login";
                    mysql_connect($host,$username,$password);
                    mysql_select_db($db);
                   
                    if(isset($_POST['username'])){

                        $username= $_POST['username'];
                        $password= $_POST['password'];
                        $sql="select * from loginform where username='$username' AND password='$password' ";
                        $result=mysql_query($sql);
                        if(mysql_num_rows($result)==1){
                            header("Location: http://localhost/test/form1.html");
                            echo " You Have Successfully Logged in"; 
                            exit();
                            
                        }else{ 
                            
                            $message='Worning !!! ...Incorrect UserName or PassWord';
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            exit();
                            header("Location: http://localhost/test/loginn.php");
                        }
                    }
            ?>
<html>
    <head> 
        <title>login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet" type="text/css"> 
            
    </head>
    <body>
    
	
	<div class="main"> 
	<div class="top-nav">	
					
				<div class="clear"></div>
			</div>	
		<div class="header-main">
		      <h2>Login</h2>
			<div class="header-bottom">
				<div class="header-right">
					<div class="header-left-bottom ">
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
							<div class="icon1">
								<input type="username" placeholder="username" name="username" required=""/>
							</div>
							<div class="icon1">
								<input type="password" placeholder="password" name="password" required=""/>
							</div>	
							<div class="bottom">
								<input type="submit" value="Log in" />
							</div>
							
					   </form>	
					</div>
				</div>
			</div>
        </div>
    </div>
    </body>
</html>