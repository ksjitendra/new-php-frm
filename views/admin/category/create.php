
<?php  addSection('admin/layouts/header.php') ?>
<body>
<?php include("views/admin/layouts/sidebar.php"); ?>

    <div class="container-fuild">
        <div class="row mt-5 pt-5">

            <div class="col-3"></div>
            <div class="col-6">
            <?php  addSection('layouts/errors.php') ?>
                <h2>Add Category</h2>
                <form action="/save/category" method="post">
                    <div class="form-group">
                        <label for="">Catgory Name</label>
                        <input type="text" required name="name" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

   
</body>
<?php  addSection('admin/layouts/footer.php') ?>



