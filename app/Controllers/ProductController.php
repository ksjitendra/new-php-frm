<?php

namespace App\Controllers; 
use App\Models\Product;
use Carbon\Carbon;

class ProductController {

    public function index() {

       $product = new Product();
       $data = $product->getAll(); 
       view('admin.product.index', ['data'=> $data]);
    }

    public function add() {
        view('admin.product.create');
    }

    // Saving product into database 
    public function save() {

        $inputData = $_POST;
        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'offer_price' => 'required', 
            'description' => 'required', 
        ];

        $errors = validate($inputData, $rules);

        if(!empty($errors)) {

            view('admin.product.create', ['error'=> $errors]);

        } else {
            // Getting the image details
            $image = $_FILES['image'];
            $imageName = $image['name'];
            $imageTmpPath = $image['tmp_name'];

            $uploadDirectory = '/assets/uploads/';

            // Generate a unique filename for the image
            $uniqueFilename =  Carbon::now()->timestamp . '_' . $imageName;
            $targetPath = __DIR__ . '/../../' . $uploadDirectory . $uniqueFilename;
         
            $upload = move_uploaded_file($imageTmpPath, $targetPath);

            $product = new Product(); 

            $product->category_id  = $inputData['category_id'];
            $product->name = $inputData['name'];
            $product->price = $inputData['price']; 
            $product->offer_price = $inputData['offer_price'];
            $product->description = $inputData['description'];
            $product->image = $uniqueFilename;

            $save = $product->save();

            if($save) {
                redirect('/products');
            } else {
                $errors  =  ['Something went wrong'];
                back($errors);
            }
        }
    }

    // delete product from database
    public function destroy() {

        $product = new Product(); 
        $product->id = $_POST['productId'];
        $delete   =  $product->delete();

        if($delete) {
            redirect('/products');
        } else {
            $errors = ['Something went wrong'];
            back($errors);
        }

    }

    // update product 
    public function update() {

        $inputData = $_POST;
        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'offer_price' => 'required', 
            'description' => 'required', 
        ];

        $errors = validate($inputData, $rules);

        if(!empty($errors)) {

            view('admin.product.create', ['error'=> $errors]);

        } else {
            $product = new Product(); 

            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $image = $_FILES['image'];
                $imageName = $image['name'];
                $imageTmpPath = $image['tmp_name'];
    
                $uploadDirectory = '/assets/uploads/';
    
                // Generate a unique filename for the image
                $uniqueFilename =  Carbon::now()->timestamp . '_' . $imageName;
                $targetPath = __DIR__ . '/../../' . $uploadDirectory . $uniqueFilename;

                $upload = move_uploaded_file($imageTmpPath, $targetPath);   
                $product->image = $uniqueFilename;
            }
           
            $product->category_id  = $inputData['category_id'];
            $product->name = $inputData['name'];
            $product->price = $inputData['price']; 
            $product->offer_price = $inputData['offer_price'];
            $product->description = $inputData['description'];
            $product->id = $inputData['productId'];
            $update = $product->update();

            if($update) {
                redirect('/products');
            } else {
                $errors = ['Something went wrong'];
                back($errors);
            }
        }
    }
}