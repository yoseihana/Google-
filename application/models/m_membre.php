<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 22/10/12
 * Time: 17:00
 * To change this template use File | Settings | File Templates.
 */

class M_Membre extends CI_Model
{
    public function verifier($data)
    {
        $query = $this->db->get_where('membre',
            array(
                'email'=>$data['email'],
                 'mdp'=>$data['mdp']
            )
        );
        return $query->num_rows();
    }
}