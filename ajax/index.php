<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Insert and Retrieve data from MySQL database with ajax</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="wrapper">
            <?php echo $comments; ?>
            <form class="comment_form">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <label for="name">vehicle:</label>
                    <input type="checkbox" id="Bike" name="vehicle[]" value="Bike">
                    <label for="vehicle1"> I have a bike</label><br>
                    <input type="checkbox" id="Car" name="vehicle[]" value="Car">
                    <label for="vehicle2"> I have a car</label><br>
                    <input type="checkbox" id="Boat" name="vehicle[]" value="Boat">
                    <label for="vehicle3"> I have a boat</label><br>
                </div>
                <div>
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" cols="30" rows="5"></textarea>
                </div>
                <button type="button" id="submit_btn">POST</button>
                <button type="button" id="update_btn" style="display: none;">UPDATE</button>
            </form>
        </div>
    </body>
</html>
<script>


</script>
<!-- Add JQuery -->
<script src="jquery.min.js"></script>
<script src="scripts.js"></script>