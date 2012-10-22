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
        $this->db->from('posts');

        $query = $this->db->get();
        return $query->result();
    }

    public function creer($data)
    {
        $sql = 'INSERT INTO post (id_membre, commentaire, image, titre, description) VALUES("'.$data["id_membre"].'","'.$data["commentaire"].'","'.$data["image"].'","'.$data["titre"].'","'.$data["description"].'")';
        $this->db->query($sql);
    }

    public function delete($id)
    {
        $this->db->delete($id);
    }
}