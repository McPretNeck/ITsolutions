<?php
session_start();
include 'db.php';
$LogSucses = false;
if(isset($_SESSION['ID'])){$LogSucses = true;}
if(isset($_POST['Username'])){
	$query = "Select Wachtwoord from gebruiker where Naam = \"".$_POST['Username']."\" LIMIT 1";
	$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) > 0){
		While ($row = mysqli_fetch_assoc($result))
			{
				$passwordUser = $row['Wachtwoord'];
			}
		
		if(isset($passwordUser) && $passwordUser == $_POST['Password'])
		{
			$query = "Select * from gebruiker where Naam = \"".$_POST['Username']."\" LIMIT 1";
			$result = mysqli_query($db, $query);
			While ($row2 = mysqli_fetch_assoc($result))
			{
				$_SESSION["ID"] = $row2["idGebruiker"];
				$_SESSION["naam"] = $row2["Naam"];
				$_SESSION["password"] = $row2["Wachtwoord"];
				$_SESSION["rol"] = $row2["Rol"];
				$_SESSION["AfdCode"] = $row2["AfdCode"];
				$_SESSION["email"] = $row2["Email"];
				$_SESSION["phonenumber"] = $row2["Telefoonnummer"]; 
			}
			$LogSucses = true;
			header('Location: mindex.php');
		}
		}else
		{
		$login_fail = "show";
		$login_fail_msg = "De gebruikers gegevens zijn niet gevonden.";
		}
}
if(isset($_POST['Logoff'])){session_unset(); session_destroy(); $LogSucses = false; header('Location: mindex.php');}
if(isset($_POST['Logoff2'])){$userID = $_SESSION['ID'];session_unset(); session_destroy(); $LogSucses = false;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="icon" href="img/logo.png">
  <title>IT Solutions</title>
</head>
<body>
	<!--initialiesatie menu-->
	<nav class="navbar navbar-light sticky-top" style="background-color: #c4c4c4"> 
		<div class="container">
			<a class="navbar-brand" href="mindex.php"><img src="img/logo.svg" alt="Logosvg" style="width: 50px;"> Solutions</a>
			<?php if(!$LogSucses){ ?>
			<div class="navbar-nav ml-auto mr-2">
				<a class="navbar-toggler btn-outline-secondary"
					data-toggle="collapse" data-target="#myLogin" 
					aria-controls="myLogin" aria-expanded="false" aria-label="Toggle navigation">Login</a>
			</div>
			
			<?php }
			elseif($LogSucses)
			{ ?>
			<!--Gebruikers gegevens weergeven-->
				<div class="nav-item dropdown ml-auto">
					<a class="nav-link dropdown-toggle" href="#" id="navbardroplocatie" data-toggle="dropdown"><?php echo $_SESSION["naam"]?></a>
					<div style="width:100%; min-width:250px;"  class="dropdown-menu">
						<p class="nav-item ml-4 mr-4"><?php echo $_SESSION["ID"]?></p>
						<p class="nav-item ml-4 mr-4"><?php echo $_SESSION["email"]?></p>
						<p class="nav-item ml-4 mr-4"><?php echo "0". $_SESSION["phonenumber"]?></p>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form-inline align-self-center">
							<a align="Left" href="gegevens_wijzigen.php" ><input class="btn btn-primary btn-sm ml-4 mb-2" type="button" value="Weizigen" name="Edit"></a>
							<a align="Right" href="remove_user.php" ><input class="btn btn-primary btn-sm ml-4 mb-2" type="button" value="Delete acount" name="Delete"></a>
						</form>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form-inline align-self-center">
							<input style="width:82%; min-width:205px;" class="btn btn-primary ml-4" type="submit" value="Logoff" name="Logoff">
						</form>
					</div>
				</div>
				<!--insert mail heren-->
				<a class="navbar-brand" href="mindex.php"><img src="img/mail-var-outline.svg" alt="Logosvg" style="width: 30px;"></a>
				<!--knop links-->
			<button class="navbar-toggler btn-outline-secondary" type="button" 
					data-toggle="collapse" data-target="#myTogglerNav" 
					aria-controls="myTogglerNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
					</span>
			</button>
			<?php } ?>
			
			<!--Gebruikers zijn niet gevonden/kommen niet overeen-->
			<?php if(!$LogSucses){?>
			<div class="collapse navbar-collapse <?php echo $login_fail?>" id="myLogin" >
				<div class="navbar-nav">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form-inline align-self-center">
						<div class="col">
						<div class="row">
						<?php if(isset($login_fail_msg)){echo("<font class=\"mr-auto ml-auto\" color=\"red\">".$login_fail_msg."</font>");}?>
						</div>
						<div class="row">
							<input class="form-control mr-2" type="text" placeholder="Username" name="Username"> 
							<input class="form-control mr-2" type="password" placeholder="Password" name="Password"> 
							<input class="btn btn-primary mr-2" type="submit" value="Login" name="Login">
						</div>
						<div class="row">
							<a class="mr-5" href="*"></a>
							<span class="ml-2 mr-4"></span><span class="mr-5"></span>
							<a href="email_wachtwoord.php">wachtwoord vergeten ?</a>
						</div>
						</div>
					</form>
				</div>
			</div>
			<!--uitklap menu links-->
			<?php }?>
			<div class="collapse navbar-collapse" id="myTogglerNav" >
				<div class="navbar-nav">
				<div class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbardroppaarden" aria-haspopup="true" data-toggle="dropdown" aria-expanded="true">Producten ect. toevoegen</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="Product_toevoegen.php">Nieuw product</a>
						<a class="dropdown-item" href="Leverancier_toevoegen.php">Nieuw leverancier</a>
						<a class="dropdown-item" href="AankoopVerzoek.php">Aankoop verzoek indienen</a>
					</div>
				</div>
				<div class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbardroplocatie" aria-haspopup="true" data-toggle="dropdown" aria-expanded="true">Sample</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="*">Sample</a>
					</div>
				</div>
				<?php if($_SESSION["ID"] == 1){?>
				<div class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbardroplocatie" aria-haspopup="true" data-toggle="dropdown" aria-expanded="true">Gebruikers</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="registreren_gebruiker.php">Gebruikers Toevoegen</a>
					</div>
				</div>
				<?php }?>
				</div>
			</div>
		</div>
	</nav>
	<!--Footer-->
	<nav class="navbar navbar-light fixed-bottom mt-1 " style="background-color: #c4c4c4"> 
		<div class="container">
			<h6 class="mt-1 mb-2 ml-auto mr-auto">Aan de gegevens op deze site kunnen geen rechten worden ontleend.</h6>
		</div>
	</nav>
	<script src="js/jquery.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>
