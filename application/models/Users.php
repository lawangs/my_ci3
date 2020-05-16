<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Model
{
    /**
     * 
     * @author      : Faisal Efendi
     * @copyright   : Tenggarong, 05 April 2020
     * @version     : 20.4.5
     * 
     */

    private $_session;
    private $flag;

    public function __construct()
    {
        $this->_session = $this->authentication->logged;
    }

    function getAll()
    {
        return
            $this->db
            ->select('*')
            ->from('tbmaster_user')
            ->join('tbmaster_user_level', 'uvel_level = user_level', 'left')
            ->where(
                [
                    'user_level !='     => '0',
                    'user_username !='  => $this->_session['user_username'],
                    'user_flag'         => NULL
                ]
            )
            ->get()
            ->result_array();
    }

    function getUser($id)
    {
        return $this->db->get_where('tbmaster_user', ['user_username' => $id])->row_array();
    }

    function insert($data)
    {
        $this->db->insert('tbmaster_user', $data);
    }

    function update($data)
    {
        $this->db->update(
            'tbmaster_user',
            $data,
            [
                'user_username' => $data['user_username']
            ]
        );
    }

    function soft_delete($data)
    {
        $this->db->update(
            'tbmaster_user',
            $data,
            [
                'user_username' => $data['user_username']
            ]
        );
    }
}
