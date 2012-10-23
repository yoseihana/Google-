<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 23/10/12
 * Time: 11:52
 * To change this template use File | Settings | File Templates.
 */

class Error extends CI_Controller
{
    public function index()
    {
        $data['titre'] = 'Erreur de lien';
        $data['vue'] = $this->load->view('error_lien', $data, true);
        $this->load->view('layout', $data);
    }

    public function error_lien()
    {
        $dataList['titre'] = 'Erreur de lien';
        $dataLayout['vue'] = $this->load->view('error_lien', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }
}