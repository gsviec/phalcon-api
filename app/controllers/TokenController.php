<?php
namespace App\Controllers;


class TokenController extends ControllerBase
{



    public function indexAction()
    {
        if (!$this->request->isPost()) {
            return $this->errorForbidden();
        }

    }
    public function token()
    {
        $this->oauth->server->handleTokenRequest(\OAuth2\Request::createFromGlobals())->send();
    }
    public function getToken()
    {
        $response = new \Phalcon\Http\Response();
        $response->setStatusCode(405);
        print_r($response->getStatusCode());
    }


}
