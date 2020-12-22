<?php 
if(isset($_POST['add'])){
    
    $task = mysqli_escape_string($conn, $_POST['task']);
    $insert_task_quary = "INSERT INTO tasks(task_content) VALUES('{$task}')";
    $inset_result = mysqli_query($conn, $insert_task_quary);
}

if(isset($_POST['delete'])){
    $task_id = $_POST['delete'];
    $delete_task = "DELETE FROM tasks WHERE task_id = {$task_id}";
    $delete_result = mysqli_query($conn, $delete_task);
    header("location: index.php");
}

if(isset($_POST['edit'])){
    $task_id = $_POST['edit'];
    $task_edit = mysqli_escape_string($conn, $_POST['task_name']);
    $update_task = "UPDATE tasks SET task_content = '{$task_edit}' WHERE task_id = {$task_id}";
    $update_result = mysqli_query($conn, $update_task);
    header("location: index.php");
}
?>

<div class="container">
    <div class="todolist">
        <div class="add">
            <form action="" method="post">
                <input type="text" class="inputfield" placeholder="Task" name="task" required>
                <button type="submit" class="addbutton" name=add>Add</button>
            </form>
        </div>
        <div class="display">
            <?php 
                $quary = "SELECT * FROM tasks";

                $result = mysqli_query($conn, $quary);

                while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="tasks">

                <input type="checkbox" name="" id="">
                
                <form action="" method="post">
                <input class="taskname" type="text" name="task_name" id="h4" value="<?php echo $row['task_content']?>">
                <button type="submit" name="edit" class="edit" value=<?php echo $row['task_id']?>>Edit</button>
                </form>

                <form action="" method="post">
                <button type="submit" name="delete" class="delete" value=<?php echo $row['task_id']?>>Delete</button>
                </form>


            </div>
            <?php } ?>
        </div>
    </div>
</div>