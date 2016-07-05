<div id="background"></div>
<div id="top">
	<h1 style="transform:translate(70%,200%)">NEW PRODUCT</h1>
	<!-- begin of new product slider start -->
	<div class="new-container">
		<ul class="bxslider">
		</ul>
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
	<img src="../assets/pct/logo2.png" id="logo">
	<div id="login-form">
		<?php if (!$loggedin): ?>
			<form action="prcs/user.php?do=login" method="POST">
				<input type="text" name="username" placeholder="username">
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
	<form><input type="text" class="search" name="search" placeholder="Search product"></form>
	<ul class="search-result">
		<li></li>
	</ul>
</div>
<div id="middle">
	<div class="content left">
		<h1 style="transform:translate(20%,-170%)">TOP PRODUCT</h1>
		<ul class="topProduct">
		</ul>
	</div>
	<div class="content right">
		<h1 style="transform:translate(17%,-170%)">LAST VIEW OTHER</h1>
		<ul class="lastviewProduuct">
			<li class="attr-content">
				<img src="../uploads/default.png" class="picProduct">
				<span class="text">
					<h4>Sony MB140</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ....</p>
					<a href="#4">See detail >></a>
				</span>
			</li>
		</ul>
	</div>
</div>
<div id="bottom">
	
</div>