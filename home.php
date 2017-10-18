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
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1 class="text-center">
                                Welcome to The Redbook!
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h3 class="text-center">
                                Please sign in or create an account to access all the features The Redbook has to offer!
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <a class='btn btn-success two-options' id='signin'>Sign In</a>
                    </div>
                    <div class="col-md-5">
                        <a class='btn btn-primary two-options' id='register'>Register Account</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 offset-md-3">
                        <div class="row">
                            <h3>Sign In</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <p>Username:</p>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="input_username" placeholder="Username" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <p>Password:</p>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="input_password" placeholder="Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 offset-md-3">
                                <a type="button" class="btn btn-success" id="signin">Sign in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">



    $(document).on('click', '#signin', function(){
        console.log($("#input_username").val());
        $.post("databaseHandler.php",
        {
            action: "read",
            type: "login",
            username: $("#input_username").val(),
            password: $("#input_password").val()
        }, function(data, status){
            console.log("DATA: " + data);
            console.log("STATUS:dd " + status);
            console.log(data.length);
            if(data.length == 0){
                console.log("Incorrect")
            } else {
                window.location.href = "journal.php";
            }
        });
    });


        $(document).ready(function(){
            console.log("test2");
            $("#signin").click(function(event) {
                console.log("test1");
            });
        });
    </script>
    </html>