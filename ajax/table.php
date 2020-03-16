<?php 
ini_set('display_errors','on');
include('server.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Table</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    </head>
    <body>

        <table id="myTable">
            <thead>
                <tr>
                    <th>Col1</th>
                    <th>Col2</th>
                    <th>Col3</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Retrieve comments from database
                $sql = "SELECT * FROM comments";
                $result = mysqli_query($conn, $sql);
                $comments = '<div id="display_area">';
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
<!-- Add JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
