<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])){
    $expected = ['name', 'email', 'comments'];
    $required = ['name', 'comments'];
}


$name = $_POST["name"];
$today = getDate();

?>
<!DOCTYPE HTML>  
<html>
<head>
<style type="text/css">
	form { background: pink; border-radius: 1em; padding: 3em; }
	.textbox { border-radius: 1em; width: 20em; height: 1.5em; padding:1em; font-size: 2em; margin: 1em; }
	#submit { background-color: white; width: 300px; height: 100px; margin: 0em; font-size: 2em;  }
    .warning { font-weight: 700; color: red; }
    h2 { box-shadow: 0px 1px black; font-size: 300%; color: white; padding: 1em; border-bottom: .5em solid white; }
</style>
<title>Contact</title>
</head>
<body>
    
    <h1>Today's date is: <?php echo date('l jS \of F Y h:i:s A'); ?></h1>
    <pre>
         <?php print_r($today); ?>
    </pre>
    
    <!-- Contact form starts here -->
    <hr />
    <?php 
			if (isset($_POST['name'])){
				echo "<h1>Name entered is: " . $name . ".</h1>";
			}
	 ?>
    <hr/>
    
	<form action="<?= $_SERVER["PHP_SELF"];?>" method="post">
        
        <h2>Contact Us</h2>
        <?php if ($errors || $missing) : ?>
        <p class="warning">Please fix the item(s) indicated.</p>
        <?php endif; ?>
        
        <label for="name">
            <?php if ($missing && in_array('name', $missing)) : ?>
               <span class="warning">Please enter your name.</span>
            <?php endif; ?>       
        </label>
		<input class="textbox" type="text" placeholder="Name" name="name">
        <label for="email">
            <?php if ($missing && in_array('email', $missing)) : ?>
               <span class="warning">Please enter your email.</span>
            <?php endif; ?>       
        </label>
        <input class="textbox" type="email" placeholder="Email" name="email">
        
		<input id="submit" type="submit" name="submit">
	</form>

	
    
</body>
</html>