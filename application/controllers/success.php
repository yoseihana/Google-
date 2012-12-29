<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 28/12/12
 * Time: 11:13
 * To change this template use File | Settings | File Templates.
 */

class Success extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Inscritption réussie';
        $data['vue'] = $this->load->view('success_membre', $data, true);
        $this->load->view('layout', $data);
    }

    public function success_membre()
    {
        $data['title'] = 'Inscritption réussie';
        $dataLayout['vue'] = $this->load->view('success_membre', $data, true);
        $this->load->view('layout', $dataLayout);
    }
}