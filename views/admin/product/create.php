
<?php  addSection('admin/layouts/header.php') ?>
<body>
<?php include("views/admin/layouts/sidebar.php"); ?>

    <div class="container-fuild">
        <div class="row mt-5 pt-5">
            <div class="col-3"></div>
            <div class="col-6">
                <h2>Add Product</h2>
                <?php  addSection('layouts/errors.php') ?>
                <form action="/save/product" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Choose Category</label>
                        <select name="category_id" class="form-control" id="" required>
                            <option value="">Choose Category</option>
                             <?= getAllCategories() ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" required name="name" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" required name="price" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Offer Price</label>
                        <input type="text" required name="offer_price" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Product Image</label>
                        <input type="file" required name="image" class="form-control" id="">
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



