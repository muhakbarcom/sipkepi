<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
		$this->load->model('Jobdesk_model');
	}

	public function index()
	{

		$data['title'] = 'Dashboard';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'Dashboard' => '',
		];
		$data['chartjs'] = $this->chartJS();
		$data['chartjbs'] = $this->chartJBS();
		$bulan = $this->getbulan();
		$data['lineChartMonth'] = substr($bulan->tanggal, 0, 4);
		$data['lineChartDay'] = substr($bulan->tanggal, 5, 6);

		$data['page'] = 'Dashboard/Index';
		$this->load->view('template/backend', $data);
	}

	public function getbulan()
	{
		$laporan = $this->Jobdesk_model->chartbulan();
		return $laporan;
	}

	public function chartJS()
	{
		$laporan = $this->Jobdesk_model->chart();
		$chart = [];
		foreach ($laporan as $key => $value) {
			$chart[] = (int)$value->js;
		}
		$chart = array_reverse($chart);
		return $chart;
	}
	public function chartJBS()
	{
		$laporan = $this->Jobdesk_model->chart();
		$chart = [];
		foreach ($laporan as $key => $value) {
			$chart[] = (int)$value->jbs;
		}
		$chart = array_reverse($chart);
		return $chart;
	}
}
