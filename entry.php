<html>
<head>
	<?php
	include("headers.php");
	session_start();
	if(isset($_POST['currentEntry'])){
		$_SESSION['currentEntry'] = $_POST['currentEntry'];
	} else {
		$_POST['currentEntry'] = $_SESSION['currentEntry'];
	} ?>
	<script type="text/javascript">
		var currentEntry = "<?=$_POST['currentEntry']?>";
	</script>

</head>
<body>
	<?php include("navigation.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<a type="button" class="btn btn-default" href="journalEntries.php">Back</a>
					</div>
				</div>
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
						<a type="button" class="btn btn-default" id="editEntry">
							Edit Entry
						</a>
					</div>
					<div class="col-md-2">
						<a href="#" data-toggle="dropdown" class="btn btn-default dropdown-toggle">View History<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li>
								<a id="#">Version 2</a>
							</li>
							<li>
								<a href="#">Version 3</a>
							</li>
						</ul>
					</div>
					<div class="col-md-2">
						<a type="button" class="btn btn-default" id="input_delete">
							Delete Entry
						</a>
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">

	var entryArray; 




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

	$("#editEntry").click(function(){
		var url = 'editEntry.php';
		var form = $('<form action="' + url + '" method="post">' +
			'<input type="text" name="currentEntry" value="' + entryArray + '" />' +
			'</form>');
		$('body').append(form);
		form.submit();
		console.log(entryArray);
	});


	$("#input_delete").click(function(){
		objectData = {
			action: "delete",
			type: "entry",
			entryName: currentEntry
		};
		$.post("databaseHandler.php", objectData, function(data, status){
			console.log("DATA: " + data);
			console.log("STATUS:dd " + status);
			window.location.href = "journalEntries.php";
		});
	});

</script>
<?php
var_dump($_SESSION);
echo "<br />";
var_dump($_POST);
?>
</html>