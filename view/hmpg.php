<div id="background"></div>
<div id="top">
	<h1 style="transform:translate(70%,200%)">WHATS NEW HERE</h1>
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
		<h1 style="transform:translate(20%,-170%)">POPULAR NOW</h1>
		<ul class="topProduct">
		</ul>
	</div>
	<div class="content right">
		<h1 style="transform:translate(17%,-170%)">WHATS OTHER VIEW</h1>
		<ul class="lastviewProduct">
		</ul>
	</div>
</div>
<div id="bottom">
	<div class="content grid">
		<h1 style="transform:translate(6%,-170%)">SEE WHATS WE HAVE </h1>
		<div id="content-card" style="display: table;">
		</div>
		<section id="paging">
			<ul ></ul>	
		</section>
	</div>
</div>