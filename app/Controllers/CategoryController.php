<?php 

namespace App\Controllers;
use App\Models\Category;

class CategoryController {

    public function addCategory() {
        view('admin.category.create');
    }

    // Saving category into database 
    public function saveCategory() {

        $inputData = $_POST;
        $rules = [
            'name' => 'required',
        ];

        $errors = validate($inputData, $rules);

        if(!empty($errors)) {
            back($errors);

        } else {

            $category = $_POST['name'];

            $categoryObj = new Category();
            $categoryObj->name = $category; 

            if($categoryObj->save()) {
                redirect('/dashboard');
            } else {
                $errors  = ['Something went wrong'];
                back($errors);
            }
        }

    }

    // Fetching categories from db 
    public function fetchCategory() {

        $category = new Category();
        $data   = $category->fetchAllCategories();

    }

}