<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class ViewImages extends BaseController
{
    public function index()
    {
        $db = db_connect(); //connecting to the database
        $data = ['result' => $db->query("SELECT * from images;")]; //fetch data from the database
        $db->close(); //disconnecting the database
        return view('view_images', $data);
    }
}
