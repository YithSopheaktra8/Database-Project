<?php 

    $connect = new mysqli('localhost','root','','rupp_test');
    
    function view_student(){
        global $connect;
        $sql = "SELECT * FROM `students`";
        $result = $connect->query($sql);
        
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['stuId'];
            $name = $row['stuName'];
            $sex = $row['stuSex'];
            $url_id = $id;
            echo '
            
            <tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$sex.'</td>
                <td width="150px">
                    <a href="view-student-detail.php?id='.$url_id.'" class="btn btn-success">View</a>
                    <a href="update_student_data.php?id='.$url_id.'" class="btn btn-primary">Update</a>
                    <button type="button" id="remove_student"  class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Remove
                    </button>
                </td>
            </tr>

            ';
        }
    }

    function add_student(){
        global $connect;
        if(isset($_POST['btn-student-submit'])){
            $stu_name = $_POST['student_name'];
            $stu_gender = $_POST['student_gender'];
            $stu_dob = $_POST['student_dob'];
            $stu_phone = $_POST['student_phone'];
            $stu_email = $_POST['student_email'];
            $stu_address = $_POST['student_address'];
            $tea_name = $_POST['student_teacher'];
            $class_level = $_POST['student_class'];
            $stu_enroll = $_POST['student_enroll'];
            $stu_enroll = date('Ymd');


            // get data from table teacher
            $tea_sql = "SELECT * FROM `teachers`";
            $tea_result = $connect->query($tea_sql);
            while($tea_row = mysqli_fetch_assoc($tea_result)){
                if($tea_name == $tea_row['teaName']){
                    $tea_id = $tea_row['teaID'];
                }
            }
            

            // get data from table classes
            $class_sql = "SELECT * FROM `classes`";
            $class_result = $connect->query($class_sql);
            while($class_row = mysqli_fetch_assoc($class_result)){
                if($class_level == $class_row['clslevel']){
                    $class_id = $class_row['clsID'];
                }
            }
            
            
            
            
            // insert into student
            if(!empty($stu_name) && !empty($stu_gender) && !empty($stu_dob) && !empty($stu_phone) && !empty($stu_email) && !empty($stu_address) && !empty($tea_name) && !empty($class_level) && !empty($stu_enroll) ){

                // insert into enroll
                $enroll = "INSERT INTO `enrollment`(`EnDate`) VALUES ('$stu_enroll')";
                $en_rs = $connect->query($enroll);

                    // get enroll data
                $get_enroll = "SELECT * FROM `enrollment`";
                $rs_en = $connect->query($get_enroll);
                while($en_row = mysqli_fetch_assoc($rs_en)){
                    $enroll_ID = $en_row['EnID'];
                }

                
                    $sql_stu = "INSERT INTO `students`(`stuName`, `stuSex`, `stuDOB`, `stuPhone`, `stuEmail`, `stuAddress`, `FK_teaID`, `FK_clsID`, `FK_enroll`)
                    VALUES ('$stu_name','$stu_gender','$stu_dob','$stu_phone','$stu_email','$stu_address','$tea_id','$class_id','$enroll_ID')";

                $rs = $connect->query($sql_stu);
                if($rs){
                    echo '
                    
                    <script>
                    
                    $(document).ready(function(){
                        swal({
                                title: "SUCCESS",
                                text: "Scuessfully Insert",
                                icon: "success",
                            });
                        
                    });

                    </script>
                    
                ';
                }else{
                    echo '
                    
                    <script>
                    
                    $(document).ready(function(){
                        swal({
                                title: "FAILED",
                                text: "Failed to Insert",
                                icon: "error",
                            });
                        
                    });

                    </script>
                    
                ';
                }
                
            }else{
                echo "error";
            }
        }
    }

    add_student();


    function remove_student(){
        global $connect;
        if(isset($_POST['btn_remove_student'])){
            $id = $_POST['remove_id'];
            $sql = "DELETE FROM `students` WHERE `stuId`='$id'";
            $rs = $connect->query($sql);
            if($rs){
                echo '
                    
                    <script>
                    
                    $(document).ready(function(){
                        swal({
                                title: "SUCCESS",
                                text: "Scuessfully delete",
                                icon: "success",
                            });
                        
                    });

                    </script>
                    
                ';
            }
        }
    }
    remove_student();

    function update_student(){
        global $connect;
        if(isset($_POST['btn-student-update'])){
            $stu_name = $_POST['student_update_name'];
            $stu_gender = $_POST['student_update_gender'];
            $stu_dob = $_POST['student_update_dob'];
            $stu_phone = $_POST['student_update_phone'];
            $stu_email = $_POST['student_update_email'];
            $stu_address = $_POST['student_update_address'];
            $tea_name = $_POST['student_update_teacher'];
            $class_level = $_POST['student_update_class'];
            $stu_enroll = $_POST['student_update_enroll'];

            $id = $_GET['id'];

            // get data from table teacher
            $tea_sql = "SELECT * FROM `teachers`";
            $tea_result = $connect->query($tea_sql);
            while($tea_row = mysqli_fetch_assoc($tea_result)){
                if($tea_name == $tea_row['teaName']){
                    $tea_id = $tea_row['teaID'];
                }
            }

            // get data from table classes
            $class_sql = "SELECT * FROM `classes`";
            $class_result = $connect->query($class_sql);
            while($class_row = mysqli_fetch_assoc($class_result)){
                if($class_level == $class_row['clslevel']){
                    $class_id = $class_row['clsID'];
                }
            }
            
                // get enroll data
                $get_enroll = "SELECT * FROM `enrollment`";
                $rs_en = $connect->query($get_enroll);
                while($en_row = mysqli_fetch_assoc($rs_en)){
                    $enroll_ID = $en_row['EnID'];
                }

            if(!empty($stu_name) && !empty($stu_gender) && !empty($stu_dob) && !empty($stu_phone) && !empty($stu_email) && !empty($stu_address) && !empty($tea_name) && !empty($class_level) && !empty($stu_enroll) ){
                $sql = "UPDATE `students` SET `stuName`='$stu_name',`stuSex`='$stu_gender',`stuDOB`='$stu_dob',`stuPhone`='$stu_phone',`stuEmail`='$stu_email',`stuAddress`='$stu_address',`FK_teaID`='$tea_id',`FK_clsID`='$class_id',`FK_enroll`='$enroll_ID' WHERE `stuID`='$id'";
                $result = $connect->query($sql);
                if($result){
                    echo '
                    
                    <script>
                    
                    $(document).ready(function(){
                        swal({
                                title: "SUCCESS",
                                text: "Scuessfully Updated",
                                icon: "success",
                            });
                        
                    });

                    </script>
                    
                ';
                }
                else{
                    echo '
                    
                    <script>
                    
                    $(document).ready(function(){
                        swal({
                                title: "SUCCESS",
                                text: "Update Failed",
                                icon: "error",
                            });
                        
                    });

                    </script>
                    
                ';
                }
            }else{
                echo "error 1";
            }

        }
    }
    update_student();


    function view_teacher(){
        global $connect;
        $sql = "SELECT * FROM `teachers`";
        $rs = $connect->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            $id = $row['teaID'];
            $name = $row['teaName'];
            $sex = $row['teaSex'];
            $url_id = $id;
            echo '

            <tr>
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$sex.'</td>
                    <td width="150px">
                    <a href="view-teacher-detail.php?id='.$url_id.'" class="btn btn-success">View</a>
                        <a href="update_teacher_data.php?id='.$url_id.'" class="btn btn-primary">Update</a>
                        <button type="button" remove-id="1" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Remove
                        </button>
                    </td>
                </tr>
            
            ';
        }
    }

    function select_teacher(){
        global $connect;
        $sql = "SELECT teaName FROM `teachers`";
        $rs = $connect->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            echo '
            <option value="'.$row['teaName'].'">'.$row['teaName'].'</option>
            ';
        }
    }

    function add_teacher(){
        global $connect;
        if(isset($_POST['btn_add_teacher'])){
            $name = $_POST['teacher_name'];
            $gender = $_POST['teacher_gender'];
            $salary = $_POST['teacher_salary'];
            $subject = $_POST['teacher_subject'];
            $phone = $_POST['teacher_phone'];
            $email = $_POST['teacher_email'];
            $address = $_POST['teacher_address'];

            
            if(!empty($name) && !empty($gender) && !empty($salary) && !empty($subject) && !empty($phone) && !empty($email) && !empty($address)){
                $sql = "INSERT INTO `teachers`(`teaName`, `teaSex`, `teaSalary`, `teaSubject`, `teaPhone`, `teaEmail`, `teaAddress`)
                    VALUES ('$name','$gender','$salary','$subject','$phone','$email','$address')";
                $rs = $connect->query($sql);
                if($rs){
                    echo '
                    
                    <script>
                    
                    $(document).ready(function(){
                        swal({
                                title: "SUCCESS",
                                text: "Inserted Scuessfully",
                                icon: "success",
                            });
                        
                    });

                    </script>
                    
                ';
                }else{
                    echo '
                    
                    <script>
                    
                    $(document).ready(function(){
                        swal({
                                title: "FAILED",
                                text: "Insert failed",
                                icon: "error",
                            });
                        
                    });

                    </script>
                    
                ';
                }
            }else{
                echo "Error Data";
            }
        }
    }
    add_teacher();


    function update_teacher(){
        global $connect;
        if(isset($_POST['btn_update_teacher'])){
            $name = $_POST['teacher_name_update'];
            $gender = $_POST['teacher_gender_update'];
            $salary = $_POST['teacher_salary_update'];
            $subject = $_POST['teacher_subject_update'];
            $phone = $_POST['teacher_phone_update'];
            $email = $_POST['teacher_email_update'];
            $address = $_POST['teacher_address_update'];
            $id = $_GET['id'];

            if(!empty($name) && !empty($gender) && !empty($salary) && !empty($subject) && !empty($phone) && !empty($email) && !empty($address)){
                $sql = "UPDATE `teachers` SET `teaName`='$name',`teaSex`='$gender',`teaSalary`='$salary',`teaSubject`='$subject',`teaPhone`='$phone',`teaEmail`='$email',`teaAddress`='$address' WHERE `teaID`='$id'";
                $rs = $connect->query($sql);
                if($rs){
                    echo '
                    
                    <script>
                    
                    $(document).ready(function(){
                        swal({
                                title: "SUCCESS",
                                text: "Update Scuessfully",
                                icon: "success",
                            });
                        
                    });

                    </script>
                    
                ';
                }else{
                    echo '
                    
                    <script>
                    
                    $(document).ready(function(){
                        swal({
                                title: "FAILED",
                                text: "Failed to Update",
                                icon: "error",
                            });
                        
                    });

                    </script>
                    
                ';
                }
            }else{
                echo "Error Data";
            }
        }
    }

    update_teacher();


?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
