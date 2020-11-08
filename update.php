<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Update record</title>
  </head>
  <body class="container">
    <h1>Update record</h1>
    
    <?php
    
        include 'db.php';
        
        $id = $_GET['update'];
        
        $record = $connection->query("select * from pages where id='$id'") or die($connection->error());
        
        $row = $record->fetch_assoc();
    ?>
    <div class = "jumbotron" style= "background-image: url(images/SCP_Foundation_(emblem).svg); background-position:center; background-repeat:no-repeat; background-size:cover; position:relative;">
    <form class="form-group" action="db.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>ID:(page title)</label>
        <br>
        <input type="text" name="pg" placeholder="e.g: SCP-1111" class="form-control" value="<?php echo $row['pg']; ?>">
        <br>
        <label>Name:(heading)</label>
        <br>
        <input type="text" name="iid" placeholder="Object ID" class="form-control" value="<?php echo $row['iid']; ?>">
        <br>
        <label>Class:</label>
        <br>
        <input type="text" name="class" placeholder="Class of object" class="form-control" value="<?php echo $row['class']; ?>">
        <br>
        <label>Description:</label>
        <br>
        <input type="text" name="description" placeholder="Description of object" class="form-control" value="<?php echo $row['description']; ?>">
        <br>
        <label>Information:</label>
        <br>
        <input type="text" name="testimony" placeholder="Addendums/Interviews/Testimony" class="form-control" value="<?php echo $row['testimony']; ?>">
        <br>
        <label>Warnings:</label>
        <br>
        <input type="text" name="warnings" placeholder="Containment Warnings" class="form-control" value="<?php echo $row['warnings']; ?>">
        <br>
        <label>Update image address:</label>
        <br>
        <input type="text" name="images" placeholder="e.g images/pic.jpg" class="form-control" value="<?php echo $row['images']; ?>">
        <br>
     <div class="container">
     <div class="row">
       <div class="col-xs-2">
        <input type="submit" name="update" class="btn btn-primary" value="Update">
       </div>
       <div class="col-xs-4">
        <p><a href="index.php" class="btn btn-primary" style ="margin-left: 10px">Cancel</a></p>
       </div>
     </div>
    </div>
    </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>