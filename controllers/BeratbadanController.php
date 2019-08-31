<?php

class BeratbadanController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->beratbadan = Beratbadan::find();
    }
    public function normalisasiAction()
    {
        $this->view->beratbadan = Beratbadan::find();
    }
    public function tahapnormalisasiAction()
    {
        $model = Beratbadan::find();
        $minumur = Beratbadan::minimum(['column'=>'umur']);
         $maxumur = Beratbadan::maximum(['column'=>'umur']);

         $minbb = Beratbadan::minimum(['column'=>'berat']);
         $maxbb = Beratbadan::maximum(['column'=>'berat']);
         foreach ($model as $bb):
            if($bb->jk=="L")        //man
            {
                $x1=1;
            }
            else{
                 $x1=2;
            }   

            $x2=($bb->umur - $minumur) / ($maxumur - $minumur);
            $x3=($bb->berat - $minbb) / ($maxbb - $minbb);

            if($bb->cr_ukur=="T")        //man
            {
                $x4=1;
            }
            else{
                 $x4=2;
            }

            if($bb->vit_a=="T")        //man
            {
                $x5=0;
            }
            else{
                 $x5=1;
            } 

            if($bb->ekonomi=="Gakin")        //man
            {
                $x6=0;
            }
            else{
                 $x6=1;
            } 

            if($bb->pendidikan_ibu=="SMP")        //man
            {
                $pendidikan_ibu=1;
            }
            elseif($bb->pendidikan_ibu=="SMA"){
                 $pendidikan_ibu=2;
            } 
            else{
                $pendidikan_ibu=3;
            }
            $x7=($pendidikan_ibu - 1) / (3 - 1);

            if($bb->pekerjaan_ayah=="Tani/Tukang/")        //man
            {
                $pekerjaan_ayah=1;
            }
            elseif($bb->pekerjaan_ayah=="Wiraswasta"){
                 $pekerjaan_ayah=2;
            } 
            else{
                $pekerjaan_ayah=3;
            }
            $x8=($pekerjaan_ayah - 1) / (3 - 1);

            if($bb->status_gizi=="GK")        //man
            {
                $target=1;
            }
            else{
                 $target=2;
            }

            $beratbadan = Beratbadan::findFirstByIdBalita($bb->id_balita);      //perbedaan create dan edit
            $beratbadan->assign([
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

            if ($beratbadan->save()) {
                $this->response->redirect('beratbadan/normalisasi');
            }
            else{
               // $this->response->redirect('beratbadan/bbedit/'.$post['id_balita']); 
            }

         endforeach;

    }

    public function pembagianbbAction()
    {
        $this->view->beratbadan = Beratbadan::find();
    }

    public function bbcreateAction()
    {
        if ($this->request->isPost()) 
        {
            $post = $this->request->getPost();
            $beratbadan = new Beratbadan();
            $beratbadan->assign([
                'nama' => $post['nama'],    //['nama'] sesuai 'name'    'nama' sesuai field di database 
                'jk' => $post['jk'],    //['username'] sesuai 'username'    'username' sesuai field di database
                'umur' => ($post['umur']),
                'berat' => ($post['berat']),
                'cr_ukur' => ($post['cr_ukur']),
                'vit_a' => ($post['vit_a']),
                'ekonomi' => ($post['ekonomi']),
                'pendidikan_ibu' => ($post['pendidikan_ibu']),
                'pekerjaan_ayah' => ($post['pekerjaan_ayah']),
                'status_gizi' => ($post['status_gizi']),
                'x1' => '0',
                'x2' => '0',
                'x3' => '0',
                'x4' => '0',
                'x5' => '0',
                'x6' => '0',
                'x7' => '0',
                'x8' => '0',
                'target' => '0'
            ]);

            if ($beratbadan->save(false)) {
                $this->response->redirect('beratbadan');
            }
            else{
                $this->response->redirect('beratbadan/bbcreate'); 
            }
        }
    }


    public function bbeditAction($id_balita)
    {
        
        if ($this->request->isPost()) {
            $post = $this->request->getPost();
            $beratbadan = Beratbadan::findFirstByIdBalita($post['id_balita']);      //perbedaan create dan edit
            $beratbadan->assign([
                'nama' => $post['nama'],    //['nama'] sesuai 'name'    'nama' sesuai field di database 
                'jk' => $post['jk'],    //['username'] sesuai 'username'    'username' sesuai field di database
                'umur' => ($post['umur']),
                'berat' => ($post['berat']),
                'cr_ukur' => ($post['cr_ukur']),
                'vit_a' => ($post['vit_a']),
                'ekonomi' => ($post['ekonomi']),
                'pendidikan_ibu' => ($post['pendidikan_ibu']),
                'pekerjaan_ayah' => ($post['pekerjaan_ayah']),
                'status_gizi' => ($post['status_gizi'])
            ]);

            if ($beratbadan->save()) {
                $this->response->redirect('beratbadan');
            }
            else{
                $this->response->redirect('beratbadan/bbedit/'.$post['id_balita']); 
            }
        }

        $this->view->bb = Beratbadan::findFirstByIdBalita($id_balita);
    }

    public function deleteAction($id_balita)
    {
    	$bb = Beratbadan::findFirstByIdBalita($id_balita);	
    	$bb->delete();

    	$this->response->redirect('beratbadan');
    	//cara lain
    	//if ($users->delete()) {
				$this->response->redirect('beratbadan');
		//	}

    }

    public function bobotawalAction()
    {
        $this->view->beratbadan = Beratbadan::find();
        
    }

    // public function bbpembagian1Action()
    // {
    //     $this->view->bb90 = bb90::find();
    //     $this->view->bb10 = bb10::find();
    // }

    // public function bbpembagian2Action()
    // {
    //     $this->view->bb80 = bb80::find();
    //     $this->view->bb20 = bb20::find();
    // }

}

