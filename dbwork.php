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
    <a type="button" class="btn post" action="test">Click me!!</a>
    <a type="button" class="btn post btn-warning" action="111111111">Click me! 1</a>
    </div id="page">
</body>
<script type="text/javascript">
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
                $sql="SELECT * FROM journalEntries WHERE journal LIKE '" . $journal[0] . "'";
                if ($journalEntries=mysqli_query($con,$sql)){
                    while ($entry=mysqli_fetch_row($journalEntries)){
                        echo "<br />|---+---";
                        printf ("(Title) %s (Journal) %s (Content) %s", $entry[0], $entry[1], $entry[3]);
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
