<?php
namespace App\Controllers;

/**
 * Class TestsController
 * @package App\Controllers
 */
class TestsController extends ControllerBase
{
    /**
     * indexAction function.
     *
     * @access public
     */
    public function indexAction()
    {
        return $this->respondWithSuccess('Hello world');
    }
    public function mongo()
    {
      return $this->respondWithSuccess('Hello mongo');
    }
}
