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
						<a type="button" class="btn btn-default" href="journal.php">Back</a>
					</div>
				</div>
				<div class="col-md-6">
						<div class="row">
							<div class="col-md-3">
								<p>
									Word Search
								</p>
							</div>
							<div class="col-md-7">
								<input type="text" id="input_wordSearch">
							</div>
							<div class="col-md-2">
								<a type="button" class="btn btn-default" id="submit_wordSearch">
									Search Entries
								</a>
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

						<a type="button" class="btn btn-default" href="createEntry.php">
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


	$("#submit_wordSearch").click(function(){
		console.log($("#input_wordSearch").val());
		objectData = {
    		action: "search",
    		type: "entry",
    		search: $("#input_wordSearch").val()
    	};
		$.post("databaseHandler.php", objectData, function(data, status){
			console.log("DATA: " + data);
			console.log("STATUS:dd " + status);
			console.log(" |6|");
			createTable(data);
		});
	});

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
        if (rows < 1){
        	html = "<div class='alert alert-danger'>"
        	html += "<strong>Error!</strong> No entries are in this journal.";
        	html += "</div>";
        }
        else {
	        //console.log(rows);
	        for (var i = rows.length - 1; i >= 0; i--) {
	        	cells[i] = rows[i].split("|||");
	        }
	        //console.log(cells);
	        html = "<table class='table'><thead><tr>";
	        html += "<th>Entries</th>";
	        html += "<th>Date Created</th>";
	        html += "</tr></thead><tbody>";
	        for (i = rows.length - 1; i >= 0; i--) {
	        	html += "<tr id='"+cells[i][0]+"'><td>";
	        	html += cells[i][0];
	        	html += "</td><td>";
	        	html += cells[i][4];
	        	html += "</td></tr>";
	        }
	        html += "</tbody></table>";
	    }
        $("#journalEntriesTable").html(html);
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