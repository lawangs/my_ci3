<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Levels extends CI_Model
{
    /**
     * 
     * @author      : Faisal Efendi
     * @copyright   : Tenggarong, 07 Mei 2020
     * @version     : 20.5.7
     * 
     */

    function getAll()
    {
        return $this->db->get(
            'tbmaster_user_level'
            // [
            //     'uvel_level !=' => '0'
            // ]
        )->result_array();
    }

    function getLevel()
    {
        return $this->db->get_where(
            'tbmaster_user_level',
            [
                'uvel_level' => $this->input->post('level_user')
            ]
        )->row_array();
    }

    function insert($data)
    {
        $this->db->insert('tbmaster_user_level', $data);
    }
}
