<?php 
    include('data.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link rel="stylesheet" type="text/css" href="index.css?v=<?php echo time(); ?>"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>My TODO list with PHP & MySQL</title>
    </head>
<body>
    <div class="header">
        TodoList
    </div>
    <div class="main">
        <form method="post" action="index.php" class="taskForm">
            <input 
                type="text" 
                name="description" 
                placeholder="What needs to be done?" 
            />
            <button 
                type="submit" 
                name="addItem" 
                class="subBtn"
            >
                Add Item
            </button>
        </form>
        <div class="tasks">
            <?php 
                $i=1;
                $tasks=mysqli_query($link,"SELECT * FROM tasks");
                while($row = mysqli_fetch_array($tasks)){?>
                    <table>
                        <tr>
                            <td id="taskId"><?php echo $i.'.';?></td>
                            <td id="taskDesc"><?php echo $row['Descriptions'];?></td>
                            <td id="taskDate"><?php echo $row['Created'];?></td>
                            <td id="trash">
                                <a href="index.php?del=<?php echo $row['id']?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </table>
                <?php 
                $i= $i + 1;
                } ?>
        </div>
    </div>
</body>
</html>