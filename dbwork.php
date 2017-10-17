<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>My Bookings</title>
</head>
<body>
    <a href="journal.php">Journal</a>
    <h2>LOGIN INFORMATION</h2>
    <div id="loginInformation">
        <?php session_start();
        if(isset($_SESSION['currentUser'])) echo $_SESSION['currentUser'] . " is logged in";
        else echo "No one is currently logged in"; 
        $user_actions = array("Login", "Log Out", "Become Admin", "Create User", "Create Journal", "Create Entry", "View Users", "View Journal", "View Entry", "Search User", "Search Journal", "Search Entry", "Delete User", "Delete Journal", "Delete Entry");
        ?>
    </div>
    <h2>DEBUG TOOL</h2>
    <label class="field" for="origin">Select your action: </label>
    <select name="action" id="action" required>
        <option value="Null">Pick an action...</option>
        <?php foreach ($user_actions as $action) {
            echo "<option value='" . $action . "'>" . $action . "</option>";            
        } ?>
    </select>
    <div id = "debugTools"></div>
    <h2>ITEM TABLE</h2>
    <div id = "itemTable"></div>
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
        table = "<table class='table table-striped'><thead><tr>";
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
        $("#itemTable").html(table);
    }

    function displayUsers(data){
        console.log("DISPLAYING USERS: " + data);
        console.log(data);
        console.log(data.data);
        creds = data.split("|| ||");
        for (var i = rows.length - 1; i >= 0; i--) {
            data[i][0], data[i][1] = rows[i].split("|||");
        }
        table = "<table class='table table-striped'>";
        table += "<thead>";
        table += "<tr>";
        table += "<th>Title</th>";
        table += "<th>Creator</th>";
        table += "</tr>";
        table += "</thead>";
        table += "<tbody>";
        for (i = rows.length - 1; i >= 1; i--) {
            table += "<tr>";
            table += "<td>" + data[i][0] + "</td>";
            table += "<td>" + data[i][1] + "</td>";
            table += "</tr>";

        }
        table += "</tbody>";
        table += "</table>";

        $("#itemTable").html(table);
    }

    function addToString(data){
        if (data.additionType == "button"){
            return "<a type='button' class='" + data.class + "' id='" + data.id + "'>" + data.text + "</a>";
        } else if (data.additionType == "textInput"){
            return data.text + ":<input type='text' id='" + data.id + "' value='" + data.value + "'><br />";
        } else if (data.additionType == "div"){
            return "<div class='" + data.class + "'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Warning!</strong> This alert box could indicate a warning that might need attention.</div><br />";
        }
    }



    $("#action").change(function(){
        var actionHTMLString = "";
        var actionHTMLStringTest = "";
        var objectData = {};
        if($("#action").val() == "Create User"){
            input_username = {additionType: "textInput", id: "username", text: "Username", value: "Lachlan"};
            input_password = {additionType: "textInput", id: "password", text: "Password", value: "hunter2"};
            input_submit = {additionType: "button", id: "createUser", text: "Create User", class: "btn post btn-success"};
            actionHTMLString += addToString(input_username);
            actionHTMLString += addToString(input_password);
            actionHTMLString += addToString(input_submit);
            $(document).on('click', '#createUser', function(){
                objectData = {
                    action: "create",
                    type: "user",
                    username: $("#username").val(),
                    password: $("#password").val()
                };
                createObject(objectData);
            });
        } else if($("#action").val() == "Create Journal"){
            input_title = {additionType: "textInput", id: "title", text: "Title", value: "Engineering Journal"};
            actionHTMLString += "Title:<input type='text' id='title' value='Engineering Journal'><br>";
            actionHTMLString += "Creation Date:<input type='date' id='status'><br>";
            // actionHTMLString += "Status:<input type='text' id='status'<br>";
            // actionHTMLString += "Collaborators:<input type='text' id='creationDate' value='For Internal engineering use'><br>";
            // actionHTMLString += "Description:<input type='text' id='description' value='Lorem Ipsum Blah Blah'><br>";
            // actionHTMLString += "Tags:<input type='text' id='tags' value='Urgent Collaborated Important'><br>";
            // actionHTMLString += "Attach File:<input type='text' id='file' value='blueprint.png'><br><br>";
            // actionHTMLString += "<a class='btn post btn-success' id='createJournal'>Create Journal</a>";

            $(document).on('click', '#createJournal', function(){
                objectData = {
                    action: "create",
                    type: "journal",
                    title: $("#title").val(),
                    creationDate: $("#creationDate").val(),
                    status: $("#status").val()
                    //ollaborators: $("#collaborators").val(),
                    //description: $("#description").val(),
                    //tags: $("#tags").val(),
                    //file: $("#file").val()
                };
                createObject(objectData);
            });

        } else if($("#action").val() == "View Users"){
            input_title = {additionType: "textOutput", id: "information", text: "Here are your users: "};
            objectData = {
                action: "read",
                type: "user"
            };
            users = createObject(objectData, "#div_itemTable");
            console.log(users);
            // displayUsers(users); REMOVED THIS LINE AND CHANGED NOTHING BUT NOW THE PROGRAM WORKS... LOOK INTO THIS FUTURE CODER
            console.log(users + " |2|");

            //Viewing journals
        } else if($("#action").val() == "View Journal"){
            input_title = {additionType: "textOutput", id: "information", text: "Here are your journals: "};
            objectData = {
                action: "read",
                type: "journal"
            };
            journals = createObject(objectData, "#div_itemTable");
            console.log(journals + " |2|");

            //LOGGING IN
        } else if($("#action").val() == "Login"){
            actionHTMLString += "Username:<input type='text' id='username'><br>";
            actionHTMLString += "Password:<input type='text' id='password'><br><br>";
            actionHTMLString += "<a class='btn post btn-success' id='login'>Login</a>";
            
            $(document).on('click', '#login', function(){
                objectData = {
                    action: "read",
                    type: "login",
                    username: $("#username").val(),
                    password: $("#password").val()
                };
                createObject(objectData);
            }); 

            //LOGOUT LOGOUT LOGOUT LOGOUT
        } else if($("#action").val() == "Log Out"){
            input_logout = {additionType: "button", id: "logout", text: "Logout", class: "btn btn-danger"};
            actionHTMLString += addToString(input_logout);
            

            $.post("sessionHandler.php", {action: "destroy"}, function(data, status){
                console.log("DATA: " + data);
                console.log("STATUS: " + status);
                $("#loginInformation").load(location.href + " #loginInformation>*", "");
                console.log("Test: |4|");
            });



        } else if($("#action").val() == "Become Admin"){
            output_adminWarning = {additionType: "div", class: "alert alert-danger alert-dismissable fade in"};
            actionHTMLString += addToString(output_adminWarning);
            objectData = {
                action: "read",
                type: "login",
                username: "admin"
            };
            createObject(objectData);
        } else {
            actionHTMLString = "";
        }
        $("#debugTools").html(actionHTMLString);
    });

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

</script>
    <script type="text/javascript">
        function validateSearchType(){
            var type = document.getElementsByName("search_type");
            var ischecked_method = false;
            for ( var i = 0; i < type.length; i++) {
                if(type[i].checked) {
                    ischecked_method = true;
                    return true;
                }
            }
            alert("Please select a search type!");
            return false;
        }
        function validateSelectedFlight(){
            var type = document.getElementsByName("flight");
            var ischecked_method = false;
            for ( var i = 0; i < type.length; i++) {
                if(type[i].checked) {
                    ischecked_method = true;
                    return true;
                }
            }
            alert("Please select a flight to continue!");
            return false;
        }
    </script>
    <script type="text/javascript">
        $('.row-select tr').click(function(event) {
            $(".row-select tr").removeClass("selected");
            $(this).toggleClass('selected');
            $(this).find('td input:radio').prop('checked', true);
        });
    </script>
    </html>
