<html>
<head>
	<?php
	include("headers.php");
	session_start();
	$entryValues = explode(",", $_POST['currentEntry']);
	?>
	<script type="text/javascript">
		var currentEntry = "<?=$_POST['currentEntry']?>";
		var entryArray = currentEntry.split(",");
		console.log(currentEntry);
		console.log(entryArray);
	</script>
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
								Editting Entry
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
						<input type="text" style='width: 100%;' id="input_entryTitle" value="<?=$entryValues[0]?>">
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
						<br />
						<textarea class="form-control" rows="5" id="input_description"><?=$entryValues[3]?></textarea>
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
						<a type="button" class="btn btn-default" id="finishEditting">
							Confirm Edit
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">


	$(document).ready(function(){
		$("#finishEditting").click(function(event) {
			date = new Date();
			objectData = {
				action: "create",
				type: "entryEdit",
				oldTitle: entryArray[0],
				journal: entryArray[1],
				oldContents: entryArray[3],
				oldDateCreated: entryArray[4],
				newTitle: $("#input_entryTitle").val(),
				newDescription: $("#input_description").val(),
				newDateCreated: (date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear()),
				newRevisionNumber: "1"
			};
			console.log(objectData);
			$.post("databaseHandler.php", objectData, function(data, status){
				console.log("DATA: " + data);
				console.log("STATUS: " + status);
				//window.location.href = "entry.php";
			});

		});
	});


</script>
<?php
var_dump($_SESSION);
echo "<br />";
var_dump($_POST);
?>
</html>