
<?php  addSection('admin/layouts/header.php') ?>
<body>
<?php include("views/admin/layouts/sidebar.php"); ?>

    <div class="container-fuild">
        <div class="row mt-5 pt-5">
          <div class="col-2"></div>
          <div class="col-9">
          <div class="pb-5">
            <h3 class="float-left">Products Listing</h3>
            <a class="btn btn-primary float-right" href="/add/product"> <i class="fa fa-plus"></i> Add Product</a>
          </div>
            <table class="table mt-3 table-bordered table-hover">
                <thead>
                    <tr>
                    <th scope="col">Sr. No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Offer Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php  $count =1;
                      foreach ($data as $key => $value) {
                        # code...
                        ?>
                        <tr>
                            <th scope="row"><?= $count++; ?> . </th>
                            <td> <?= $value['name'] ?> </td>
                            <td><?= $value['price'] ?></td>
                            <td><?= $value['offer_price'] ?></td>
                            <td>
                                <img src="<?= asset('assets/uploads/'.$value['image'] ) ?>" style="height:100px; width:100px;" alt="">
                            </td> 
                            <td><?= $value['description'] ?></td>
                            <td class="d-flex">
                                <button class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#exampleModal<?= $value['id'] ?>"><i class="fa fa-edit"></i></button>
                                <form action="/delete/product" method="post">
                                    <input type="hidden" name="productId" value="<?= $value['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                     <form action="/update/product" method="post" enctype="multipart/form-data">
                                     <input type="hidden" name="productId" value="<?= $value['id'] ?>" >
                                            <div class="form-group">
                                                <label for="">Choose Category</label>
                                                <select name="category_id" required class="form-control" id="" required>
                                                    <option value="">Choose Category</option>
                                                    <?php getAllCategories($value['category_id']) ?>
                                                   
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" value="<?= $value['name'] ?>" required name="name" class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="text" required value="<?= $value['price'] ?>" name="price" class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Offer Price</label>
                                                <input type="text" required name="offer_price" value="<?= $value['offer_price'] ?>" class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" class="form-control" id="" cols="30" rows="4"> <?= $value['description'] ?> </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Product Image</label>
                                                <img src="<?= asset('assets/uploads/'.$value['image'] ) ?>" style="height:100px; width:100px;" alt="">
                                                <input type="file" name="image" class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                     </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                            </div>

                        <?php
                      }
                    ?>
                    
                    
                </tbody>
                </table>
          </div>
          <div class="col-1"></div>
        </div>
    </div>

   
</body>
<?php  addSection('admin/layouts/footer.php') ?>



