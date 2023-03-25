<?php
require '../assets/partials/_admin-check.php';
include '../assets/partials/_functions.php';
include '../assets/partials/_head.php';
include '../assets/partials/_sidebar.php';
include '../assets/partials/_urlName.php';
?>

<!-- sidebar main content  -->
<div class="col py-3">
    <nav class="mb-3 mx-4">
        <div class="d-flex justify-content-between mb-3">
            <div class="badge bg-primary text-uppercase" id="currentTimeDate"></div>
            <div class="badge bg-primary text-uppercase"><?php date_default_timezone_set('Asia/Manila');
                                                            echo date('F j, Y'); ?></div>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <div class="h3">Products</div>
            <a href="../admin/dashboard.php?id=$user" class="btn btn-info h3"><i class="bi bi-arrow-clockwise"></i></a>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow mb-3">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col">
                            <div class="h4">
                                <span>New Item</span>
                                <button class="btn btn-secondary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-circle"></i>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD NEW ITEM</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                                <label for="email">Item Name</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                                <label for="email">Price</label>
                            </div>
                        </div>
                        <div class="col-4 mt-4">
                            <form action="#">
                                <input type="file" class="form-control h-75" id="myFile" name="filename">
                            </form>
                        </div>
                        <div class="col-8">
                            <div class="form-floating">
                                <textarea class="form-control" id="comment" name="text" placeholder="Comment goes here"></textarea>
                                <label for="comment">Comments</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <select class="form-select bg-light h-100" aria-label="Default select example">
                                <option selected>Category</option>
                                <option value="1">Food</option>
                                <option value="2">Essesntial</option>
                                <option value="3">Accessories</option>
                                <option value="4">Grooming</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../assets/partials/_footer.php'; ?>
</div>

<!-- sidebar end div  -->
</div>
</div>

<?php
include '../assets/scripts/admin.php';
include '../assets/partials/_foot.php';
?>