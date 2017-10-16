<html>
<head>
	<?php
	include("headers.php");
	?>
</head>
<body>
	<?php
	include("navigation.php");
	var_dump($_SESSION);
	?>
			<?php
			session_start(); 
			$journalName = "Planning";
			?>
			<h3>New Entry for <?=$journalName?></h3>
			<p>Title* <input type="text" name="username" value="default" id="inputUsername"></p><br>
			<p>Collaborators <input type="text" name="username" value="default" id="inputUsername"></p><br>
			<p>Description <textarea rows="4" cols="40" id="contents"></textarea></p><br>
			<p>Tags <input type="text" name="username" value="default" id="inputUsername"></p>
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<p>Select image to upload:<input type="file" name="fileToUpload" id="fileToUpload"><input type="submit" value="Upload Image" name="submit"></p>
			</form>
			<a type="button" class="btn btn-warning" id="viewJournal">Go Back</a>
            <a type="button" class="btn btn-success" id="createJournal">Create</a>
	<script type="text/javascript">
		$('#createJournal').on('click', function() {
			$.post("journalHandler.php",
            {
                action: "write",
                type: "entry",
                journalName: "test1",
                creator: "default",
                contents: $('#contents').val(),
                entryName: $('#inputUsername').val()
            },
            function(data, status){
                console.log(data);
                console.log(status);
            });
		});
		// $('#upload').on('click', function() {
		// 	var file_data = $('#fileToUpload').prop('files')[0];   
		// 	var form_data = new FormData();                  
		// 	form_data.append('file', file_data);
		// 	alert(form_data);                             
		// 	$.ajax({
		// 		url: 'upload.php',
		// 		cache: false,
		// 		contentType: false,
		// 		processData: false,
		// 		data: form_data,                         
		// 		type: 'post',
		// 		success: function(php_script_response){
		// 			alert(php_script_response);
		// 		}
		// 	});
		// });
	</script>
</body>
</html>