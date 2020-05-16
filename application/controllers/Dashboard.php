<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		// $this->load->model("Models");
	}

	/**
	 * Show the Index Page for this controller.
	 */
	public function index()
	{
		$data =
			[
				'title'          => 'Dashboard',
				'content'        => 'dashboard_view',
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
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		//
	}
}
