	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 nav-padding">
				<ul class="nav nav-pills">
					<li class="active">
						<a href="#">Home</a>
					</li>
					<li class="disabled">
						<a href="#">Profile</a>
					</li>
					<li>
						<a href="dbwork.php">Developer</a>
					</li>
					<!-- <li class="pull-right">
						<div class="input-group ">
							<div class="input-group-addon">@</div>
							<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
						</div>
					</li> -->
					
					<?php
					if(isset($_SESSION['currentUser'])){ ?>
					<li class="dropdown pull-right">
						<a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-secondary">Logged in: <?=$_SESSION['currentUser']?><strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">Toggle Theme</a>
							</li>
							<li>
								<a href="#">View All Journals</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a id="logout">Logout!</a>
							</li>
						</ul>
					</li>
					<?php }
					else { ?>
					<li class="pull-right">
							<a href="home.php">Sign In</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$("#logout").click(function(){
			console.log("cya");
			$.post("sessionHandler.php", {action: "logout"}, function(data, status){
				console.log("DATA: " + data);
				console.log("STATUS: " + status);
				window.location.href = "home.php";
			});
		});
	</script>