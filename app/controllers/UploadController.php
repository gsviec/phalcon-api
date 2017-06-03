<?php
namespace App\Controllers;


use App\Models\Installation;

class UploadController extends ControllerBase
{

    public function indexAction()
    {
        $file = $_FILES['file'];
        if (!isset($file)) {
            return $this->respondWithError('Nothing a data file', 404);
        }
        //File need small then 50M
        if ($file['size'] = 52428800) {
            return $this->respondWithError('Sorry, your file is too large', 404);
        }
        $destination = public_path('upload/') . $file['name'];
        if (!move_uploaded_file($file['tmp_name'], $destination )) {
            return $this->respondWithError('Not found tmp', 404);
        }
        return $this->respondWithSuccess();
    }
}
