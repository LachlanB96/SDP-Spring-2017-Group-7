<?php

$con=mysqli_connect('localhost', 'root', 'mysql', 'sdp');
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

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

mysqli_close($con);
?>
