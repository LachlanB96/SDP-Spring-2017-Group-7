<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>My Bookings</title>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" id="nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">TheRedBook</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="home.php" target="_parent">Index</a></li>
                <li><a href="search_flights.php" target="_parent">Search Journal</a></li>
                <li><a href="my_bookings.php" target="_parent">Account Settings</a></li>
                <li><a href="about.php" target="_parent">About</a></li>
                <li><a href="contact.php" target="_parent">Contact</a></li>
                <li><a href="contact.php" target="_parent" style="float: right;">Logged in: Wilder12</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron">
            <h1>Wilder's Engineering Journal #3</h1>
            <?php
            session_start();
            ?>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date Created</th>
                            <th>Pages</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>20/08/2017</td>
                            <td>5</td>
                            <td>Active</td>
                        </tr>
                    </tbody>
                </table>
                <?php if($ticket_qty == 0){ ?>
                <h2>Quick Page Navigation:</h2>
                <div class="btn-group-wrap" align="center">
                    <?php for ($x = 1; $x <= 5; $x++) { ?>
                    <a class="btn btn-info" href="?tickets=<?=$x?>" role="button"><?=$x?></a>
                    <?php } ?>
                </div>
                <br>
                <h2>Quick Tag Search:</h2>
                <div class="btn-group-wrap" align="center">
                    <a class="btn btn-info" href="?tickets=<?=$x?>" role="button">Dangerous</a>
                    <a class="btn btn-info" href="?tickets=<?=$x?>" role="button">Collaborator</a>
                    <a class="btn btn-info" href="?tickets=<?=$x?>" role="button">Urgent</a>
                </div>
                <br>
                <h2>Journal Actions:</h2>
                <a type="button" class="btn btn-warning btn-outline btn-cancel" href="search_flights.php">New Search</a>
                <a type="button" href="javascript:;" onclick="alert('Please Select Ticket Amount!')" class="btn btn-success btn-outline btn-confirm">Create New Journal</a>
                <a type="button" href="javascript:;" onclick="alert('Please Select Ticket Amount!')" class="btn btn-danger btn-outline btn-confirm">Delete Journal</a>
                <?php } 
                else{ ?>
                <h2>Quantity of Tickets:</h2>
                <div class="btn-group-wrap" align="center">
                    <?php for ($x = 1; $x <= 5; $x++) { ?>
                    <a class="btn btn-<?= $class = ($ticket_qty == $x ? "success" :  "default")?>" href="?tickets=<?=$x?>" role="button"><?=$x?></a>
                    <?php } ?>
                </div>
                <br>
                <p>Please tick the greyed tick icons when applicable to the customers ticket:</p>
                <form name="tickets" method="post" action="make_booking.php">
                    <table class="table">
                        <?php for ($x = 1; $x <= $ticket_qty; $x++) { ?>
                        <tr>
                            <td>Ticket Number <input type="hidden" name="ticket[<?=$x?>][isValid]" value="true"><?= (string) $x?>:</td>
                            <td>Is a child: <label class="cb"><input type="checkbox" name="ticket[<?=$x?>][isChild]"><span class="glyphicon glyphicon-ok"></span></label></td>
                            <td>Uses a wheelchair: <label class="cb"><input type="checkbox" name="ticket[<?=$x?>][isDisabled]"><span class="glyphicon glyphicon-ok"></label></td>
                            <td>Needs special diet: <label class="cb"><input type="checkbox" name="ticket[<?=$x?>][isDietry]"><span class="glyphicon glyphicon-ok"></label></td>
                        </tr>
                        <?php } ?>
                    </table> 
                    <h2>Price of Flight: $<?= $ticket_qty * $a_row[price]?></h2>
                    <a type="button" class="btn btn-warning btn-outline btn-cancel" href="search_flights.php">New Search</a>
                    <input type="submit" value="Add to Bookings" class="btn btn-success btn-outline btn-confirm">
                </form>
                <?php } ?>
            </div>
        </div>
        <script type="text/javascript">
            $(document).on('click', 'td', function(){
                var target = $(this).find('input[type="checkbox"]');
                target.prop('checked', !target.prop('checked'));
            });
            $(document).on('click', 'td', function(){
                var target = $(this).find('input[type="checkbox"]');
                target.prop('checked', !target.prop('checked'));
            });
        </script>
    </body>
    </html> 



