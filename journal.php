<html>
<head>
	<?php
	include("headers.php");
	session_start();
	include("sessionCheck.php");
	?>
</head>
<body>
	<?php include("navigation.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-2">
								<p>
									Tag Search
								</p>
							</div>
							<div class="col-md-10">
								<button type="button" class="btn">
									Urgent
								</button>

								<button type="button" class="btn btn-default">
									Important
								</button>

								<button type="button" class="btn btn-default">
									Notes
								</button>

							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-2">
								<p>
									Word Search
								</p>
							</div>
							<div class="col-md-6">
								<input type="text" id="input_wordSearch">
							</div>
							<div class="col-md-2">
								<a type="button" class="btn btn-default" id="submit_wordSearch">
									Search Journals
								</a>
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
    		type: "journal",
    		search: $("#input_wordSearch").val()
    	};
		$.post("databaseHandler.php", objectData, function(data, status){
			console.log("DATA: " + data);
			console.log("STATUS:dd " + status);
			console.log(" |6|");
			createTable(data);
		});
	});

	$("#journalTable").on("click", "tr", function(event){
		console.log($(this)["0"].id);
		var url = 'journalEntries.php';
		var form = $('<form action="' + url + '" method="post">' +
			'<input type="text" name="currentJournal" value="' + $(this)["0"].id + '" />' +
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
        table += "<th>Title</th>";
        table += "<th>Creator</th>";
        table += "</tr></thead><tbody>";
        for (i = rows.length - 1; i >= 0; i--) {
        	table += "<tr id='"+cells[i][0]+"'><td>";
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
    	objectData = {
    		action: "read",
    		type: "journal"
    	};
    	journals = createObject(objectData, "#div_itemTable");

    });
</script>
</html>