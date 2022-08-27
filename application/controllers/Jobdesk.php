<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobdesk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Jobdesk_model');
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'jobdesk?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jobdesk?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jobdesk';
            $config['first_url'] = base_url() . 'jobdesk';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jobdesk_model->total_rows($q);
        $jobdesk = $this->Jobdesk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jobdesk_data' => $jobdesk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Jobdesk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jobdesk' => '',
        ];

        $data['page'] = 'jobdesk/jobdesk_list';
        $this->load->view('template/backend', $data);
    }



    public function pegawai()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'jobdesk?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jobdesk?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jobdesk';
            $config['first_url'] = base_url() . 'jobdesk';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jobdesk_model->total_rows_pegawai($q);
        $jobdesk = $this->Jobdesk_model->get_limit_data_pegawai($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jobdesk_data' => $jobdesk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Jobdesk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jobdesk' => '',
        ];

        $data['page'] = 'jobdesk/jobdesk_list';
        $this->load->view('template/backend', $data);
    }

    public function upload_jobdesk()
    {
        if (isset($_FILES['file_jobdesk'])) {
            $file_jobdesk = $_FILES['file_jobdesk'];
        } else {
            $file_jobdesk = null;
        }

        if ($file_jobdesk) {
            $config['upload_path'] = './assets/uploads/files/jobdesk/';
            $config['allowed_types'] = 'pdf|docx|xlsx';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_jobdesk')) {

                $file_jobdesk_name = htmlspecialchars($this->upload->data('file_name'));
                //print_r($file_jobdesk_name);
                //die;
            }
            $this->db->set('file', $file_jobdesk_name);
            $id_jobdesk = $this->input->post('id_jobdesk');
            $this->db->where('id_jobdesk', $id_jobdesk);
            $this->db->update('jobdesk');
            $this->session->set_flashdata('success', 'Upload Berhasil');
            redirect('jobdesk/pegawai');
        }
    }

    public function komentar()
    {
        $id_jobdesk = $this->input->post('id_jobdesk');
        $komentar = $this->input->post('komentar');
        $data = array(
            'komentar' => $komentar
        );
        $this->db->where('id_jobdesk', $id_jobdesk);
        $this->db->update('jobdesk', $data);
        redirect('jobdesk/read/' . $id_jobdesk);
    }

    public function read($id)
    {
        $row = $this->Jobdesk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'id_jobdesk' => $row->id_jobdesk,
                'komentar' => $row->komentar,
                'nama_jobdesk' => $row->nama_jobdesk,
                'status' => $row->status,
                'file' => $row->file,
                'tanggal_dibuat' => $row->tanggal_dibuat,
                'tanggal_selesai' => $row->tanggal_selesai,
                // 'id_user' => $row->id_user,
                'masa_tenggat' => $row->masa_tenggat,
            );
            $data['pegawai'] = $this->db->query("SELECT id_user from jobdesk_pegawai where id_jobdesk =  $row->id_jobdesk")->result();;
            $data['title'] = 'Jobdesk';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'jobdesk/jobdesk_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('jobdesk'));
        }
    }

    public function selesai($id)
    {
        $this->db->set('status', 1);
        $this->db->set('tanggal_selesai', date('Y-m-d'));
        $this->db->where('id_jobdesk', $id);
        $this->db->update('jobdesk');
        redirect('jobdesk');
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jobdesk/create_action'),
            'id_jobdesk' => set_value('id_jobdesk'),
            'nama_jobdesk' => set_value('nama_jobdesk'),
            // 'status' => set_value('status'),
            // 'tanggal_dibuat' => set_value('tanggal_dibuat'),
            // 'tanggal_selesai' => set_value('tanggal_selesai'),
            // 'id_user' => set_value('id_user'),
            'masa_tenggat' => set_value('masa_tenggat'),
        );
        $data['list_user'] = $this->Users_model->get_all();
        $data['pegawai'] = null;
        $data['title'] = 'Jobdesk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jobdesk/jobdesk_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_jobdesk' => $this->input->post('nama_jobdesk', TRUE),
                'status' => 0,
                'tanggal_dibuat' => date('Y-m-d'),
                // 'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
                // 'id_user' => $this->input->post('id_user', TRUE),
                'masa_tenggat' => $this->input->post('masa_tenggat', TRUE),
            );

            $id_jobdesk = $this->Jobdesk_model->insert($data);
            $pegawai = $this->input->post('pegawai');

            foreach ($pegawai as $value) {
                $datax = array(
                    'id_jobdesk' => $id_jobdesk,
                    'id_user' => $value
                );
                $this->db->insert('jobdesk_pegawai', $datax);
            }

            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('jobdesk'));
        }
    }

    public function update($id)
    {
        $row = $this->Jobdesk_model->get_by_id($id);
        $pegawai = $this->db->query("select * from jobdesk_pegawai where id_jobdesk=$id")->result();



        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jobdesk/update_action'),
                'id_jobdesk' => set_value('id_jobdesk', $row->id_jobdesk),
                'nama_jobdesk' => set_value('nama_jobdesk', $row->nama_jobdesk),
                'status' => set_value('status', $row->status),
                'tanggal_dibuat' => set_value('tanggal_dibuat', $row->tanggal_dibuat),
                'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
                // 'id_user' => set_value('id_user', $row->id_user),
                'masa_tenggat' => set_value('masa_tenggat', $row->masa_tenggat),
            );
            $data['list_user'] = $this->Users_model->get_all();
            // print_r($data['list_user']);
            // die;
            $data['pegawai'] = $pegawai;
            // print_r($data['list_user']);
            // die;
            $data['title'] = 'Jobdesk';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'jobdesk/jobdesk_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('jobdesk'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jobdesk', TRUE));
        } else {
            $data = array(
                'nama_jobdesk' => $this->input->post('nama_jobdesk', TRUE),
                // 'status' => $this->input->post('status', TRUE),
                // 'tanggal_dibuat' => $this->input->post('tanggal_dibuat', TRUE),
                // 'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
                // 'id_user' => $this->input->post('id_user', TRUE),
                'masa_tenggat' => $this->input->post('masa_tenggat', TRUE),
            );
            $id_jobdesk = $this->input->post('id_jobdesk', TRUE);
            $this->Jobdesk_model->update($id_jobdesk, $data);
            $this->db->query("DELETE from jobdesk_pegawai where id_jobdesk=$id_jobdesk");
            $pegawai = $this->input->post('pegawai');

            foreach ($pegawai as $value) {
                $datax = array(
                    'id_jobdesk' => $id_jobdesk,
                    'id_user' => $value
                );
                $this->db->insert('jobdesk_pegawai', $datax);
            }

            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('jobdesk'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jobdesk_model->get_by_id($id);

        if ($row) {
            $this->Jobdesk_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('jobdesk'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('jobdesk'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Jobdesk_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jobdesk', 'nama jobdesk', 'trim|required');
        // $this->form_validation->set_rules('status', 'status', 'trim|required');
        // $this->form_validation->set_rules('tanggal_dibuat', 'tanggal dibuat', 'trim|required');
        // $this->form_validation->set_rules('tanggal_selesai', 'tanggal selesai', 'trim|required');
        // $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
        // $this->form_validation->set_rules('masa_tenggat', 'masa tenggat', 'trim|required');

        $this->form_validation->set_rules('id_jobdesk', 'id_jobdesk', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function printdoc()
    {
        $data = array(
            'jobdesk_data' => $this->Jobdesk_model->get_all(),
            'start' => 0
        );
        $this->load->view('jobdesk/jobdesk_print', $data);
    }
}

/* End of file Jobdesk.php */
/* Location: ./application/controllers/Jobdesk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-07 08:51:52 */
/* http://harviacode.com */