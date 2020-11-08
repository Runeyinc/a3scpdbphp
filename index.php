<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>SCP DATABASE</title>
  </head>
  <body class="container">
      
      <?php include 'db.php'; ?>
      
      <div class="row">
          <div class="col">
              <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
               <a class="navbar-brand" href="index.php">SCP</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
      
      
      
      
           <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Database</a>
           <div class="dropdown-menu">
           <?php foreach($record as $menu): ?>
           <a class="dropdown-item" href="index.php?page='<?php echo $menu['pg']; ?>'" class="nav-link"><?php echo $menu['pg']; ?></a>
           <?php endforeach; ?>
           </div>
           </li>
           <li class="nav-item">
           <a class="nav-link" href="create.php">Create new Record</a>
           </li>
           </ul>
    
  </div>
</nav>
          </div>
      </div>
      
      <div class="row">
          <div class="col">
              <?php 
                    
                    if(isset($_GET['page']))
                    {
                        $pg = trim($_GET['page'], "'");
                        
                        // run sql query based on our $pg value
                        $record = $connection->query("select * from pages where pg='$pg'") or die($connection->error());
                        
                        $single = $record->fetch_assoc();
                        
                        $iid = $single['iid'];
                        $class = $single['class'];
                        $description = $single['description'];
                        $testimony = $single['testimony'];
                        $warnings = $single['warnings'];
                        $images = $single['images'];
                        
                        $id = $single['id'];
                        
                         $update = "update.php?update=" . $id;
                         $delete = "db.php?delete=" . $id;
                         
                         
        
                        
                        
                       
                        
                        echo "
                        <div class='jumbotron'>
                        <img  src = '$images' class='rounded float-right' style='height:280px; width:250px'>
                         <h1 class='display-3'>{$iid}</h1>
                         
                        
                        <div class='row'>
                        <div class='col-xs-2'>
                        <p><a href='{$update}' class='btn btn-outline-info' style= 'margin-left:12%'>Update</a><p>
                        </div>
                        <div class='col-xs-4'>
                        <p><a href='{$delete}' class='btn btn-outline-danger' style= 'margin-left:18%'>Delete</a><p>
                        </div>
                        <div class='col-xs-6'>
                        <h2  style= 'margin-left:28%' >Class:&nbsp;{$class}</h2>
                        </div>
                        </div>
                      
                        
                        
                        
                        
                        
                        <p class='text-danger'>{$warnings}</p>
                        <p>{$description}</p>
                        <p class='text-secondary'>{$testimony}</p>
                        
                        
                        <br>
                        <div class='row'>
                        <div class='col-xs-2'>
                        <p><a href='{$update}' class='btn btn-outline-info'style= 'margin-left:12%'>Update</a><p>
                        </div>
                        <div class='col-xs-4'>
                        <p><a href='{$delete}' class='btn btn-outline-danger' style= 'margin-left:18%' >Delete</a><p>
                        </div>
                      
                        </div>
                        
                        ";
                        
                    }
                    else
                    {
                        
                        echo "
                        <div class='jumbotron'style= 'background-image: url(images/SCP_Foundation_(emblem).svg); background-position:center; background-repeat:no-repeat; background-size:cover; position:relative;'>
                         <div class='alert alert-dismissible alert-success'>
                         <button type='button' class='close' data-dismiss='alert'>&times;</button>
                         <strong>Welcome Agent!</strong> You have qualified as a beta tester on our newly developed field database. <a href='#' class='alert-link'></a>
                        </div>
                        <img style=' width: 100%; height: 100%;' src = 'images/SCP_Foundation_(emblem).svg'>
                        </div> ";
                    }
              
              ?>
          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>