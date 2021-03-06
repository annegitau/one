<!DOCTYPE html>
<?php
define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","carproject");

$username="";
$firstname="";
$lastname="";
$password="";
$pnumber="";
$status="DISABLED";

if(isset($_REQUEST['username'])){
    $username=$_REQUEST['username'];
    $firstname=$_REQUEST['firstname'];
    $lastname=$_REQUEST['lastname'];
    $pnumber=$_REQUEST['pnumber'];
    
    include_once("users.php");
    $obj=new users();
    $r=$obj->addUser($username,$firstname,$lastname,$email,$pnumber,$password,$usergroup);
    //chek whether the data has been added or not
    if(!$r==false)
        echo $username + "added";
    //$strStatusMessage=$username+"added";
    else
        echo "error adding user";
    //$strStatusMessage="error while adding user";
}
$username="";
$firstname="";
$lastname="";
$password="";
$pnumber="";
$status="DISABLED";
?>
<?php 
$poolid ="";
$location="";
$destination="";
$poolstatus="OPEN";

if(isset($_REQUEST['poolid'])){
    $poolid=$_REQUEST['poolid'];
    $location=$_REQUEST['location'];
    $destination=$_REQUEST['destination'];
    
    include_once("pool.php");
    $obj=new pool();
    $r=$obj->addPool($poolid,$location,$destination);
    
    if(!$r==false)
        echo $poolid + "Created";
    else
        echo "Error creating a pool";
}
$poolid="";
$location="";
$destination="";
$poolstatus="OPEN";
?>
<html>
    <head>
		<meta charset="utf-8">
		<title>CAR POOL</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no;" />

		<link rel="stylesheet"  href="css/jquery.mobile.structure.css" />
		<link rel="stylesheet" href="css/jquery.mobile.theme.css" />
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
        

		<script>
			var userAgent = navigator.userAgent + '';
			if (userAgent.indexOf('iPhone') > -1) {
				document.write('<script src="js/lib/cordova-iphone.js"></sc' + 'ript>');
				var mobile_system = 'iphone';
			} else if (userAgent.indexOf('Android') > -1) {
				document.write('<script src="js/lib/cordova-android.js"></sc' + 'ript>');
				var mobile_system = 'android';
			} else {
				var mobile_system = '';
			}
		</script>

		<script src="js/lib/jquery.js"></script>
		<!-- your scripts here -->
		<script src="js/app/app.js"></script>
		<script src="js/app/bootstrap.js"></script>
		<script src="js/lib/jquery.mobile.js"></script>
        <script type="text/javascript" src="myScript.js" ></script>
		<style>
			.ui-selectmenu.ui-popup .ui-input-search {
				margin-left: .5em;
				margin-right: .5em;
			}
			.ui-selectmenu.ui-dialog .ui-content {
				padding-top: 0;
			}
			.ui-selectmenu.ui-dialog .ui-selectmenu-list {
				margin-top: 0;
			}
			.ui-selectmenu.ui-popup .ui-selectmenu-list li.ui-first-child .ui-btn {
				border-top-width: 1px;
				-webkit-border-radius: 0;
				border-radius: 0;
			}
			.ui-selectmenu.ui-dialog .ui-header {
				border-bottom-width: 1px;
			}
			a {
				text-decoration: none;
			}
		</style>

	</head>
    <body>
        <div data-role="page" id="landingPage" style="background: white">
            <div data-role="header" style="text-shadow: none">
				<h1>Welcome</h1>
                <a href="#landingPage" data-role="button" data-icon="refresh" data-iconpos="notext" style="background: white;border: none;">Refresh</a>
				
            </div><!-- header -->
            <div data-role="content" style="text-shadow: none">
                <div style="background:white;color:black; text-align:center; font-weight:bolder; padding: 20px;box-shadow: 5px 5px 5px grey;">
                    <form class="login-form" action="">
                        <div class="imgcontainer">
                            <img src="img/logo.jpg">
                        </div>
                    <h5>WELCOME TO CAR POOLING!</h5>
                        <h6>Sign Up or <a href="#loginPage" data-transition="none">Login</a></h6>
                    
                        <div class="row margin">
                            <div class="input-field col s8">
                                <i class="mdi-social-person-outline prefix"></i>
                                <input id="username" class="validate" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"> 
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s8">
                                <i class="mdi-social-person-outline prefix"></i>
                                <input id="firstname" class="validate" type="text" name="firstname" placeholder="Firstname" value="<?php echo $firstname;  ?>">
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s8">
                                <i class="mdi-social-person-outline prefix"></i>
                                <input id="lastname" class="validate" type="text" name="lastname" placeholder="Lastname" value="<?php echo $lastname;  ?>">
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s8">
                                <i class="mdi-action-lock-outline prefix"></i>
                                <input id="password" type="password" class="validate" placeholder="password" name="pword">
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s8">
                                <i class="mdi-communication-phone prefix"></i>
                                <input id="pnumber" class="validate" type="text" name="pnumber" placeholder="Phone number" value="<?php echo $pnumber;  ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <a href="index.php" class="btn waves-effect waves-light col s12">Register Now</a>
                            </div>
                            <div class="input-field col s12">
                                <p class="margin center medium-small sign-up">Already have an account? <a href="#loginPage" data-transition="none">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- content -->
        </div><!-- Home page -->
            
        
        <div data-role="page" id="loginPage" style="background: white">
            <div data-role="header" style="text-shadow: none">
				<h1>Login</h1>
				<a href="#landingPage" data-role="button" data-icon="refresh" data-iconpos="notext" style="background: white;border: none;">Refresh</a>
            </div><!-- header -->
            <div data-role="content" style="text-shadow: none">
                <div style="background:white;color:black; text-align:center; font-weight:bolder; padding: 20px;box-shadow: 5px 5px 5px grey;">
                    <form action="">
                        <div class="imgcontainer">
                            <img src="img/logo.jpg">
                        </div>
                        
                        <div class="container">
                            <div class="row margin">
                            <div class="input-field col s8">
                                <i class="mdi-social-person-outline prefix"></i>
                                <input id="username" class="validate" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"> 
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s8">
                                <i class="mdi-action-lock-outline prefix"></i>
                                <input id="password" type="password" class="validate" placeholder="password" name="pword">
                            </div>
                        </div>
                            <a href="#homePage" type="submit" >Login</a>
                                <a href="#landingPage" class="btn waves-effect waves-light col s12">No Account? Register Now</a>
                         </div>
                    </form>
                    </div>
            </div><!-- content -->
        </div><!-- Login page -->
               
        <div data-role="page" id="homePage" style="background: white">
            <div data-role="header" style="text-shadow: none">
				<h1>Home</h1>
				<a href="#homePage" data-role="button" data-icon="refresh" data-iconpos="notext" style="background: white;border: none;">Refresh</a>                
                <a href="#homePage" data-role="button"  style="background: white;border: none;">News Feed</a>
            </div><!-- header -->
            <div data-role="content" style="text-shadow: none">
                 <div style="background:white;color:#000099; text-align:center; font-weight:bolder; padding: 20px;box-shadow: 5px 5px 5px grey;">
                    <form action="">
                        <div class="imgcontainer">
                            <img src="img/logo.jpg">
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <a href="#checkPool" class="btn waves-effect waves-light col s12">View Pools</a>
                            </div>

                            <div class="input-field col s12">
                                <scan class="margin center medium-small sign-up"><h4>News Feed</h4></scan>
                            </div>
                        <div>
                            <a id="capturePhoto" class="btn waves-effect waves-light col s12" >CAMERA</a>
                            <center><img class="lazy" style="display:none;width:100%;height:100%;" id="smallImage" src="" /></center>
                        </div>                          
				  	
                        </div>
                       
                    </form>
                    </div>
            </div><!-- content -->
        </div><!-- Home page -->
       
        <div data-role="page" id="createPool" style="background: white">
            <div data-role="header" style="text-shadow: none">
				<h1>Create Pool</h1>
				<a href="#createPool" data-role="button" data-icon="refresh" data-iconpos="notext" style="background: white;border: none;">Refresh</a>
                <a href="#homePage" data-role="button"  style="background: white;border: none;">News Feed</a>
            </div><!-- header -->
            <div data-role="content" style="text-shadow: none">
                <div style="background:white;color:#000099; text-align:center; font-weight:bolder; padding: 20px;box-shadow: 5px 5px 5px grey;">
                    <form action="">
                        <div class="imgcontainer">
                            <img src="img/logo.jpg">
                        </div>                        
                        <div class="row margin">
                            <div class="input-field col s8">
                                <i class="mdi-social-person-outline prefix"></i>
                                <input type="text" placeholder="Pool Id" value="<?php echo $poolid; ?>"> 
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s8">
                                <i class="mdi-social-person-outline prefix"></i>
                                <input  type="text"  placeholder="Location" value="<?php echo $location;  ?>">
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s8">
                                <i class="mdi-social-person-outline prefix"></i>
                                <input   type="text"  placeholder="Destination" value="<?php echo $destination;  ?>">
                            </div>
                        </div>
                        <div>
                        <a href="#checkPool" class="btn waves-effect waves-light col s12">Add to Pool</a>
                        </div>
                    </form>
                    </div>
                
            </div><!-- content -->
        </div><!-- Create Pool page -->
       
        <div data-role="page" id="checkPool" style="background: white">
            
            <div data-role="header" style="text-shadow: none">
				<h1>Check Pool</h1>
				<a href="#checkPool" data-role="button" data-icon="refresh" data-iconpos="notext" style="background: white;border: none;">Refresh</a>
                <a href="#homePage" data-role="button"  style="background: white;border: none;">News Feed</a>
            </div><!-- header -->
            <div data-role="content" style="text-shadow: none">
                <div style="background:white;color:#000099; text-align:center; font-weight:bolder; padding: 20px;box-shadow: 5px 5px 5px grey;">
                    <form action="">
                        <div class="imgcontainer">
                            <img src="img/logo.jpg">
                        </div>                        
                        <div class="container">
                            <h5>ALL POOLS</h5>
                                <div>
                                    <?php
                                    include_once("pool.php");
                                    $obj=new users();
                                    
                                    echo "<table>
                                    <tr>
                                        <td>poolid</td>
                                        <td>location</td>
                                        <td>destination</td>
                                        <td>poolstatus</td>
					                </tr>";
                                    
                                    while($row=$obj->fetch()){
                                        echo "<tr>";
                                        echo "<td>{$row['poolid']}</td>";
                                        echo "<td>{$row['location']}</td>";
                                        echo "<td>{$row['destination']}</td>";
                                        echo "<td>{$row['poolstatus']}</td>";
                                        echo "";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                    ?>
                            </div>
                            <!-- results of available pool -->
                            <a href=#checkPool class="btn waves-effect waves-light col s4"  >JOIN POOL</a>
                        </div>
                        <div  class="container">
                            No pool for your destination? <br>
                        <a href=#createPool class="btn waves-effect waves-light col s4" >CREAT POOL!</a>
                        </div>
                    </form>
                    </div>
            </div><!-- content -->
        </div><!-- Check pool page -->
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script type="text/javascript" src="cordova.js"></script>
			<script type="text/javascript" src="scripts/platformOverrides.js"></script>
			<script type="text/javascript" src="scripts/index.js"></script>
    </body>
</html>