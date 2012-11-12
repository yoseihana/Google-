<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 16/10/12
 * Time: 16:15
 * To change this template use File | Settings | File Templates.
 */

class Membre extends CI_Controller {

    public function index()
    {
        $this->load->helper('form');
        $data['titre'] = 'Se connecter à Partage ton lien';
        $data['vue'] = $this->load->view('connecter', $data, true);
        $this->load->view('layout', $data);
    }

    public function login()
    {
        $this->load->model('M_Membre');

        //Récupère un arrêt de données
        $data['mdp'] = $this->input->post('mdp');
        $data['email'] = $this->input->post('email');

        //Vérification si des données sont entrée
        if($this->M_Membre->verifier($data))
        {
            $info = $this->M_Membre->getMembre($data['email']);
            $this->session->set_userdata('logged_in', $info);
            redirect('post/lister');
        }
        else{
            redirect('error/error_utilisateur');
        }
    }

    public function unlogin()
    {
        $this->session->unset_userdata('logged_in');
        redirect('membre');
    }
}