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
        $this->db->select ('posts.*, membres.*');
        $this->db->from ('posts');
        $this->db->join ('membres', 'posts.id_membre = membres.id_membre');
        $this->db->order_by('id_post','desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function creer($data)
    {
        $query = $this->db->insert('posts',
            array(
                'id_membre' => $data['id_membre'] ,
                'commentaire' => $data['commentaire'],
                'image' => $data['image'],
                'titre' => $data['titre'],
                'description' => $data['description'],
                'lien' => $data['lien']
            ));

        return $query;
    }

    public function delete($id)
    {
        $this->db->delete('posts', array('id_post'=>$id));
    }

    public function modifier($data, $id)
    {
        $this->db->update('posts', $data, array('id_post'=>$id));
    }

    public function voir($id)
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('id_post',$id);

        $query = $this->db->get();
        return $query->row();
    }
}