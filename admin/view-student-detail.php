<?php
// include('sidebar.php');
include('function.php');

$con_student = new mysqli('localhost', 'root', '', 'rupp_test');
$stu_id = $_GET['id'];
$student_sql = "SELECT s.*,c.clsName,c.clslevel,t.teaName,t.teaPhone,en.EnDate
                FROM `students` AS s
                INNER JOIN classes AS c 
                ON s.FK_clsID = c.clsID
                INNER JOIN teachers AS t 
                ON s.FK_teaID = t.teaID
                INNER JOIN enrollment AS en 
                ON s.FK_enroll = en.EnID
                WHERE s.stuId = '$stu_id'";
$rs = $con_student->query($student_sql);
$student_row = mysqli_fetch_assoc($rs);

// echo $student_row['stuDOB'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <title></title>
</head>

<body>
    <!-- Student Profile -->
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                            <img class="profile_img" src="./assets/icon/imga_holder.png" alt="">
                            <h3 class="mt-3"><?php echo $student_row['stuName'] ?></h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-0"><strong class="pr-1">Student ID : </strong><?php echo $student_row['stuId'] ?></p>
                            <p class="mb-0"><strong class="pr-1">Class : </strong><?php echo $student_row['clsName'] ?></p>
                            <p class="mb-0"><strong class="pr-1">Class Level : </strong><?php echo $student_row['clslevel'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Date of Birth</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $student_row['stuDOB'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Gender</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $student_row['stuSex'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Student Phone </th>
                                    <td width="2%">:</td>
                                    <td><?php echo $student_row['stuPhone'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Email</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $student_row['stuEmail'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Address</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $student_row['stuAddress'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Teacher Name</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $student_row['teaName'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Teacher Phone</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $student_row['teaPhone'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Enrollment Date</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $student_row['EnDate'] ?></td>
                                </tr>
                                
                                
                            </table>
                            <a href="view-student.php" class="btn btn-danger">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>