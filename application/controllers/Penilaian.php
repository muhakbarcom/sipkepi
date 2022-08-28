<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Penilaian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'penilaian?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penilaian?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penilaian';
            $config['first_url'] = base_url() . 'penilaian';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penilaian_model->total_rows($q);
        $penilaian = $this->Penilaian_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penilaian_data' => $penilaian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Penilaian';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Penilaian' => '',
        ];

        $data['page'] = 'penilaian/penilaian_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Penilaian_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_penilaian' => $row->id_penilaian,
                'id_jobdesk' => $row->id_jobdesk,
                'nilai' => $row->nilai,
                'tanggal_penilaian' => $row->tanggal_penilaian,
            );
            $data['title'] = 'Penilaian';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'penilaian/penilaian_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('penilaian'));
        }
    }

    public function create()
    {
        // print_r($data['jobdesk']);
        // die;
        $data = array(
            'button' => 'nilai',
            'action' => site_url('penilaian/create_action'),
            'id_penilaian' => set_value('id_penilaian'),
            'id_jobdesk' => set_value('id_jobdesk'),
            'nilai' => set_value('nilai'),
            'tanggal_penilaian' => set_value('tanggal_penilaian'),
        );
        $data['jobdesk'] = $this->db->query("SELECT * from jobdesk where status =1")->result();
        $data['title'] = 'Penilaian';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'penilaian/penilaian_form';
        $this->load->view('template/backend', $data);
    }

    public function get_pegawai_by_id_jobdesk()
    {
        $id_jobdesk = $this->input->post('id_jobdesk');
        $pegawai = $this->db->query("SELECT jp.id_user,u.first_name,u.last_name from jobdesk_pegawai jp join users u on (jp.id_user=u.id) where jp.id_jobdesk = '$id_jobdesk'")->result();
        // cek $pegawai yang belum ada di tabel penilaian
        foreach ($pegawai as $value) {
            $cek = $this->db->query("SELECT * from penilaian where id_jobdesk='$id_jobdesk' AND id_pegawai = '$value->id_user'")->num_rows();
            if ($cek == 0) {
                $data[] = $value;
            }
        }
        echo json_encode($data);
    }

    public function create_action()
    {
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|required');
        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'trim|required');
        $this->form_validation->set_rules('id_jobdesk', 'Jobdesk', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->set_flashdata('error', validation_errors());
            redirect(site_url('Penilaian/create'));
        } else {
            $data = array(
                'id_jobdesk' => $this->input->post('id_jobdesk', TRUE),
                'id_pegawai' => $this->input->post('id_pegawai', TRUE),
                'nilai' => $this->input->post('nilai', TRUE),
                'tanggal_penilaian' => date('Y-m-d'),
            );

            $this->Penilaian_model->insert($data);
            $this->session->set_flashdata('succes', 'Create Record Success');
            redirect(site_url('penilaian'));
        }
    }

    public function update($id)
    {
        $row = $this->Penilaian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penilaian/update_action'),
                'id_penilaian' => set_value('id_penilaian', $row->id_penilaian),
                'id_jobdesk' => set_value('id_jobdesk', $row->id_jobdesk),
                'nilai' => set_value('nilai', $row->nilai),
                'tanggal_penilaian' => set_value('tanggal_penilaian', $row->tanggal_penilaian),
            );
            $data['title'] = 'Penilaian';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'penilaian/penilaian_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('penilaian'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penilaian', TRUE));
        } else {
            $data = array(
                // 'id_jobdesk' => $this->input->post('id_jobdesk', TRUE),
                'nilai' => $this->input->post('nilai', TRUE),
                // 'tanggal_penilaian' => $this->input->post('tanggal_penilaian', TRUE),
            );

            $this->Penilaian_model->update($this->input->post('id_penilaian', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('penilaian'));
        }
    }

    public function delete($id)
    {
        $row = $this->Penilaian_model->get_by_id($id);

        if ($row) {
            $this->Penilaian_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('penilaian'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('penilaian'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Penilaian_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('id_jobdesk', 'id jobdesk', 'trim|required');
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|required');
        // $this->form_validation->set_rules('tanggal_penilaian', 'tanggal penilaian', 'trim|required');

        $this->form_validation->set_rules('id_penilaian', 'id_penilaian', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function printdoc()
    {
        $data = array(
            'penilaian_data' => $this->Penilaian_model->get_all(),
            'start' => 0
        );
        $this->load->view('penilaian/penilaian_print', $data);
    }
}

/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-07 08:52:01 */
/* http://harviacode.com */