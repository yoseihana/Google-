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
        $data['title'] = 'Se connecter à Partage ton lien';
        $data['vue'] = $this->load->view('connecter', $data, true);
        $this->load->view('layout', $data);
    }

    public function login()
    {
        $this->load->model('M_Membre');

        //Récupère un arrêt de données
        $data['mdp'] = $this->input->post('mdp');
        $data['email'] = $this->input->post('email');
        $data['title'] = 'Se connecter à Partage ton lien';

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

    public function ajoutermembre(){
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('M_Membre');
        $dataList['title'] = "S'inscrire sur le site Partage ton site";


        $dataLayout['vue'] = $this->load->view('ajoutermembre', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }

    public function creer(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('M_Membre');

        $email = $this->input->post('email');
        $pseudo = $this->input->post('pseudo');

        if($this->M_Membre->isMailExist($email)){

            redirect('error/error_membre_mail');

        }else{
            if($this->M_Membre->isPseudoExist($pseudo)){
                redirect('error/error_membre_pseudo');
            }else{
                //Reprise des données dans le formulaire
                $data['pseudo'] = $this->input->post('pseudo');
                $data['email'] = $this->input->post('email');
                $data['mdp']=$this->input->post('mdp');

                $this->M_Membre->creer($data);

                echo 'Inscription ok';
            }
        }
    }
}