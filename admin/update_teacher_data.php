<?php 
    include('sidebar.php');
    include('function.php');

    $tea_id = $_GET['id'];
    $conn = new mysqli('localhost','root','','rupp_test');
    $sql = "SELECT * FROM `teachers` WHERE `teaID`='$tea_id'";
    $rs = $conn->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $male = "";
    $female = "";
    if($row['teaSex'] == 'Female'){
        $female = 'selected';
    }else{
        $male = 'selected';
    }
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Update New Teacher</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Teacher Name</label>
                                        <input value="<?php echo $row['teaName'] ?>"  type="text" class="form-control" name="teacher_name_update">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-select" name="teacher_gender_update">
                                            <option value="Male" <?php echo $male ?> >Male</option>
                                            <option value="Female" <?php echo $female ?> >Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input value="<?php echo $row['teaSalary'] ?>" type="text" class="form-control" name="teacher_salary_update">
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input value="<?php echo $row['teaSubject'] ?>" type="text" class="form-control" name="teacher_subject_update">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input value="<?php echo $row['teaPhone'] ?>" type="text" class="form-control" name="teacher_phone_update">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input value="<?php echo $row['teaEmail'] ?>" type="text" class="form-control" name="teacher_email_update">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input value="<?php echo $row['teaAddress'] ?>" type="text" class="form-control" name="teacher_address_update">
                                    </div>
                                    <div class="form-group">
                                        <button name="btn_update_teacher" type="submit" class="btn btn-primary">Submit</button>
                                        <a href="view-teacher.php" class="btn btn-danger">Cancel</a>
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