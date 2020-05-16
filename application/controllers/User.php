<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	/**
	 * 
	 * @author      : Faisal Efendi 
	 * @copyright   : Tenggarong, 05 April 2020
	 * @version     : 20.4.5
	 * 
	 */

	function __construct()
	{
		parent::__construct();
		$this->authentication->protect();
		$this->load->model("Users");
		$this->load->model("Levels");
	}

	/**
	 * Show the Index Page for this controller.
	 */
	public function index()
	{
		$data =
			[
				'title'         => 'Daftar User',
				'content'       => 'user/user_view',
				'js'			=> 'user/user_js',
				'users'			=> $this->Users->getAll(),
			];

		$this->load->view('layout/wrapper', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$data =
			[
				'title'         => 'Form Buat User',
				'content'       => 'user/tambah_user_view',
				'js'			=> 'user/user_js',
				'levels'		=> $this->Levels->getAll(),
			];

		$this->load->view('layout/wrapper', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbmaster_user.user_username]');
		$this->form_validation->set_rules('fullname', 'Fullname', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]');
		$this->form_validation->set_rules(
			'password2',
			'Password',
			'required|trim|matches[password]',
			['matches' => 'Password dont matches!']
		);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbmaster_user.user_email]');
		$this->form_validation->set_rules('level', 'Level', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			$inputan = $this->input->post();

			$data = [
				'user_username'		=> strtoupper($inputan['username']),
				'user_password'		=> password_hash($inputan['password'], PASSWORD_DEFAULT),
				'user_fullname'		=> $inputan['fullname'],
				'user_email'		=> $inputan['email'],
				'user_level'		=> $inputan['level'],
				'user_created_by'	=> $this->authentication->logged['user_username'],
				'user_created_at'	=> date('Y-m-d h:i:s')
			];
			$this->Users->insert($data);

			// Pemberitahuan
			$this->session->set_flashdata(
				'toastr',
				[
					'title'     => '',
					'message'   => 'Berhasil menambahkan user',
					'type'      => 'success'
				]
			);
			// End Pemberitahuan

			redirect('user');
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id)
	{
		$data =
			[
				'title'         => 'Form Edit User',
				'content'       => 'user/edit_user_view',
				'js'			=> 'user/user_js',
				'levels'		=> $this->Levels->getAll(),
				'user'			=> $this->Users->getUser($id),
			];

		$this->load->view('layout/wrapper', $data);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update()
	{
		$inputan 		= $this->input->post();
		$activated 		= $this->session->flashdata('activated');
		$deactivated	= $this->session->flashdata('deactivated');

		if ($activated) {
			$data = $activated;
			$this->Users->update($data);
			// Pemberitahuan
			$this->session->set_flashdata(
				'toastr',
				[
					'title'     => '',
					'message'   => 'Berhasil mengaktifkan user',
					'type'      => 'success'
				]
			);
			// End Pemberitahuan
		} elseif ($deactivated) {
			$data = $deactivated;
			$this->Users->update($data);
			// Pemberitahuan
			$this->session->set_flashdata(
				'toastr',
				[
					'title'     => '',
					'message'   => 'Berhasil nonaktifkan user',
					'type'      => 'success'
				]
			);
			// End Pemberitahuan
		} elseif ($inputan) {
			$data =
				[
					'user_username'		=> strtoupper($inputan['username']),
					// 'user_password'		=> password_hash($inputan['password'], PASSWORD_DEFAULT),
					'user_fullname'		=> $inputan['fullname'],
					'user_email'		=> $inputan['email'],
					'user_level'		=> $inputan['level'],
					'user_updated_by'	=> $this->authentication->logged['user_username'],
					'user_updated_at'	=> date('Y-m-d h:i:s')
				];
			$this->Users->update($data);

			// Pemberitahuan
			$this->session->set_flashdata(
				'toastr',
				[
					'title'     => '',
					'message'   => 'Berhasil menambahkan user',
					'type'      => 'success'
				]
			);
			// End Pemberitahuan
		} else {
			// Pemberitahuan
			$this->session->set_flashdata(
				'toastr',
				[
					'title'     => '',
					'message'   => 'Terjadi kesalahan',
					'type'      => 'error'
				]
			);
			// End Pemberitahuan
		}

		redirect('user');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		$data =
			[
				'user_flag'			=> '1',
				'user_username'		=> $id,
				'user_deleted_by'	=> $this->authentication->logged['user_username'],
				'user_deleted_at'	=> date('Y-m-d h:i:s')
			];
		$this->Users->soft_delete($data);
		// Pemberitahuan
		$this->session->set_flashdata(
			'toastr',
			[
				'title'     => '',
				'message'   => 'Berhasil menghapus',
				'type'      => 'success'
			]
		);
		// End Pemberitahuan

		redirect('user');
	}

	/**
	 * Additional 
	 * Activated user
	 */
	public function activated($id)
	{
		$this->session->set_flashdata(
			'activated',
			[
				'user_username'		=> $id,
				'user_is_active'	=> '1',
				'user_updated_by'	=> $this->authentication->logged['user_username'],
				'user_updated_at'	=> date('Y-m-d h:i:s')
			]
		);

		redirect('user/update/');
	}

	/**
	 * Additional 
	 * Deactivated user
	 */
	public function deactivated($id)
	{
		$this->session->set_flashdata(
			'deactivated',
			[
				'user_username'		=> $id,
				'user_is_active'	=> '0',
				'user_updated_by'	=> $this->authentication->logged['user_username'],
				'user_updated_at'	=> date('Y-m-d h:i:s')
			]
		);

		redirect('user/update/');
	}
}
