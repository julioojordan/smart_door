<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller {

	public function index()
	{
		$this->load->model('m_capacity');
		$capacity = $this->m_capacity->getCapacity()->row_array();
		$data['capacity'] = $capacity['capacity'];
		$data['in'] = $capacity['in_capacity'];
		$data['left'] = (int)$data['capacity'] - (int)$data['in'];
		$this->load->view('v_landing_page', $data);
	}

    public function elements()
	{
		$this->load->view('elements');
	}

	public function auto_count()
	{
		$this->load->model('m_capacity');
		$data= $this->m_capacity->getCapacity()->result();
		echo json_encode($data);
	}
}
