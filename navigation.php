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
					<li>
						<input type="text" style='display:inline'>
					</li>
					<!-- <li class="pull-right">
						<div class="input-group ">
							<div class="input-group-addon">@</div>
							<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
						</div>
					</li> -->
					
					<li class="dropdown pull-right">

						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Logged in: <?=$_SESSION['currentUser']?><strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#">Separated link</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>