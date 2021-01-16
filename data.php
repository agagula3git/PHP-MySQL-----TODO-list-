<?php
    $link = mysqli_connect("localhost","root","agagula3","todo");
    /*mysqli_select_db("todo",$link);*/
    
    if($link){
        if(!mysqli_select_db($link,"todo")){
            exit("Datebase with that name does not exist!");
        }
    }else{
        exit("You can not connect on MySql server!");
    }

    if(isset($_POST['addItem'])){
        if(empty($_POST['description'])){
            $err="You must fill in the task!";
        }else{
            $description=$_POST['description'];
            $date= date('Y-m-d');
            $sql="INSERT INTO tasks (descriptions, created) VALUES ('$description', '$date')";
            mysqli_query($link,$sql);
            header('location: index.php');
        }
    }

    if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($link,"DELETE FROM tasks WHERE id=".$id);
        header('location: index.php');
    }
?>