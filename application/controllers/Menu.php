<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	/**
	 * 
	 * @author      : Faisal Efendi 
	 * @copyright   : Tenggarong, 26 Mei 2020
	 * @version     : 20.5.26
	 * 
	 */

	function __construct()
	{
		parent::__construct();
		$this->authentication->protect();
		$this->load->model("Menus");
	}

	/**
	 * Show the Index Page for this controller.
	 */
	public function index()
	{
		$data =
			[
				'title'         => 'List Menu',
				'content'       => 'menu/menu_view',
				'js'			=> 'menu/menu_js',
				'menus'			=> $this->Menus->getParent(),
			];

		$this->load->view('layout/wrapper', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		if (empty($this->input->post())) {
			redirect('menu');
		}
		$data =
			[
				'parents'	=> $this->Menus->getParent(),
			];

		$this->load->view('menu/tambah_menu_view', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store()
	{
		$inputan = $this->input->post();
		$parent = $inputan['parent'];

		$data =
			[
				'menu_name'			=> strtoupper($inputan['menu']),
				'menu_url'			=> ($parent != 'NULL') ? $inputan['url'] : NULL,
				'menu_icon'			=> $inputan['icon'],
				'menu_parent_id'	=> ($parent != 'NULL') ? $parent : NULL,
				'menu_is_active'	=> '1'
			];

		$this->Menus->insert($data);

		// Pemberitahuan
		$this->session->set_flashdata(
			'toastr',
			[
				'title'     => '',
				'message'   => 'Berhasil menambahkan menu',
				'type'      => 'success'
			]
		);
		// End Pemberitahuan

		redirect('menu');
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
	public function edit($id = false)
	{
		if (empty($this->input->post())) {
			redirect('menu');
		}
		$id = $this->input->post('id');
		$data =
			[
				'menu'	=> $this->Menus->edit($id),
				'parents'	=> $this->Menus->getParent(),
			];

		$this->load->view('menu/edit_menu_view', $data);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update()
	{
		if (empty($this->input->post())) {
			redirect('menu');
		}
		$inputan = $this->input->post();
		$parent = $inputan['parent'];

		$data =
			[
				'menu_id'			=> $inputan['id'],
				'menu_name'			=> strtoupper($inputan['menu']),
				'menu_url'			=> ($parent != 'NULL') ? $inputan['url'] : NULL,
				'menu_icon'			=> $inputan['icon'],
				'menu_parent_id'	=> ($parent != 'NULL') ? $parent : NULL,
				'menu_is_active'	=> $inputan['status']
			];

		$this->Menus->update($data);

		// Pemberitahuan
		$this->session->set_flashdata(
			'toastr',
			[
				'title'     => '',
				'message'   => 'Berhasil mengubah menu',
				'type'      => 'success'
			]
		);
		// End Pemberitahuan

		redirect('menu');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		//
	}
}
