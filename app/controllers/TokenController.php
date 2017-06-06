<?php
namespace App\Controllers;


use App\Models\Installation;

class TokenController extends ControllerBase
{

    public function indexAction()
    {
        $data = $this->parserDataRequest();

        if (!$this->request->isPost()) {
            return $this->errorForbidden();
        }
        try {
            $install = new Installation();
            $id = $install->insertOne($data);
            return $this->respondWithSuccess($id);
        } catch (\ErrorException $e) {
            return $this->respondWithError($e->getMessage(),402);
        }

    }
    public function deleteAction($id)
    {
        $params['deviceToken'] = $id;

        if (!$this->request->isDelete()) {
            return $this->errorForbidden();
        }
        try {
            $install = new Installation();
            $install->deleteOne($params);
            return $this->respondWithSuccess('Remove token success!');
        } catch (\ErrorException $e) {
            return $this->respondWithError($e->getMessage(),402);
        }
    }


}
