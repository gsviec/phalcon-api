<?php
namespace App\Controllers;


class TokenController extends ControllerBase
{

    public function indexAction()
    {
        if (!$this->request->isPost()) {
            return $this->errorForbidden();
        }
        $data = $this->parserDataRequest();
        d($data);
    }

}
