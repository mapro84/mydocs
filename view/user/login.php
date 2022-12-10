<?php
use src\Core\Auth\DBAuth;
use src\Core\Utils\Check;
use src\Core\Utils\Debug;
use src\Core\Config\Config;
use src\app\user\AppUser;

if(isset($_POST['username']) && isset($_POST['password'])){
	
	if(Check::is_safe_string($_POST['username']) && Check::is_safe_password($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = DBAuth::login($username, $password);
		if ($user !== false && $user->privilege_id === "1"){
			$cookie_lifetime = Config::getGenConfKey('cookie_lifetime');
			session_start(['cookie_lifetime' => $cookie_lifetime]);
			$_SESSION['auth'] = $user->id;
			header('Location: index.php?page=bo');
		}else{
			echo $username . ' is not allowed to access this area';
		}
	}else{
		echo 'BAD login pass';
	}
}

?>

<form class="postform" action="index.php?page=login&action=log" method="post">
	<div class="form-group">
		<strong>Login</strong>
	</div>
	<div class="form-group">
		<label for="username">Username:</label>
		<input type="text" name="username">
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" name="password">
	</div>
		<button type="submit" class="btn btn-default">Submit</button>
</form> 