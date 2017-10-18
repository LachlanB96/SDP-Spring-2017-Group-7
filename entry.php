<html>
<head>
	<?php
	include("headers.php");
	session_start();
	if(isset($_POST['currentEntry'])){
		$_SESSION['currentEntry'] = $_POST['currentEntry'];
		?>
		<script type="text/javascript">
			var currentEntry = "<?=$_POST['currentEntry']?>";
		</script>
	<?php } ?>
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
								Entry: <?=$_SESSION['currentEntry']?>
							</h1>
						</div>
						<div id="entryDescription"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1">
						<p>
							Files:
						</p>
					</div>
					<div class="col-md-2">
						<p>
							No File Entered
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<a type="button" class="btn btn-default" href="createJournal.php">
							Edit Entry
						</a>
					</div>
					<div class="col-md-2">
						<a type="button" class="btn btn-default" href="createJournal.php">
							View History
						</a>
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox"> Only show active entries
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">

	function createTable(data){
		entry = data.split("|| ||").filter(Boolean);
		$("#entryDescription").html(entry[3]);
	}


	$(document).ready(function(){
		objectData = {
			action: "read",
			type: "entries",
			entryName: currentEntry
		};
		$.post("databaseHandler.php", objectData, function(data, status){
			console.log("DATA: " + data);
			console.log("STATUS:dd " + status);
			entryData = data.split("|| ||").filter(Boolean);
			console.log(entryData);
			entryArray = entryData[0].split("|||");
			console.log(entryArray);
			$("#entryDescription").html(entryArray[3]);
    		//createTable(data);
    	});
	});
</script>
</html>