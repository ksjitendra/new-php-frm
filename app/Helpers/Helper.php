<?php

// function to load a html file on the frontend
function view($filePath, $data=[])
{
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $filePath);
    $path = str_replace('.', DIRECTORY_SEPARATOR, $path);

    $file = APP_ROOT . DIRECTORY_SEPARATOR . 'views'. DIRECTORY_SEPARATOR.$path.'.php';

    if(file_exists($file)){
        extract($data);
		return require $file;
	}

	throw new Exception('Page not found'. $file);
}

// function to send back user on the page, with some validation messages 
function back($data = [])
{
    session_start();
    // Store the data in the session as flash data
    $_SESSION['flash_data'] = $data;
    // Retrieve the referring URL
    $referer = $_SERVER['HTTP_REFERER'];
    // Redirect back to the referring URL
    header("Location: $referer");
    exit();
}

// redirecting user to a perticular location 
function redirect($uri)
{
    if (!empty($data)) {
        $queryString = http_build_query($data);
        $uri .= '?' . $queryString;
    }
    header("Location: $uri");
    exit();
}

// function for debugging code
function aprint($data) {

    echo "<pre>";
    print_r($data);
    exit;
    die();
}

// function to check validations based passed keys and rules to it
function validate($inputData, $rules)
{
    $errors = [];

    foreach ($rules as $field => $rule) {
        $value = isset($inputData[$field]) ? $inputData[$field] : null;
        $validationRules = explode('|', $rule);

        foreach ($validationRules as $validationRule) {
            if ($validationRule === 'required') {
                if (empty($value)) {
                    $errors[$field][] = 'The ' . $field . ' field is required.';
                }
            } elseif ($validationRule === 'email') {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$field][] = 'The ' . $field . ' field must be a valid email address.';
                }
            }
        }
    }

    return $errors;
}

// function to include any file into another file
function addSection($file_path){
	include(APP_ROOT.'/views/'.$file_path);
}

// function to provide assets path 
function asset($path)
{
    return rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
}

// Helper function to get all categories
function getAllCategories($categoryId = false)
{

    // Create an instance of the Category model
    $categoryModel = new \App\Models\Category();
    // Call the function to fetch all categories
    $categories = $categoryModel->getAll();

    foreach ($categories as $key => $value) {
        # code...
        if($categoryId == $value['id'] ) {
            echo "<option selected value=".$value['id'].">".$value['name']."</option>";
        } else {
            echo "<option value=".$value['id'].">".$value['name']."</option>";
        }
    }

}

// function to log all exceptions 
function logError($errorMessage)
{
    $logFile = __DIR__ . '../../../error.log';
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] ERROR: $errorMessage" . PHP_EOL;
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}



?>