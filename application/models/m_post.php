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
        $this->db->select ('posts.*, membre.*');
        $this->db->from ('posts');
        $this->db->join ('membre', 'posts.id_membre = membre.id_membre');
        $this->db->order_by('id_post','desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function creer($data)
    {
        $sql = 'INSERT INTO posts
                (id_membre, commentaire, image, titre, description, lien) VALUES("'
                .$data["id_membre"].'","'
                .$data["commentaire"].'","'
                .$data["image"].'","'
                .$data["titre"].'","'
                .$data["description"].'","'
                .$data["lien"].'")';
        $this->db->query($sql);
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
        return $query->result();
    }
}