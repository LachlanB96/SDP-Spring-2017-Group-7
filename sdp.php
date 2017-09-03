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

    <div class="container">
        <div class="jumbotron">
            <h1>Wilder Journal</h1>
            <?php session_start();?>
                <div id="journalsTable"></div>
                <a type="button" class="btn btn-warning btn-block" id="viewJournal">View Selected Journal</a>
                <a type="button" class="btn btn-success btn-block" id="createJournal">Create Journal</a>
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
        
        $(document).ready(function(){
            $.post("readDB.php",
            {
                action: "read",
                table: "journals"
            },
            function(data, status){
                var rowArray = data.split('|||');
                var table = "<table class='table'><thead><tr><th>Title</th><th>Date Created</th><th>Entries</th></tr></thead><tbody class='row-select'><div class='btn-group' data-toggle='buttons'>";
                for (var i = 0; i < rowArray.length - 1; i++) {
                    var cellData = rowArray[i].split('|');
                    table = table + "<tr><td>" + cellData[0] + "</td><td>" + cellData[1] +"</td>";
                    table = table + "<td style='display: none;'><input type='radio' name='flight' id='flight_choice' value='1'></td></tr>"; 
                }
                table = table + "</tbody></table>";
                $("#journalsTable").html(table);
                $('.row-select tr').click(function(event) {
                    $(".row-select tr").removeClass("selected");
                    $(this).toggleClass('selected');
                    $(this).find('td input:radio').prop('checked', true);
                });
            });
        });
        $("#viewJournal").click(function(){
            console.log($('.selected'));
            console.log($('.selected').text());
            window.location.href = "viewJournal.php";
        });
    </script>
</body>
</html>



