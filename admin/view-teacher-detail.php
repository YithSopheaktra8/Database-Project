<?php
// include('sidebar.php');
include('function.php');

    $con = new mysqli('localhost', 'root', '', 'rupp_test');
    $tea_id = $_GET['id'];
    $tea_sql = "SELECT t.*,c.*,s.stuName,s.stuId
    FROM teachers AS t 
    INNER JOIN students AS s 
    ON t.teaID = s.FK_teaID
    INNER JOIN classes AS c 
    ON s.FK_clsID = c.clsID WHERE `teaID`='$tea_id'";

    $result = $con->query($tea_sql);
    $tea_row = mysqli_fetch_assoc($result);
    
    function student_count(){
        global $con;
        global $tea_id;
        $stu_id = "SELECT * FROM `students` WHERE `FK_teaID`='$tea_id'";
    // $stu_sql = $con->query($stu_id);
    
    // while($stu_row = mysqli_fetch_assoc($stu_sql)){
    //     echo $stu_row['stuId'];
    // }
        if($stu_row = mysqli_query($con,$stu_id)){
            $row_count = mysqli_num_rows($stu_row);
            echo $row_count;
            mysqli_free_result($stu_row);
        }
    }

    function stuName(){
        global $con;
        global $tea_id;
        $sql = "SELECT * FROM `students` WHERE `FK_teaID`='$tea_id'";
        $rs = $con->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            echo '
            <tr>
                <th width="30%">Student Name</th>
                <td width="2%">:</td>
                <td>'.$row['stuName'].'</td>
            </tr>
        
            ';
        }

    }
    
    
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
                            <h3 class="mt-3"><?php echo $tea_row['teaName'] ?></h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-0"><strong class="pr-1">Teacher ID : </strong><?php echo $tea_row['teaID'] ?></p>
                            <p class="mb-0"><strong class="pr-1">Class : </strong><?php echo $tea_row['clsName'] ?></p>
                            <p class="mb-0"><strong class="pr-1">Class Level : </strong><?php echo $tea_row['clslevel'] ?></p>
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
                                    <th width="30%">Teacher Subject</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $tea_row['teaSubject'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Gender</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $tea_row['teaSex'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Salary($)</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $tea_row['teaSalary'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Teacher Phone </th>
                                    <td width="2%">:</td>
                                    <td><?php echo $tea_row['teaPhone'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Email</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $tea_row['teaEmail'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Address</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $tea_row['teaAddress'] ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Total Student</th>
                                    <td width="2%">:</td>
                                    <td><?php student_count(); ?></td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>All Student Under Teacher : <?php echo $tea_row['teaName'] ?></h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <?php stuName(); ?>
                            </table>
                            <a href="view-teacher.php" class="btn btn-danger">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>