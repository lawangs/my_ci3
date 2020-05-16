<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	/**
	 * @author 		Faisal Efendi
	 * @copyright 	Tenggarong, 10 Oct 2019
	 * @uses		Controller Authentication
	 * @version		20.03.25
	 */

	public function index()
	{
		header('Unauthorized', true, 401);
		$this->load->view('login_view');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->authentication->login($username, $password);
	}

	public function logout()
	{
		$this->authentication->logout();
	}

	public function unauthorized()
	{
		header('Forbidden', true, 403);
		$data =
			[
				'title'         => 'Access Forbiden',
				'content'       => 'errors/html/error_403',
				'js'			=> '',
			];

		$this->load->view('layout/wrapper', $data);
	}

	// public function register()
	// {
	// 	$post = $this->input->post();

	// 	$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_users.user_username]');
	// 	$this->form_validation->set_rules('password', 'Password', 'required');
	// 	$this->form_validation->set_rules('fullname', 'Fullname', 'required');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	// 	$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|matches[password2]');
	// 	$this->form_validation->set_rules('password2', 'Password', 'required|matches[password]');

	// 	if ($this->form_validation->run() == false) {
	// 		$this->load->view('admin/register_view');
	// 	} else {
	// 		$this->authentication->register($post);
	// 	}
	// }

	// public function insert()
	// {
	// 	$data = array(
	// 		'user_username'     => 'SADMIN',
	// 		'user_password'     => password_hash('SADMIN', PASSWORD_DEFAULT),
	// 		'user_fullname'     => 'SUPER ADMINISTRATOR',
	// 		'user_email'        => 'lawangs@outlook.com',
	// 		'user_level'        => '0',
	// 		'user_create_by'    => 'SYSTEM',
	// 	);

}
