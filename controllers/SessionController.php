<?php

class SessionController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function loginAction()
    {
        if ($this->request->isPost()) {

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $users = Users::findFirstByUsername($username);
            if ($users->username == $username && $users->password == $password) {
                $this->session->set('id_user', $users->id_users);
                $this->session->set('username', $users->username);
                $this->flashSession->success('Berhasil Login');
                $this->response->redirect('');
            } else {
                $this->flashSession->error('Tidak Berhasil Login');
                $this->response->redirect('');
            }
        }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('');
    }

}

