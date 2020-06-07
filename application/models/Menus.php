<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menus extends CI_Model
{
    /**
     * 
     * @author      : Faisal Efendi
     * @copyright   : Tenggarong, 26 Mei 2020
     * @version     : 20.5.26
     * 
     */

    public function getAll()
    {
        return
            $this->db
            ->select('*')
            ->from('tbmaster_menu')
            // ->join('tbmaster_menu', 'menu_id = uac_menu_id', 'left')
            ->get()
            ->result_array();
    }

    public function getParent()
    {
        return
            $this->db
            ->select('*')
            ->from('tbmaster_menu')
            ->where('menu_parent_id', NULL)
            // ->where('menu_is_active', '1')
            ->get()
            ->result_array();
    }

    public function insert($data)
    {
        $data['menu_id'] = $this->_id();
        $this->db->insert('tbmaster_menu', $data);
    }

    private function _id()
    {
        $query = $this->db->query(
            "SELECT MAX(RIGHT(menu_id,3)) AS kd_max FROM tbmaster_menu"
        );

        $kd = "";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        // Hasil id 
        $id = 'M' . $kd;
        return $id;
    }

    public function edit($id)
    {
        return $this->db->get_where(
            'tbmaster_menu',
            [
                'menu_id'   => $id
            ]
        )->row_array();
    }

    public function update($data)
    {
        $this->db->update(
            'tbmaster_menu',
            $data,
            [
                'menu_id'   => $data['menu_id']
            ]
        );
    }
}
