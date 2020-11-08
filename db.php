<?php

    $db = "a9929963_scpdb";
    $user = "a9929963_scpagent";
    $pw = "Toiohomai1234";
    
    $connection = new mysqli('localhost', $user, $pw, $db);
    
    $record = $connection->query("select * from pages") or die($connection->error);
    
    
    
    
    
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        $del = "DELETE FROM pages
                WHERE pages . id = $id";
        
        if ($connection->query($del) === TRUE)
        {
            echo"<p> record was deleted... <a href='index.php'><u>Home</u></a> </p>";
        }
        else
        {
            echo"<p> Failure to delete... <a href='index.php'><u>Home</u></a></p>";
            
            echo"<p>{$connection->error}</p>";
            
            
        }
    }
    
    
    if(isset($_POST['update']))
    {
        $id=$_POST['id'];
        $pg = $_POST['pg'];
        $iid = $_POST['iid'];
        $class = $_POST['class'];
        
        $description = $_POST['description'];
        $testimony = $_POST['testimony'];
        $warnings = $_POST['warnings'];
        
        $images = $_POST['images'];
        
        $update = "
              UPDATE pages SET pg='$pg', iid='$iid', class='$class', description='$description', testimony='$testimony', warnings='$warnings', images='$images'
              WHERE id='$id'
                  ";
                  
                  
        
        if($connection->query($update) === TRUE)
        {
            echo "<h1>Record Updated</h1>";
            echo "<p><a href='index.php' class='btn btn-success'>Home</a></p>";
        }
        else
        {
            echo "<h1>Error: Record not updated</h1>";
            echo "<p>{$connection->error}</p>";
            echo "<p><a href='index.php' class='btn btn-danger'>Home</a></p>";
        }
    }
    
    
    
    if(isset($_POST['submit']))
    {
        $pg = $_POST['id'];
        $iid = $_POST['id'];
        $class = $_POST['class'];
        $description = $_POST['p1'];
        $testimony = $_POST['p2'];
        $warnings = $_POST['p3'];
        $images = $_POST['images'];
        
        $sql = "insert into pages(`pg`, `iid`, `class`, `description`, `testimony`, `warnings`, `images`)
        values('$pg', '$iid', '$class', '$description', '$testimony', '$warnings', '$images')";
        
        if($connection->query($sql) === TRUE)
        {
            echo "<h1>Record added</h1>";
            echo "<p><a href='index.php'>Home</a></p>";
        }
        else
        {
            echo "<p><a href=index.php>Home</a></p>";
            echo "<h1>Error: Record not added</h1>";
            echo "<p>{$connection->error}</p>";
            
        }
    }
    
    
    
    
    

?>