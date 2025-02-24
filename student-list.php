<?php
    require './students.php';
    $students = get_all_student();
    disconnect_db();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>List students</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>List students</h1>
        <a href="student-add.php">Add student</a> <br/> <br/>
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Gender</td>
                <td>Birthday</td>
                <td>Options</td>
            </tr>
            <?php foreach ($students as $item){ ?>
            <tr>
                <td><?php echo $item['sv_id']; ?></td>
                <td><?php echo $item['sv_name']; ?></td>
                <td><?php echo $item['sv_sex']; ?></td>
                <td><?php echo $item['sv_birthday']; ?></td>
                <td>
                    <form method="post" action="student-delete.php">
                        <input onclick="window.location = 'student-edit.php?id=<?php echo $item['sv_id']; ?>'" type="button" value="Edit"/>
                        <input type="hidden" name="id" value="<?php echo $item['sv_id']; ?>"/>
                        <input onclick="return confirm('Are you sure?');" type="submit" name="delete" value="Delete"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>