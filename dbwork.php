<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>My Bookings</title>
</head>

<?php

$con=mysqli_connect('localhost', 'root', 'mysql', 'sdp');
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
<body>
    <div id="page">
        <?php
        session_start();
        echo "<br />";
        echo $_POST['action'];
        echo "<br />";
        if(isset($_POST)){
            var_dump($_POST);
            echo "<br />";
            $_SESSION['a'] = $_POST['action'];
        }
        var_dump($_SESSION);
        echo "<br />";
        ?>
        <h2>DEBUG TOOL</h2>
        <td><label class="field" for="origin">Select your action: </label></td>
        <td><select name="action" id="action" required>
            <option value="Create User">Create User</option>
            <option value="Create Journal">Create Journal</option>
            <option value="Create Entry">Create Entry</option>
            <option value="View User">View User</option>
            <option value="View Journal">View Journal</option>
            <option value="View Entry">View Entry</option>
            <option value="Search User">Search User</option>
            <option value="Search Journal">Search Journal</option>
            <option value="Search Entry">Search Entry</option>
            <option value="Delete User">Delete User</option>
            <option value="Delete Journal">Delete Journal</option>
            <option value="Delete Entry">Delete Entry</option>
        </select>
        <div id = "debugTools">
        </div>

        <a type="button" class="btn post btn-success" action="login">Login</a>
        <a type="button" class="btn post btn-success" action="register">Register</a>
        <a type="button" class="btn post btn-warning" action="111111111">Test Debug! 1</a>
        <a type='button' class='btn post btn-success' id='createUser'>Create User</a>

    </div id="page">
</body>
<script type="text/javascript">


    function addToString(originalString, data){
        console.log(data.additionType + "1");
        console.log(data + "2");
        console.log(originalString + "3");
        if (data.additionType == "button"){
            console.log(originalString);
        }
    }


    $(".post").click(function(){
        var $action = $(this);
        console.log($(this));
        $.post("dbwork.php",
        {
            action: $action.attr('action'),
            yffy: "rssrrs"
        },
        function(data, status){
            $("#page").html(data);
        });
    });

    $("#action").click(function(){
        var actionHTMLString = "";
        var actionHTMLStringTest = "";
        var objectData = {};
        if($("#action").val() == "Create User"){
            actionHTMLString += "Username:<input type='text' id='username' value='Mickey'><br>";
            actionHTMLString += "Password:<input type='text' id='password' value='hunter2'><br><br>";
            actionHTMLString += "<a type='button' class='btn post btn-success' id='createUser'>Create User</a>";
            actionHTMLStringTest = addToString(actionHTMLString, {
                additionType: "textInput",
                id: "username",
                value: "Lachlan",
                text: "Create User"
            });
            objectData = {
                action: "create",
                type: "user",
                username: $("#username").val(),
                password: $("#password").val()
            }
            $(document).on('click', '#createUser', function(){
                createObject(objectData);
            });

        } else if($("#action").val() == "Create Journal"){
            console.log("w");
            actionHTMLString += "Title:<input type='text' id='title' value='Engineering Journal'><br>";
            actionHTMLString += "Collaborators:<input type='text' id='collaborators' value='For Internal engineering use'><br>";
            actionHTMLString += "Description:<input type='text' id='description' value='Lorem Ipsum Blah Blah'><br>";
            actionHTMLString += "Tags:<input type='text' id='tags' value='Urgent Collaborated Important'><br>";
            actionHTMLString += "Attach File:<input type='text' id='file' value='blueprint.png'><br><br>";
            actionHTMLString += "<a class='btn post btn-success' id='createJournal'>Create Journal</a>";
            objectData = {
                action: "create",
                type: "journal",
                title: $("#title").val(),
                collaborators: $("#collaborators").val(),
                description: $("#description").val(),
                tags: $("#tags").val(),
                file: $("#file").val()
            };
            $(document).on('click', '#createJournal', function(){
                createObject(objectData);
            });

            //LOGGING IN
        } else if($("#action").val() == "Login"){
            console.log("w");
            actionHTMLString += "Title:<input type='text' id='title' value='Engineering Journal'><br>";
            actionHTMLString += "Username:<input type='text' id='username'><br>";
            actionHTMLString += "Password:<input type='text' id='password'><br><br>";
            actionHTMLString += "<a class='btn post btn-success' id='createUser'>Create User</a>";
            objectData = {
                action: "read",
                type: "login",
                username: $("#username").val(),
                password: $("#password").val()
            };
            $(document).on('click', '#createUser', function(){
                createObject(objectData);
            }); 


        } else {
            actionHTMLString = "";
        }
        $("#debugTools").html(actionHTMLString);
    });

    function createObject(objectData){
        $.post("databaseHandler.php", objectData, function(data, status){
            console.log(data);
            console.log(status);
        });
    };

</script>
<?php


$sql="SELECT * FROM users";
if ($users=mysqli_query($con,$sql)){
    while ($user=mysqli_fetch_row($users)){
        echo "<br />+";
        printf ("(Username) %s (Password) %s", $user[0], $user[1]);
        $sql="SELECT * FROM journals WHERE creator LIKE '" . $user[0] . "'";
        if ($journals=mysqli_query($con,$sql)){
            while ($journal=mysqli_fetch_row($journals)){
                echo "<br />|---";
                printf ("(Title) %s (Creator) %s", $journal[0], $journal[1]);
                $sql="SELECT * FROM journalEntries WHERE journal LIKE '" . $journal[0] . "' AND creator LIKE '" . $journal[1] . "'";
                if ($journalEntries=mysqli_query($con,$sql)){
                    while ($entry=mysqli_fetch_row($journalEntries)){
                        echo "<br />|---+---";
                        printf ("(Title) %s (Journal) %s (Creator) %s (Content) %s",
                            $entry[0], $entry[1], $entry[2], $entry[3]);
                    }
                }
            }
        }
    }
}

if (1 == 1){
  $sql = "INSERT INTO users (username, password)
  VALUES (" . var_dump(microtime()) . ", 'pass')";


  mysqli_query($con,$sql);
}

mysqli_close($con);
?>
