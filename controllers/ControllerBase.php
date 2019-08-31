<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $id_user;

    public function initialize()
    {
        $this->id_user = $this->session->get('id_user');
        if (empty($this->id_user)) {
            $this->response->redirect('session/login');
        }
    }
}
