<?php

class UsersController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->users = Users::find();
    }
    public function userscreateAction()
    {
    	if ($this->request->isPost()) {
			$post = $this->request->getPost();
			$users = new Users();
			$users->assign([
				'nama' => $post['nama'],	//['nama'] sesuai 'name'	'nama' sesuai field di database 
				'username' => $post['username'],	//['username'] sesuai 'username'	'username' sesuai field di database
				'password' => ($post['password'])
			]);

			if ($users->save()) {
				$this->response->redirect('users');
			}
			else{
				$this->response->redirect('users/userscreate');	
			}
    	}
    }
    public function editAction($id_users)
    {
    	
    	if ($this->request->isPost()) {
			$post = $this->request->getPost();
			$users = Users::findFirstByIdUsers($post['id_users']);		//perbedaan create dan edit
			$users->assign([
				'nama' => $post['nama'],	//['nama'] sesuai 'name'	'nama' sesuai field di database 
				'username' => $post['username'],	//['username'] sesuai 'username'	'username' sesuai field di database
				'password' => ($post['password']),
			]);

			if ($users->save()) {
				$this->response->redirect('users');
			}
			else{
				$this->response->redirect('users/edit/'.$post['id_users']);	
			}
		}

		$this->view->user = Users::findFirstByIdUsers($id_users);
    }
    public function deleteAction($id_users)
    {
    	$user = Users::findFirstByIdUsers($id_users);	
    	$user->delete();

    	$this->response->redirect('users');
    	//cara lain
    	//if ($users->delete()) {
				$this->response->redirect('users');
		//	}

    }

}

