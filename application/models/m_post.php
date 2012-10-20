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
    public function lister()
    {
        $this->db->select('*');
        $this->db->from('post');

        $query = $this->db->get();
        return $query->result();
    }
}