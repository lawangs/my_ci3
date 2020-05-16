<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksess extends CI_Model
{
    /**
     * 
     * @author      : Faisal Efendi
     * @copyright   : Tenggarong, 10 Mei 2020
     * @version     : 20.5.10
     * 
     */

    public function getAll()
    {
        return
            $this->db
            ->select('*')
            ->from('tbmaster_user_access')
            ->join('tbmaster_menu', 'menu_id = uac_menu_id', 'left')
            ->get()
            ->result_array();
    }

    public function getAkses()
    {
        return
            $this->db
            ->select('*')
            ->from('tbmaster_user_access')
            ->join('tbmaster_menu', 'menu_id = uac_menu_id', 'left')
            ->where('uac_user_level =', $this->input->post('level_user'))
            ->get()
            ->result_array();
    }
}
