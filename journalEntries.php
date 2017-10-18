<html>
<head>
	<?php
	include("headers.php");
	session_start();
	if(isset($_POST['entryName'])){
		$_SESSION['entryName'] = $_POST['entryName'];
		?>
		<script type="text/javascript">
			var entryName = "<?=$_POST['entryName']?>";
		</script>
	<?php } ?>
</head>
<body>
	<?php include("navigation.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<h3>
							Tag Search
						</h3>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-1">

								<button type="button" class="btn">
									Urgent
								</button>
							</div>
							<div class="col-md-1">

								<button type="button" class="btn btn-default">
									Important
								</button>
							</div>
							<div class="col-md-1">

								<button type="button" class="btn btn-default">
									Notes
								</button>
							</div>
							<div class="col-md-1">
							</div>
							<div class="col-md-1">
							</div>
							<div class="col-md-1">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="page-header">
							<h1 class="text-center">
								Journal: <?=$_SESSION['entryName']?>
							</h1>
						</div>
						<div id="journalEntriesTable"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">

						<a type="button" class="btn btn-default" href="createJournal.php">
							New Entry
						</a>
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-4">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox"> Show hidden entries
						</label>
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox"> Show deleted entries
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">

	$("#journalEntriesTable").on("click", "tr", function(event){
		console.log($(this)["0"].id);
		var url = 'entry.php';
		var form = $('<form action="' + url + '" method="post">' +
			'<input type="text" name="currentEntry" value="' + $(this)["0"].id + '" />' +
			'</form>');
		$('body').append(form);
		form.submit();
	});

	function createTable(data){
		console.log(data);
		cells = [];
        //console.log(data.data);
        rows = data.split("|| ||").filter(Boolean);
        //console.log(rows);
        for (var i = rows.length - 1; i >= 0; i--) {
        	cells[i] = rows[i].split("|||");
        }
        //console.log(cells);
        table = "<table class='table'><thead><tr>";
        table += "<th>Entries</th>";
        table += "<th>Date Created</th>";
        table += "</tr></thead><tbody>";
        for (i = rows.length - 1; i >= 0; i--) {
        	table += "<tr id='"+cells[i][0]+"'><td>";
        	table += cells[i][0];
        	table += "</td><td>";
        	table += cells[i][4];
        	table += "</td></tr>";
        }
        table += "</tbody></table>";
        $("#journalEntriesTable").html(table);
    }


    $(document).ready(function(){
    	input_title = {additionType: "textOutput", id: "information", text: "Here are your journals: "};
    	objectData = {
    		action: "read",
    		type: "journalEntries",
    		journalName: entryName
    	};
    	$.post("databaseHandler.php", objectData, function(data, status){
    		console.log("DATA: " + data);
    		console.log("STATUS:dd " + status);
    		createTable(data);
        });
    });
</script>
</html>