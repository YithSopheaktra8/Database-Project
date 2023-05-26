<?php 
    include('sidebar.php');
    include('function.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top d-flex justify-content-center align-items-center">
                            <h3>TEACHER INFORMATION</h3>
                        </div>
                        <div class="bottom view-post">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <!-- <div class="block-search">
                                        <input type="text" class="form-control" placeholder="SEARCH HERE">
                                        <button type="submit">
                                        <img src="search.png" alt=""></button>
                                    </div> -->
                                    <table class="table table-hover table-dark" border="2px" style="table-layout: fixed;">
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>SEX</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                        <?php view_teacher(); ?>
                                        <!-- <tr>
                                            <td>1001</td>
                                            <td>tra</td>
                                            <td>female</td>
                                            <td width="150px">
                                                <a href=""class="btn btn-primary">Update</a>
                                                <button type="button" remove-id="1" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr> -->
                                        
                                    </table>
                                    <ul class="pagination">
                                        <li>
                                            <a href="">1</a>
                                            <a href="">2</a>
                                            <a href="">3</a>
                                            <a href="">4</a>
                                        </li>
                                    </ul>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to remove this post?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="value_remove" name="remove_id">
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>  
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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