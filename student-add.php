<?php
    require './students.php';

    if(!empty($_POST['add_student'])){
        $data['sv_name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $data['sv_sex'] = isset($_POST['sex']) ? $_POST['sex'] : '';
        $data['sv_birthday'] = isset($_POST['birthday']) ? $_POST['birthday'] : '';


        $errors  = array();
        if(empty($data['sv_name'])){
            $errors['sv_name'] = 'Please enter the student\'s name';
        }

        if(empty($data['sv_sex'])){
            $errors['sv_sex'] = 'Please enter the student\'s gender';
        }

        if(empty($data['sv_birthday'])){
            $errors['sv_birthday'] = 'Please enter the student\'s birthday';
        }

        if(!$errors){
            add_student($data['sv_name'], $data['sv_sex'], $data['sv_birthday']);

            header('Location :student-list.php');
        }
    }
    disconnect_db();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sinh vien</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Add student</h1>
        <a href="student-list.php">Back</a> <br/> <br/>
        <form method="post" action="student-add.php">
            <table width="50%" border ="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo !empty($data['sv_name']) ? $data['sv_name'] : ''; ?>"/>
                        <?php if (!empty($errors['sv_name'])) echo $errors['sv_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <select name="sex">
                            <option value="Nam">Male</option>
                            <option value="Nữ" <?php if (!empty($data['sv_sex']) && $data['sv_sex'] == 'Nữ') echo 'selected'; ?>>Female</option>
                        </select>
                        <?php if (!empty($errors['sv_sex'])) echo $errors['sv_sex']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td>
                        <input type="text" name="birthday" value="<?php echo !empty($data['sv_birthday']) ? $data['sv_birthday'] : ''; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_student" value="Save"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>