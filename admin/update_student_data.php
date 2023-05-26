<?php 
    include('sidebar.php');
    include('function.php');

    $con = new mysqli('localhost','root','','rupp_test');

    $id = $_GET['id'];
    $sql_show = "SELECT s.*,c.clsName,c.clslevel,t.teaName,t.teaPhone,en.EnDate
                FROM `students` AS s
                INNER JOIN classes AS c 
                ON s.FK_clsID = c.clsID
                INNER JOIN teachers AS t 
                ON s.FK_teaID = t.teaID
                INNER JOIN enrollment AS en 
                ON s.FK_enroll = en.EnID
                WHERE s.stuId = '$id'";
    $result_show = $con->query($sql_show);
    $row_show = mysqli_fetch_assoc($result_show);
    $male ="";
    $female ="";
    if($row_show['stuSex'] == "Female"){
        $female = 'selected';
    }else{
        $male = 'selected';
    }
    

?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Update Student Data</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="student_update_name" type="text" class="form-control" value="<?php echo $row_show['stuName'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-select" name="student_update_gender">
                                            <option value="Male" <?php echo $male ?>>Male</option>
                                            <option value="Female" <?php echo $female ?> >Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input name="student_update_dob" type="date" class="form-control" value="<?php echo $row_show['stuDOB'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="student_update_phone" type="text" class="form-control" value="<?php echo $row_show['stuPhone'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="student_update_email" type="text" class="form-control" value="<?php echo $row_show['stuEmail'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="student_update_address" type="text" class="form-control" value="<?php echo $row_show['stuAddress'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Teacher</label>
                                        <select class="form-select" name="student_update_teacher">
                                            <option value="Pich Nary">Pich Nary</option>
                                            <option value="Kev Bora">Kev Bora</option>
                                            <option value="Heng Dana">Heng Dana</option>
                                            <option value="Sok Bunlong">Sok Bunlong</option>
                                            <option value="Rany Sonita">Rany Sonita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Class Level</label>
                                        <select class="form-select" name="student_update_class">
                                            <option value="One">One</option>
                                            <option value="Two">Two</option>
                                            <option value="Three">Three</option>
                                            <option value="Four">Four</option>
                                            <option value="Five">Five</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Enrollment Date</label>
                                        <input name="student_update_enroll" type="date" class="form-control" value="<?php echo $row_show['EnDate'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <button name="btn-student-update" type="submit" class="btn btn-primary">Submit</button>
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                    </div>
                                </form>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>