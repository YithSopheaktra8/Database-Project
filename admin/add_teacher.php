<?php 
    include('sidebar.php');
    include('function.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add New Teacher</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Teacher Name</label>
                                        <input type="text" class="form-control" name="teacher_name">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-select" name="teacher_gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input type="text" class="form-control" name="teacher_salary">
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="teacher_subject">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="teacher_phone">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="teacher_email">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="teacher_address">
                                    </div>
                                    <div class="form-group">
                                        <button name="btn_add_teacher" type="submit" class="btn btn-primary">Submit</button>
                                        <a href="index.php" class="btn btn-danger">Cancel</a>
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