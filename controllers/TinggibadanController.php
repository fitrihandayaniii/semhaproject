<?php

class TinggibadanController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->tinggibadan = Tinggibadan::find();
    }

    public function normalisasiAction()
    {
        $this->view->tinggibadan = Tinggibadan::find();
    }

    public function tahapnormalisasiAction()
    {
        $model = Tinggibadan::find();
        $minumur = Tinggibadan::minimum(['column'=>'umur']);
         $maxumur = Tinggibadan::maximum(['column'=>'umur']);

         $mintb = Tinggibadan::minimum(['column'=>'tinggi']);
         $maxtb = Tinggibadan::maximum(['column'=>'tinggi']);
         foreach ($model as $tb):
            if($tb->jk=="L")        //man
            {
                $x1=1;
            }
            else{
                 $x1=2;
            }   

            $x2=($tb->umur - $minumur) / ($maxumur - $minumur);
            $x3=($tb->tinggi - $mintb) / ($maxtb - $mintb);

            if($tb->cr_ukur=="T")        //man
            {
                $x4=1;
            }
            else{
                 $x4=2;
            }

            if($tb->vit_a=="T")        //man
            {
                $x5=0;
            }
            else{
                 $x5=1;
            } 

            if($tb->ekonomi=="Gakin")        //man
            {
                $x6=0;
            }
            else{
                 $x6=1;
            } 

            if($tb->pendidikan_ibu=="SMP")        //man
            {
                $pendidikan_ibu=1;
            }
            elseif($tb->pendidikan_ibu=="SMA"){
                 $pendidikan_ibu=2;
            } 
            else{
                $pendidikan_ibu=3;
            }
            $x7=($pendidikan_ibu - 1) / (3 - 1);

            if($tb->pekerjaan_ayah=="Tani/Tukang/")        //man
            {
                $pekerjaan_ayah=1;
            }
            elseif($tb->pekerjaan_ayah=="Wiraswasta"){
                 $pekerjaan_ayah=2;
            } 
            else{
                $pekerjaan_ayah=3;
            }
            $x8=($pekerjaan_ayah - 1) / (3 - 1);

            if($tb->status_gizi=="SP")        
            {
                $target=1;
            }
            elseif($tb->status_gizi=="P"){
                 $target=2;
            }
            else{
                $target=3;
            }
           

            $tinggibadan = Tinggibadan::findFirstByIdBalita($tb->id_balita);      //perbedaan create dan edit
            $tinggibadan->assign([
                'x1' => $x1,    //['nama'] sesuai 'name'    'nama' sesuai field di database 
                'x2' => $x2,
                'x3' => $x3,
                'x4' => $x4,
                'x5' => $x5,
                'x6' => $x6,
                'x7' => $x7,
                'x8' => $x8,
                'target' => $target,
            ]);

            if ($tinggibadan->save()) {
                $this->response->redirect('tinggibadan/normalisasi');
            }
            else{
               // $this->response->redirect('tinggibadan/tbedit/'.$post['id_balita']); 
            }

         endforeach;

    }


    public function pembagiantbAction()
    {
        $this->view->tinggibadan = Tinggibadan::find();
    }

    public function tbcreateAction()
    {
        if ($this->request->isPost()) {
            $post = $this->request->getPost();
            $tinggibadan = new Tinggibadan();
            $tinggibadan->assign([
                'nama' => $post['nama'],    //['nama'] sesuai 'name'    'nama' sesuai field di database 
                'jk' => $post['jk'],    //['username'] sesuai 'username'    'username' sesuai field di database
                'umur' => ($post['umur']),
                'tinggi' => ($post['tinggi']),
                'cr_ukur' => ($post['cr_ukur']),
                'vit_a' => ($post['vit_a']),
                'ekonomi' => ($post['ekonomi']),
                'pendidikan_ibu' => ($post['pendidikan_ibu']),
                'pekerjaan_ayah' => ($post['pekerjaan_ayah']),
                'status_gizi' => ($post['status_gizi'])
            ]);

            if ($tinggibadan->save()) {
                $this->response->redirect('tinggibadan');
            }
            else{
                $this->response->redirect('tinggibadan/tbcreate'); 
            }
        }
    }


    public function tbeditAction($id_balita)
    {
        
        if ($this->request->isPost()) {
            $post = $this->request->getPost();
            $tinggibadan = Tinggibadan::findFirstByIdBalita($post['id_balita']);      //perbedaan create dan edit
            $tinggibadan->assign([
                'nama' => $post['nama'],    //['nama'] sesuai 'name'    'nama' sesuai field di database 
                'jk' => $post['jk'],    //['username'] sesuai 'username'    'username' sesuai field di database
                'umur' => ($post['umur']),
                'tinggi' => ($post['tinggi']),
                'cr_ukur' => ($post['cr_ukur']),
                'vit_a' => ($post['vit_a']),
                'ekonomi' => ($post['ekonomi']),
                'pendidikan_ibu' => ($post['pendidikan_ibu']),
                'pekerjaan_ayah' => ($post['pekerjaan_ayah']),
                'status_gizi' => ($post['status_gizi'])
            ]);

            if ($tinggibadan->save()) {
                $this->response->redirect('tinggibadan');
            }
            else{
                $this->response->redirect('tinggibadan/tbedit/'.$post['id_balita']); 
            }
        }

        $this->view->tb = Tinggibadan::findFirstByIdBalita($id_balita);
    }

    public function deleteAction($id_balita)
    {
    	$tb = Tinggibadan::findFirstByIdBalita($id_balita);	
    	$tb->delete();

    	$this->response->redirect('tinggibadan');
    	//cara lain
    	//if ($users->delete()) {
				$this->response->redirect('tinggibadan');
		//	}

    }

    public function bobotawalAction()
    {
        $this->view->tinggibadan = Tinggibadan::find();
    }

    // public function tbpembagian1Action()
    // {
    //     $this->view->tb90 = tb90::find();
    //     $this->view->tb10 = tb10::find();
    // }

    // public function tbpembagian2Action()
    // {
    //     $this->view->tb80 = tb80::find();
    //     $this->view->tb20 = tb20::find();
    // }


}

