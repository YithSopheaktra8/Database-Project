<?php 
    include('sidebar.php');
    include('function.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top d-flex align-middle justify-content-center">
                            <h3>Student Information</h3>
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
                                        <?php view_student(); ?>
                                        <!-- <tr>
                                            <td>1001</td>
                                            <td>tra</td>
                                            <td>female</td>
                                            <td>27/June/2022</td>
                                            <td>0967174832</td>
                                            <td>yith@gmail.com</td>
                                            <td>Phnom penh</td>
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
                                                        <input type="hidden" id="hidden_id" name="remove_id">
                                                        <button type="submit" name="btn_remove_student" class="btn btn-danger">Yes</button>
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

<script>

$(document).ready(function () {

$("body").on("click", "#remove_student", function () {
    var id = $(this).parents("tr").find("td").eq(0).text();

    $("#hidden_id").val(id);
});


})

</script>