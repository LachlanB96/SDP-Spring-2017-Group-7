<html>
<head>
	<?php
	include("headers.php");
	session_start();
	?>
</head>
<body>
	<?php include("navigation.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<div class="row">
					<div class="col-md-12">
						<div class="page-header">
							<h1 class="text-center">
								Creating Journal
							</h1>
						</div>
						<div id="journalTable"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style='text-align: right;'>
						Journal Name:
					</div>
					<div class="col-md-4">
						<input type="text" style='width: 100%;' id="input_journalName">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
						<a type="button" class="btn btn-default" href="journal.php">
							Go Back
						</a>
					</div>
					<div class="col-md-2">
						<a type="button" class="btn btn-default" id="createJournal">
							Create
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">






	$(document).ready(function(){
		$("#createJournal").click(function(event) {
			date = new Date();
			objectData = {
				action: "create",
				type: "journal",
				title: $("#input_journalName").val(),
				creationDate: (date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear())
			};
			$.post("databaseHandler.php", objectData, function(data, status){
				window.location.href = "journal.php";
			});

		});
	});









</script>
</html>