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
						Title:
					</div>
					<div class="col-md-8">
						<input type="text" style='width: 100%;' id="input_entryTitle">
					</div>
				</div>
<!-- 				<div class="row">
					<div class="col-md-2" style='text-align: right;'>
						Collaborators:
					</div>
					<div class="col-md-8">
						<input type="text" style='width: 100%;' id="input_collaborators">
					</div>
				</div> -->
				<div class="row">
					<div class="col-md-2" style='text-align: right;'>
						Description:
					</div>
					<div class="col-md-8">
						<textarea class="form-control" rows="5" id="input_description"></textarea>
					</div>
				</div>
<!-- 				<div class="row">
					<div class="col-md-2" style='text-align: right;'>
						Tags:
					</div>
					<div class="col-md-8">
						<input type="text" style='width: 100%;' id="input_tags">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style='text-align: right;'>
						Attach File:
					</div>
					<div class="col-md-4">
						<input type="text" style='width: 100%;' id="input_collaborators">
					</div>
					<div class="col-md-2">
						<a type="button" class="btn btn-default" href="#">
							Browse Files
						</a>
					</div>
				</div> -->
				<hr />
				<div class="row">
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
				type: "entry",
				title: $("#input_entryTitle").val(),
				//collaborators: $("#input_collaborators").val(),
				description: $("#input_description").val(),
				//input_tags: $("#input_tags").val(),
				creationDate: (date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear())
			};
			$.post("databaseHandler.php", objectData, function(data, status){
				console.log("DATA: " + data);
    			console.log("STATUS:dd " + status);
				window.location.href = "journalEntries.php";
			});

		});
	});









</script>

</html>