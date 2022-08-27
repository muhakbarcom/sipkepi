<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Jobdesk_model');
        // $this->load->model('Surat_keluar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan';
            $config['first_url'] = base_url() . 'laporan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        if ($dari) {
            $config['total_rows'] = $this->Jobdesk_model->filter_laporan_jobdesk_total($q, $dari, $sampai);
            $laporan = $this->Jobdesk_model->filter_laporan_jobdesk($config['per_page'], $start, $q, $dari, $sampai);
        } else {
            $config['total_rows'] = $this->Jobdesk_model->laporan_jobdesk_total($q);
            $laporan = $this->Jobdesk_model->laporan_jobdesk($config['per_page'], $start, $q);
        }

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_data' => $laporan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan';
        $data['subtitle'] = 'Laporan jobdesk';

        $data['search_page'] = 'laporan';
        $data['crumb'] = [
            'Laporan' => '',
        ];

        $data['page'] = 'laporan';
        $this->load->view('template/backend', $data);
    }
}
