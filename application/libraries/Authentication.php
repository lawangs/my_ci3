<?php if (!defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Authentication
{
    /**
     * @author 		Faisal Efendi
     * @copyright 	Tenggarong, 10 Oct 2019
     * @uses		Library Login
     * @version		20.03.25
     */

    //the array the settings will be stored as
    public $logged = array();
    public $ceck = array();

    // SET SUPER GLOBAL
    var $CI = NULL;
    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');
        //fire the method loading the data
        $this->initUserSession();
    }

    // Fungsi login
    public function login($username, $password)
    {
        // Cek Apakah user ada di database
        $user = $this->CI->db->get_where('tbmaster_user', ['user_username' => $username])->row_array();

        // Jika Ada Di Database
        if ($user) {

            //Cek User Status Apakah Aktif
            if ($user['user_is_active'] == '1') {

                // Cek Password User
                if (password_verify($password, $user['user_password'])) {
                    $data =
                        [
                            'username'  => $user['user_username'],
                            'level'     => $user['user_level'],
                            'sessionId' => uniqid(rand())
                        ];
                    $this->CI->session->set_userdata($data);
                    // Update Data Session Ke Database
                    $this->CI->db->update(
                        'tbmaster_user',
                        [
                            'user_session'      => $data['sessionId'],
                            'user_ip_address'   => $this->CI->input->ip_address(),
                        ],
                        ['user_username' => $data['username']]
                    );
                    // Pemberitahuan
                    $this->CI->session->set_flashdata(
                        'toastr',
                        [
                            'title'     => 'Selamat datang',
                            'message'   => $user['user_fullname'],
                            'type'      => 'info'
                        ]
                    );
                    redirect('dashboard');

                    //Jika Password Tidak Cocok
                } else {
                    $this->CI->session->set_flashdata(
                        [
                            'title'     => 'Invalid Username or Password!',
                        ]
                    );
                    redirect('auth');
                }

                // Jika User Non-Aktif
            } else {
                $this->CI->session->set_flashdata(
                    [
                        'title'     => 'Username is not activated',
                    ]
                );
                redirect('auth');
            }

            // User Tidak Ada Di Database
        } else {
            $this->CI->session->set_flashdata(
                [
                    'title'     => 'Invalid Username or Password!',
                ]
            );
            redirect('auth');
        }
    }


    // Fungsi logout
    public function logout()
    {
        $SessionUser = $this->CI->session->userdata('username');
        $this->CI->db->update(
            'tbmaster_user',
            [
                'user_session'      => NULL,
                'user_ip_address'   => NULL,
            ],
            ['user_username' => $SessionUser]
        );

        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('sessionId');
        $this->CI->session->unset_userdata('level');

        redirect('auth');
    }


    // Fungsi cek login
    // Taruh di view paling atas agar halaman terproteksi 
    /* <?php $this->authentication->protect(); ?> */
    public function protect()
    {
        $usernameSession = $this->CI->session->userdata('username');
        $levelSession    = $this->CI->session->userdata('username');
        $SessionId       = $this->CI->session->userdata('sessionId');

        // Cek Apakah user session ada di database
        $user = $this->CI->db->get_where(
            'tbmaster_user',
            [
                'user_username' => $usernameSession
            ]
        )->row_array();

        // Jika tidak ada didatabase atau session tidak sama dengan random id
        if ($usernameSession == '' || $SessionId != $user['user_session']) {
            $this->CI->session->set_flashdata(
                [
                    'title'     => 'Please login',
                ]
            );
            redirect('auth');
        } else {
            // $menu  = uri_string(); //$this->CI->uri->segment(1);

            // $queryMenu = $this->CI->db->get_where('tbmaster_menu', ['menu_url' => $menu])->row_array();

            // $menu_id   = $queryMenu['menu_id'];

            // $userAccess = $this->CI->db->get_where(
            //     'tbmaster_user_access',
            //     [
            //         'uac_user_level'    => $user['user_level'],
            //         'uac_menu_id'       => $menu_id
            //     ]
            // );

            // if ($userAccess->num_rows() < 1) {
            //     redirect('auth/error');
            // }

            $uri  = uri_string();
            $uri1 = $this->CI->uri->segment(1);
            $uri2 = $this->CI->uri->segment(2);

            $queryMenu = $this->CI->db->get_where('tbmaster_menu', ['menu_url' => $uri1])->row_array();
            $menu_id   = $queryMenu['menu_id'];

            $userAccess = $this->CI->db->get_where(
                'tbmaster_user_access',
                [
                    'uac_user_level'    => $user['user_level'],
                    'uac_menu_id'       => $menu_id
                ]
            )->row_array();

            if ($userAccess == NULL) {
                redirect('auth/unauthorized');
            } elseif ($userAccess['uac_baca'] == '0' && $uri1 == $queryMenu['menu_url']) {
                redirect('auth/unauthorized');
            } elseif ($userAccess['uac_tambah'] == '0' && $uri1 == $queryMenu['menu_url'] && ($uri2 == 'create' || $uri2 == 'store')) {
                redirect('auth/unauthorized');
            } elseif ($userAccess['uac_ubah'] == '0' && $uri1 == $queryMenu['menu_url'] && ($uri2 == 'show' || $uri2 == 'edit' || $uri2 == 'update')) {
                redirect('auth/unauthorized');
            } elseif ($userAccess['uac_hapus'] == '0' && $uri1 == $queryMenu['menu_url'] && $uri2 == 'destroy') {
                redirect('auth/unauthorized');
            }
        }
    }


    // Fungsi Register
    // public function register($post)
    // {
    //     $data = array(
    //         'user_username'     => $post['username'],
    //         'user_password'     => password_hash($post['password'], PASSWORD_DEFAULT),
    //         'user_fullname'     => $post['fullname'],
    //         'user_email'        => $post['email'],
    //         'user_level'        => '2',
    //         'user_create_by'    => 'lawangs',
    //     );

    //     $this->CI->db->insert('tbmaster_user', $data);
    // }


    // Fungsi Global Variabel
    public function initUserSession()
    {
        $SessionUser = $this->CI->session->userdata('username');

        //retrieve/set the data
        //returns an associative array of config settings
        $this->logged = $this->CI->db->get_where('tbmaster_user', ['user_username' => $SessionUser])->row_array();
    }
}
