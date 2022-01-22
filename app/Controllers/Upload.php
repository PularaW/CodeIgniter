<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class Upload extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('upload_form', ['errors' => []]);
    }

    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (!$img->hasMoved()) {
            $fileName = $img->store(); //store the image in the images folder and return the randomly taken image name
            $title = $_POST['title']; //get the user entered title by post method

            $filepath = '' . $fileName;

            $data = ['uploaded_flleinfo' => new File($filepath)];

            $db = db_connect(); //connecting to the database
            $db->query("INSERT INTO images(title, img_path) values('$title', '$fileName');"); //insert data into the database
            $db->close(); //disconnecting the database

            return view('upload_success', $data);
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            return view('upload_form', $data);
        }
    }
}
