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
								<?=$_SESSION['currentUser']?>'s Journal
							</h1>
						</div>
						<div id="journalTable"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">

						<a type="button" class="btn btn-default" href="createJournal.php">
							Create Journal
						</a>
					</div>
					<div class="col-md-2">
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
        table += "<th>Title</th>";
        table += "<th>Creator</th>";
        table += "</tr></thead><tbody>";
        for (i = rows.length - 1; i >= 0; i--) {
        	table += "<tr><td>";
        	table += cells[i][0];
        	table += "</td><td>";
        	table += cells[i][1];
        	table += "</td></tr>";
        }
        table += "</tbody></table>";
        $("#journalTable").html(table);
    }

    function createObject(objectData, whatToUpdate){
    	console.log(" |7|");
    	var returnData;
    	$.post("databaseHandler.php", objectData, function(data, status){
    		console.log("DATA: " + data);
    		console.log("STATUS:dd " + status);
    		if(whatToUpdate == "#div_itemTable"){
    			console.log("|10 DATA: " + data);
    			createTable(data);
            //$("#div_itemTable").html(data)
            console.log(" |6|");
        }
        $("#userTools").load(location.href + " #userTools>*", "");
        $("#loginInformation").load(location.href + " #loginInformation>*", "");
    });
    	console.log(returnData + " |1|");
    	return returnData;
    }

    $(document).ready(function(){
    	input_title = {additionType: "textOutput", id: "information", text: "Here are your journals: "};
    	objectData = {
    		action: "read",
    		type: "journal"
    	};
    	journals = createObject(objectData, "#div_itemTable");

    });
</script>
</html>