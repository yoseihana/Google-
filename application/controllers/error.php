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
        $data['title'] = 'Erreur de lien';
        $data['vue'] = $this->load->view('error_lien', $data, true);
        $this->load->view('layout', $data);
    }

    public function error_lien()
    {
        $data['title'] = 'Erreur de lien';
        $dataLayout['vue'] = $this->load->view('error_lien', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_utilisateur()
    {
        $data['title'] = 'Erreur de lien';
        $dataLayout['vue'] = $this->load->view('error_utilisateur', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_lien_ajout()
    {
        $data['title'] = 'Erreur de lien';
        $dataLayout['vue'] = $this->load->view('error_lien_ajout', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_ajax()
    {
        $data['title'] = 'Erreur de lien';
        $dataLayout['vue'] = $this->load->view('error_ajax', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_membre_mail()
    {
        $data['title'] = 'Erreur d\'e-mail';
        $dataLayout['vue'] = $this->load->view('error_membre_mail', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_membre_pseudo()
    {
        $data['title'] = 'Erreur de pseudo';
        $dataLayout['vue'] = $this->load->view('error_membre_pseudo', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_404(){
        $data['title'] = 'Erreur de page';
        $dataLayout['vue'] = $this->load->view('error_page', $data, true);
        $this->load->view('layout', $dataLayout);
    }
}