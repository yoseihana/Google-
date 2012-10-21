<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 17/10/12
 * Time: 12:29
 * To change this template use File | Settings | File Templates.
 */

class M_Post extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function lister()
    {
        $this->db->select('*');
        $this->db->from('post');

        $query = $this->db->get();
        return $query->result();
    }

    public function ajouter(){
       //Chargement de la librairie
        $this->load->helpers(array('form', 'url'));

        //$slug = url_title($this->input->post('url'), 'dash', true);

        //Donnée pour la DB dans un tableau
        $data = array(
            'pseudo'=> $this->input->post('pseudo'),
            'commentaire'=>$this->textarea->post('commentaire'),
             'url'=>$this->input->post('url')
        );

        //Insertion DB
        return $this->db->insert('post', $data);
    }
}