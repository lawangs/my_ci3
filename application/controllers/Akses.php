<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends CI_Controller
{
	/**
	 * 
	 * @author      : Faisal Efendi 
	 * @copyright   : Tenggarong, 10 Mei 2020
	 * @version     : 20.5.10
	 * 
	 */

	function __construct()
	{
		parent::__construct();
		$this->authentication->protect();
		$this->load->model("Levels");
		$this->load->model("Aksess");
	}

	/**
	 * Show the Index Page for this controller.
	 */
	public function index()
	{
		$data =
			[
				'title'         => 'Hak Akses',
				'content'       => 'akses/akses_view',
				'js'			=> 'akses/akses_js',
				'levels'		=> $this->Levels->getAll(),
			];

		$this->load->view('layout/wrapper', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show($id = false)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id = false)
	{
		$data =
			[
				'level'			=> $this->Levels->getLevel(),
				'akses'			=> $this->Aksess->getAkses(),
			];

		$this->load->view('akses/edit_akses_view', $data);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update()
	{
		echo $this->input->post('menuId');
		// $inputan = $this->input->post();
		// $data = [
		// 	'uac_user_level'	=> $inputan['level'],
		// 	'uac_menu_id'		=> $inputan['menuId']
		// ];

		// $result = $this->db->get_where('tbmaster_user_access', $data);

		// if ($result->num_rows() < 0) {
		// 	$data = [
		// 		'uac_user_level'	=> $inputan['level'],
		// 		'uac_menu_id'		=> $inputan['menuId'],
		// 		'uac_baca'			=> '0',
		// 		'uac_tambah'		=> '0',
		// 		'uac_ubah'			=> '0',
		// 		'uac_hapus'			=> '0',
		// 		'uac_created_by'	=> $this->authentication->logged['user_username'],
		// 		'uac_created_at'	=>	date('Y-m-d h:i:s'),
		// 	];

		// 	$this->db->insert('tbmaster_user_access', $data);
		// } else {
		// 	$access = $this->db->get_where('tbmaster_user_access', $data)->row_array();
		// 	if ($inputan['jenis'] == 'baca') {
		// 		if ($access['uac_baca'] == '0') {
		// 			$this->db->update(
		// 				'tbmaster_user_access',
		// 				[
		// 					'uac_baca' => '1'
		// 				],
		// 				$data
		// 			);
		// 		} else {
		// 			$this->db->update(
		// 				'tbmaster_user_access',
		// 				[
		// 					'uac_baca' => '0'
		// 				],
		// 				$data
		// 			);
		// 		}
		// 	}
		// }
	}
	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		//
	}
}
