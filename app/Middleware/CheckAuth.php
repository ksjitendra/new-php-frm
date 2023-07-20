<?php
namespace App\Middleware;

class CheckAuth {


    public function handle() {
        if (!isset($_SESSION['user_id'])) {
            redirect('/login');
            exit();
        }
    }
}

?>