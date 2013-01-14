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
        $dataLayout['vue'] = $this->load->view('error_404', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_post_exist(){
        $data['title'] = 'Erreur de poste';
        $dataLayout['vue'] = $this->load->view('error_post_exist', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_pseudo(){
        $data['title'] = 'Erreur lors de la création du compte';
        $dataLayout['vue'] = $this->load->view('error_pseudo', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_field(){
        $data['title'] = 'Erreur lors de la création du compte';
        $dataLayout['vue'] = $this->load->view('error_field', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_letter(){
        $data['title'] = 'Erreur lors de la création du compte';
        $dataLayout['vue'] = $this->load->view('error_letter', $data, true);
        $this->load->view('layout', $dataLayout);
    }

    public function error_password(){
        $data['title'] = 'Erreur lors de la création du compte';
        $dataLayout['vue'] = $this->load->view('error_password', $data, true);
        $this->load->view('layout', $dataLayout);
    }
}