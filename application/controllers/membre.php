<?php

class Membre extends CI_Controller
{

    public function index()
    {
        $this->load->helper('form');
        $data['title'] = 'Se connecter à Partages Tes Sites';
        $data['vue'] = $this->load->view('connecter', $data, true);
        $this->load->view('layout', $data);
    }

    public function login()
    {
        $this->load->model('M_Membre');
        $this->load->helper('security');

        //Récupère un arrêt de données
        $data['mdp'] = $this->input->post('mdp');
        $data['mdp'] = do_hash($data['mdp'], 'md5');
        $data['email'] = $this->input->post('email');
        $data['title'] = 'Se connecter à Partages Tes Sites';

        //Vérification si des données sont entrée
        if ($this->M_Membre->verifier($data))
        {

            $info = $this->M_Membre->getMembre($data['email']);
            $this->session->set_userdata('logged_in', $info);
            redirect('post/lister');
        } else
        {
            redirect('error/error_utilisateur');
        }
    }

    public function unlogin()
    {
        $this->session->unset_userdata('logged_in');
        redirect('membre');
    }

    public function ajoutermembre()
    {
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('M_Membre');
        $dataList['title'] = 'S\'inscrire sur le sitePartages Tes Sites';


        $dataLayout['vue'] = $this->load->view('ajoutermembre', $dataList, true);
        $this->load->view('layout', $dataLayout);
    }

    public function creer()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('M_Membre');
        $this->load->helper('security');
        $this->load->library('email');

        $email = $this->input->post('email');
        $pseudo = $this->input->post('pseudo');
        $mdp = $this->input->post('mdp');

        $this->email->from('anna.buffart@gmail.com', 'Partages Tes Sites');
        $this->email->to($email);
        $this->email->cc('anna.buffart@gmail.com');

        $this->email->subject('Inscription sur le site Partages Tes Sites');
        $this->email->message('Bonjour,
        Nous prenons compte de ton inscription '.$pseudo.' sur le site www.sharelink.buffart.eu.

        Tu peux dés lors te connecter sur le site via:

        Ton email '.$email.'
        Ton mot de passe '.$mdp.'.

        Bon partage!

        Cordialement,

        L\'équipe de Partages Tes Sites');

        $isNewMembre = $this->checkNew($pseudo, $email, $mdp);

        if ($isNewMembre)
        {

            //Reprise des données dans le formulaire
            $data['pseudo'] = $this->input->post('pseudo');
            $data['email'] = $this->input->post('email');
            $data['mdp'] = $this->input->post('mdp');
            $data['mdp'] = do_hash($data['mdp'], 'md5');

            $this->M_Membre->creer($data);

            $this->email->send();

            echo $this->email->print_debugger();

            redirect('success/success_membre');
        }
    }


    public function checkNew($pseudo, $email, $mdp)
    {

        $this->load->model('M_Membre');

        // Renvoyer une erreur car au moins un des 3 champs n'est pas remplis
        if (!trim($pseudo) OR !trim($email) OR !trim($mdp))
        {
            redirect('error/error_field');
            return false;
        }

        // Verifier le pseudo
        if (preg_match('/^[a-zA-Z0-9_-]{2,}$/i', $pseudo))
        {
            if ($this->M_Membre->isPseudoExist($pseudo))
            {
                redirect('error/error_membre_pseudo');
                return false;

            }

        } else
        {
            redirect('error/error_pseudo');
            return false;
        }

        // Verifier l'email
        if (preg_match('/^[a-zA-Z0-9_+.-]{2,}@[a-zA-Z0-9_.-]+\.[a-zA-Z0-9_.-]{2,}$/i', $email))
        {
            if ($this->M_Membre->isMailExist($email))
            {
                redirect('error/error_membre_mail');
                return false;

            }
        } else
        {
            redirect('error/error_letter');
            return false;
        }


        // Verifier le mdp
        if (!preg_match('/^(\S{4,12})$/', $mdp))
        {
            redirect('error/error_password');
            return false;
        }

        return true;
    }
}