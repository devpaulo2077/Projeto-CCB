<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdmModel;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function login_submit()
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $adm_model = new AdmModel();
        $resultado = $adm_model->verificarADM($email, $senha);
        if($resultado == true){
            dd($resultado);
        } else {
            echo 'Erro';
        }
    }
    public function apis()
    {
        return view('apis');
    }
    public function cadFirst()
    {
        return view('cad-first');
    }
    public function cadSecond()
    {
        return view('cad-second');
    }
    public function cadThird()
    {
        return view('cad-third');
    }

    public function certificate()
    {
        return view('certificate');
    }
    public function consultInfo()
    {
        return view('consult');
    }
    public function main()
    {
        return view('main');
    }
    public function consultVolu()
    {
        return view('volu-consult');
    }
}