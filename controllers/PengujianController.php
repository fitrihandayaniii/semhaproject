<?php

class PengujianController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	if ($this->request->isPost()) 
        {
            $post = $this->request->getPost();
            $pembagian = $post['pembagian'];
            $learning_rate = $post['learning_rate'];
            $window = $post['window'];
            $indeks = $post['indeks'];
            
           if($indeks == "beratbadan"){
                $this->response->redirect('pengujian/pengujianbb/'.$pembagian.'/'.$learning_rate.'/'.$window.'/'.$indeks);
           }
           else{
                $this->response->redirect('pengujian/pengujiantb/'.$pembagian.'/'.$learning_rate.'/'.$window.'/'.$indeks);
           } 

        }
    }

    public function pengujianbbAction($pembagian, $learning_rate, $window, $indeks)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
		$this->view->beratbadan = Pembagianbb::find([
            // 'conditions'=>'id_pembagianbb = "92"',
            'conditions'=>'jenisdata="Uji" AND (bagidata = "'.$pembagian.'" OR bagidata = "0")',
        ]);
    }

    public function index2Action()
    {
    	
    }

    public function pengujiantbAction($pembagian, $learning_rate, $window, $indeks)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'jenisdata="Uji" AND bagidata = "'.$pembagian.'"',
        ]);
    }

    public function createdatabarubbAction()
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
                'status_gizi' => '0',
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
                $this->response->redirect('pengujian/databarubb');
            }
            else{
                $this->response->redirect('pengujian/createdatabarubb'); 
            }
        }
    }


    // DATA BARU BERAT BADAN
    public function databarubbAction()
    {
        $this->view->beratbadan = Beratbadan::find([
            'conditions'=>'status_gizi= "0"',
        ]);
    }

    public function bbbaru_editAction($id_balita)
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
                $this->response->redirect('pengujian/databarubb');
            }
            else{
                $this->response->redirect('pengujian/bbbaru_edit/'.$post['id_balita']); 
            }
        }

        $this->view->bb = Beratbadan::findFirstByIdBalita($id_balita);
    }

    public function deletebbAction($id_balita)
    {
        $bb = Beratbadan::findFirstByIdBalita($id_balita);  
        $bb->delete();

        $this->response->redirect('pengujian/databarubb');
        //cara lain
        //if ($users->delete()) {
        $this->response->redirect('pengujian/databarubb');
        //  }

    }

    public function normalisasidatabarubbAction()
    {
        $this->view->beratbadan = Pembagianbb::find([
            'conditions'=>'bagidata= "0"',
        ]);
    }

    public function tahapnormalisasidatabarubbAction()
    {
        $model = Beratbadan::find([
            'conditions'=>'status_gizi = "0"',
        ]);;

        $minumur = Beratbadan::minimum(['column'=>'umur']);
        $maxumur = Beratbadan::maximum(['column'=>'umur']);

        $minbb = Beratbadan::minimum(['column'=>'berat']);
        $maxbb = Beratbadan::maximum(['column'=>'berat']);

         foreach ($model as $bb):

            $idbalita = $bb->id_balita;
           
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

            $targetgizi = $bb->target;

            $cekid = Pembagianbb::findFirst('id_balita="'.$idbalita.'" and target="'.$targetgizi.'"');

            if( isset($cekid->id_pembagianbb))
            {
                $beratbadan = Pembagianbb::findFirst($cekid->id_pembagianbb);
            }
            else 
            {
                $beratbadan = new Pembagianbb();
                $beratbadan->assign([
                'id_balita' => $idbalita,
                'x1' => $x1,    
                'x2' => $x2,
                'x3' => $x3,
                'x4' => $x4,
                'x5' => $x5,
                'x6' => $x6,
                'x7' => $x7,
                'x8' => $x8,
                'target' => '0',
                'jenisdata' => 'Uji',
                'bagidata' => '0'
                ]);
            }
            if ($beratbadan->save()) {
                $this->response->redirect('pengujian/normalisasidatabarubb');
            }
            else{
               // $this->response->redirect('beratbadan/bbedit/'.$post['id_balita']); 
            }
         endforeach;
    }

    public function indexujidatabarubbAction()
    {
        if ($this->request->isPost()) 
        {
            $post = $this->request->getPost();
            $pembagian = $post['pembagian'];
            $learning_rate = $post['learning_rate'];
            $window = $post['window'];
            
            $this->response->redirect('pengujian/ujidatabarubb/'.$pembagian.'/'.$learning_rate.'/'.$window);
        }
    }

    public function ujidatabarubbAction($pembagian, $learning_rate, $window)
    {
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->beratbadan = Pembagianbb::find([
            // 'conditions'=>'id_pembagianbb = "92"',
            'conditions'=>'jenisdata="Uji" AND  bagidata = "0"',
            // 'conditions'=>'jenisdata="Uji" AND  bagidata = "'.$pembagian.'"',
        ]);
    }


    //DATA BARU TINGGI BADAN
    public function createdatabarutbAction()
    {
        if ($this->request->isPost()) 
        {
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
                'status_gizi' => '0',
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

            if ($tinggibadan->save(false)) {
                $this->response->redirect('pengujian/databarutb');
            }
            else{
                $this->response->redirect('pengujian/createdatabarutb'); 
            }
        }
    }

    public function databarutbAction()
    {
        $this->view->tinggibadan = Tinggibadan::find([
            'conditions'=>'status_gizi= "0"',
        ]);
    }

    public function tbbaru_editAction($id_balita)
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
                $this->response->redirect('pengujian/databarutb');
            }
            else{
                $this->response->redirect('pengujian/tbbaru_edit/'.$post['id_balita']); 
            }
        }

        $this->view->tb = Tinggibadan::findFirstByIdBalita($id_balita);
    }

    public function deletetbAction($id_balita)
    {
        $tb = Tinggibadan::findFirstByIdBalita($id_balita);  
        $tb->delete();

        $this->response->redirect('pengujian/databarutb');
        //cara lain
        //if ($users->delete()) {
        $this->response->redirect('pengujian/databarutb');
        //  }

    }

    public function normalisasidatabarutbAction()
    {
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'bagidata = "0"',
        ]);
    }

    public function tahapnormalisasidatabarutbAction()
    {
        $model2 = Tinggibadan::find([
            'conditions'=>'status_gizi = "0"',
        ]);;

        $minumur = Tinggibadan::minimum(['column'=>'umur']);
        $maxumur = Tinggibadan::maximum(['column'=>'umur']);

        $mintb = Tinggibadan::minimum(['column'=>'tinggi']);
        $maxtb = Tinggibadan::maximum(['column'=>'tinggi']);

         foreach ($model2 as $tb):

            $idbalita = $tb->id_balita;
           
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

            $targetgizi = $tb->target;

            $cekid = Pembagiantb::findFirst('id_balita="'.$idbalita.'" and target="'.$targetgizi.'"');

            if( isset($cekid->id_pembagiantb))
            {
                $tinggibadan = Pembagiantb::findFirst($cekid->id_pembagiantb);
            }
            else 
            {
                $tinggibadan = new Pembagiantb();
                $tinggibadan->assign([
                'id_balita' => $idbalita,
                'x1' => $x1,    
                'x2' => $x2,
                'x3' => $x3,
                'x4' => $x4,
                'x5' => $x5,
                'x6' => $x6,
                'x7' => $x7,
                'x8' => $x8,
                'target' => '0',
                'jenisdata' => 'Uji',
                'bagidata' => '0'
                ]);
            }
            if ($tinggibadan->save()) {
                $this->response->redirect('pengujian/normalisasidatabarutb');
            }
            else{
               // $this->response->redirect('beratbadan/bbedit/'.$post['id_balita']); 
            }
         endforeach;
    }

    public function indexujidatabarutbAction()
    {
        if ($this->request->isPost()) 
        {
            $post = $this->request->getPost();
            $pembagian = $post['pembagian'];
            $learning_rate = $post['learning_rate'];
            $window = $post['window'];
            
            $this->response->redirect('pengujian/ujidatabarutb/'.$pembagian.'/'.$learning_rate.'/'.$window);
        }
    }

    public function ujidatabarutbAction($pembagian, $learning_rate, $window)
    {
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            // 'conditions'=>'id_pembagianbb = "92"',
            'conditions'=>'jenisdata="Uji" AND  bagidata = "0"',
        ]);
    }

}

