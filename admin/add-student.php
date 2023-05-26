<?php 
    include('sidebar.php');
    include('function.php')
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add New Student</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="student_name" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-select" name="student_gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input name="student_dob" type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="student_phone" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="student_email" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="student_address" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Teacher</label>
                                        <select class="form-select" name="student_teacher">
                                            <?php select_teacher(); ?>
                                            <!-- <option value="Pich Nary">Pich Nary</option>
                                            <option value="Kev Bora">Kev Bora</option>
                                            <option value="Heng Dana">Heng Dana</option>
                                            <option value="Sok Bunlong">Sok Bunlong</option>
                                            <option value="Rany Sonita">Rany Sonita</option> -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Class Level</label>
                                        <select class="form-select" name="student_class">
                                            <option value="One">One</option>
                                            <option value="Two">Two</option>
                                            <option value="Three">Three</option>
                                            <option value="Four">Four</option>
                                            <option value="Five">Five</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Enrollment Date</label>
                                        <input name="student_enroll" type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button name="btn-student-submit" type="submit" class="btn btn-primary">Submit</button>
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