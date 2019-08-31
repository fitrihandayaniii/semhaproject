<?php

class PelatihanController extends \Phalcon\Mvc\Controller
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
                $this->response->redirect('pelatihan/pelatihanbb/'.$pembagian.'/'.$learning_rate.'/'.$window.'/'.$indeks);
           }
           else{
                $this->response->redirect('pelatihan/pelatihantb/'.$pembagian.'/'.$learning_rate.'/'.$window.'/'.$indeks);
           }
        }

    }
    public function pelatihanbbAction($pembagian, $learning_rate, $window, $indeks)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
		$this->view->beratbadan = Pembagianbb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
    }

    public function pelatihanbb2Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->beratbadan = Pembagianbb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot = $bobot;
    }

    public function pelatihanbb3Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot3)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->beratbadan = Pembagianbb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot3 = $bobot3;
    }

    public function pelatihanbb4Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot5)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->beratbadan = Pembagianbb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot5 = $bobot5;
    }

    public function pelatihanbb5Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot7)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->beratbadan = Pembagianbb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot7 = $bobot7;
    }

    public function pelatihanbb6Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot9)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->beratbadan = Pembagianbb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot9 = $bobot9;
    }

    public function pelatihanbb7Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot11)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->beratbadan = Pembagianbb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot11 = $bobot11;
    }

    public function nilai11($bb, $w11, $w12, $w21, $w22)
    {
                                        
        //echo "(".$bb." - ".$w11.") * (".$bb." - ".$w11.") = ";
        echo number_format($w11,6) ;

        $kuadratw11x1 = ($bb - $w11) * ($bb - $w11) ;
        // echo $kuadratw11x1;
        echo "<br>"; 
                                    
    	return $kuadratw11x1;
    }

    public function nilai12($bb, $w11, $w12, $w21, $w22)
    {
        // echo "(".$bb." - ".$w12.") * (".$bb." - ".$w12.") = ";
        echo number_format($w12,6);

        $kuadratw12 = ($bb - $w12) * ($bb - $w12) ;
        // echo $kuadratw12;
        echo "<br>"; 
                                    
        return $kuadratw12;
    }

    public function nilai21($bb, $w11, $w12, $w21, $w22)
    {
        // echo "(".$bb." - ".$w21.") * (".$bb." - ".$w21.") = ";
        echo number_format($w21,6);
        $kuadrat = ($bb - $w21) * ($bb - $w21) ;
        // echo $kuadrat;
        echo "<br>"; 
                                    
        return $kuadrat;
    }

    public function nilai22($bb, $w11, $w12, $w21, $w22)
    {
        // echo "(".$bb." - ".$w22.") * (".$bb." - ".$w22.") = ";
        echo number_format($w22,6);
        $kuadrat = ($bb - $w22) * ($bb - $w22) ;
        // echo $kuadrat;
        echo "<br>"; 
                                    
        return $kuadrat;
    }



    public function simpan_bobot_akhir($id_parameter, $x, $w, $nilai)
    {
        $cekparameter = BobotAkhir::findFirst('id_parameter="'.$id_parameter.'" and x="'.$x.'" and w="'.$w.'"');
        // echo $bb-> id_balita;
        if( isset($cekparameter->id_parameter))
        {
            $nilaiparameter= BobotAkhir::findFirst($cekparameter->id_bobot_akhir);
        }
        else 
        {
            $nilaiparameter = new BobotAkhir();
        }
        
        $nilaiparameter->assign([
            'id_parameter' => $id_parameter,     
            'x' => $x,   
            'w' => $w,
            'nilai' => number_format($nilai,6), 
        ]);
        
        if ($nilaiparameter->save()) {
        }
    }


    public function pelatihantbAction($pembagian, $learning_rate, $window, $indeks)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);

    }

    public function pelatihantb2Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot = $bobot;
    }

    public function pelatihantb3Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot3)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot3 = $bobot3;
    }

    public function pelatihantb4Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot5)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot5 = $bobot5;
    }

    public function pelatihantb5Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot7)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot7 = $bobot7;
    }

    public function pelatihantb6Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot9)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot9 = $bobot9;
    }

    public function pelatihantb7Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot11)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot11 = $bobot11;
    }

    public function pelatihantb8Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot13)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot13 = $bobot13;
    }

    public function pelatihantb9Action($pembagian, $learning_rate, $window, $indeks, $learning_rate2, $epoch, $bobot15)
    {
        $this->view->indeks = $indeks;
        $this->view->learning_rate = $learning_rate;
        $this->view->window = $window;
        $this->view->pembagian = $pembagian;
        $this->view->tinggibadan = Pembagiantb::find([
            'conditions'=>'jenisdata="Latih" AND bagidata = "'.$pembagian.'"',
        ]);
        $this->view->learning_rate2 = $learning_rate2;
        $this->view->epoch = $epoch;
        $this->view->bobot15 = $bobot15;
    }

    public function nilai11tb($tb, $w11, $w12, $w21, $w22, $w31, $w32)
    {
                                        
        //echo "(".$bb." - ".$w11.") * (".$bb." - ".$w11.") = ";
        echo number_format($w11,6) ;

        $kuadratw11x1 = ($tb - $w11) * ($tb - $w11) ;
        // echo $kuadratw11x1;
        echo "<br>"; 
                                    
        return $kuadratw11x1;
    }

    public function nilai12tb($tb, $w11, $w12, $w21, $w22, $w31, $w32)
    {
        // echo "(".$bb." - ".$w12.") * (".$bb." - ".$w12.") = ";
        echo number_format($w12,6);

        $kuadratw12 = ($tb - $w12) * ($tb - $w12) ;
        // echo $kuadratw12;
        echo "<br>"; 
                                    
        return $kuadratw12;
    }

    public function nilai21tb($tb, $w11, $w12, $w21, $w22, $w31, $w32)
    {
        // echo "(".$bb." - ".$w21.") * (".$bb." - ".$w21.") = ";
        echo number_format($w21,6);
        $kuadrat = ($tb - $w21) * ($tb - $w21) ;
        // echo $kuadrat;
        echo "<br>"; 
                                    
        return $kuadrat;
    }

    public function nilai22tb($tb, $w11, $w12, $w21, $w22, $w31, $w32)
    {
        // echo "(".$bb." - ".$w22.") * (".$bb." - ".$w22.") = ";
        echo number_format($w22,6);
        $kuadrat = ($tb - $w22) * ($tb - $w22) ;
        // echo $kuadrat;
        echo "<br>"; 
                                    
        return $kuadrat;
    }

    public function nilai31tb($tb, $w11, $w12, $w21, $w22, $w31, $w32)
    {
        // echo "(".$bb." - ".$w31.") * (".$bb." - ".$w31.") = ";
        echo number_format($w31,6);
        $kuadrat = ($tb - $w31) * ($tb - $w31) ;
        // echo $kuadrat;
        echo "<br>"; 
                                    
        return $kuadrat;
    }

    public function nilai32tb($tb, $w11, $w12, $w21, $w22, $w31, $w32)
    {
        // echo "(".$bb." - ".$w31.") * (".$bb." - ".$w31.") = ";
        echo number_format($w32,6);
        $kuadrat = ($tb - $w32) * ($tb - $w32) ;
        // echo $kuadrat;
        echo "<br>"; 
                                    
        return $kuadrat;
    }

    public function simpan_bobot_akhir_tb($id_parameter, $x, $w, $nilai)
    {
        $cekparameter = BobotAkhirTb::findFirst('id_parameter="'.$id_parameter.'" and x="'.$x.'" and w="'.$w.'"');
        // echo $bb-> id_balita;
        if( isset($cekparameter->id_parameter))
        {
            
            $nilaiparameter= BobotAkhirTb::findFirst($cekparameter->id_bobot_akhir);
        }
        else 
        {
            $nilaiparameter = new BobotAkhirTb();
        }
        
        $nilaiparameter->assign([
            'id_parameter' => $id_parameter,     
            'x' => $x,   
            'w' => $w,
            'nilai' => $nilai,
            

        ]);
        
        if ($nilaiparameter->save()) {
        }
    }





}

