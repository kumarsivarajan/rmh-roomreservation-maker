<?PHP
/*
* Brian Harrison Charles Holenstein 
*/
	session_start();
	session_cache_expire(30);
        $title = 'Login Help';
        include ('../header.php');
?>
<html>
    <div id="container">
        <div id="content">
	<head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title>Login Help</title>
            <br/><br/>
	</head>
	<body>
            </br></br>
		<div align="center"><h1><strong> Signing in and out of the System</h1>
		<p>Access to <i>Homeroom</i> requires a Username and a Password.  The form looks like this:
		<!--<p><table align="center">
					<tr><td>Username:</td>
			            <td><input type="text" name="user" tabindex="1"></td></tr>
			        <tr><td>Password:</td><td><input type="password" name="pass" tabindex="2"></td></tr>
			        <tr><td colspan="2" align="center"><input type="submit" name="Login" value="Login"></td></tr></table> -->
		<p>Once you sign in you will be able to fill out and submit a <b>room request></b> form on-line.
			<p>If you are a <i>volunteer, social worker, or staff member</i>, your Username is your first name followed by your phone number with no spaces.
			<ul><li>For example, if your first name is John and your phone number is (207)-123-4567, your Username would be <strong>John2071234567</strong>.
				<li>Remember that your Username and Password are <em>case-sensitive</em>.
				<li>If you mistype your Username or Password, the following error message will appear:
				<p class="error">The request could not be completed: security check failed!</p>
				<p> At this point, you can retry entering your Username and Password (if you think you may have mistyped them).
				<li>If all else fails, or if you do not remember your password, please click the "click here to reset it." link which will allow you to create a new password through your email.</a>.
			</ul>
<p> Remember to <strong>logout</strong> when you are finished using RMH Reservation Maker.
	</body>
        </br></br>
           <input class="helpbutton" type="submit" value="Back" align="bottom" onclick="location.href='../login.php'" />
        </div>
        </div>    
    </div>
</html>
<?PHP include('../footer.php'); ?>

