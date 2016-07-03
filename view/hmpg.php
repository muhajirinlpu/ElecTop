<div id="background"></div>
<div id="top">
	<!-- begin of new product slider start -->
	<div class="new-container">
		<div class="flexslider">
			<ul class="slides">
			</ul>
		</div>
	</div>
	<div class="introtext">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
</div>
<div id="handler"></div>
<div id="nav-container">
	<div id="login-form">
		<?php if (!$loggedin): ?>
			<form action="prcs/user.php?do=login" method="POST">
				<input type="text" name="Username" placeholder="username">
				<input type="password" name="password" placeholder="password">
				<button type="submit">Login</button>
			</form>
		<?php else: ?>
			<div id="min-dashboard">
				<?php echo "Hai . " . $name ?>
			</div>
		<?php endif ?>
	</div>	
</div>
<div class="search-container">
	<form>
		<input type="text" class="search" name="search" placeholder="Search product">
	</form>
	<div class="result-container">
		<!-- <ul class="search-container"></ul> -->
	</div>
</div>
<div id="middle">
	<div class="left">
		<ul>
			<li></li>
		</ul>
	</div>
	<div class="right">
		<ul>
			<li></li>
		</ul>
	</div>
</div>
<div id="bottom">

<?php phpinfo() ?>
	
</div>