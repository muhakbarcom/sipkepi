<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobdesk_model extends CI_Model
{

    public $table = 'jobdesk';
    public $id = 'id_jobdesk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_jobdesk', $q);
        $this->db->or_like('nama_jobdesk', $q);
        // $this->db->or_like('status', $q);
        // $this->db->or_like('tanggal_dibuat', $q);
        // $this->db->or_like('tanggal_selesai', $q);
        // $this->db->or_like('id_user', $q);
        $this->db->or_like('masa_tenggat', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function total_rows_pegawai($q = NULL)
    {
        $this->db->join('jobdesk_pegawai', 'jobdesk.id_jobdesk=jobdesk_pegawai.id_jobdesk');
        $this->db->where('jobdesk_pegawai.id_user', $this->session->userdata('user_id'));
        $this->db->order_by('jobdesk.id_jobdesk', $this->order);
        return $this->db->get($this->table)->num_rows();
    }

    function total_rows_pegawai_history($q = NULL)
    {
        $this->db->where('id_pegawai', $this->session->userdata('user_id'));
        $this->db->order_by('id', $this->order);
        return $this->db->get('history_pengumpulan')->num_rows();
    }

    function get_limit_data_pegawai_history($limit, $start = 0, $q = NULL)
    {
        $this->db->select('history_pengumpulan.*, jobdesk.nama_jobdesk');

        $this->db->where('history_pengumpulan.id_pegawai', $this->session->userdata('user_id'));
        $this->db->join('jobdesk', 'history_pengumpulan.id_jobdesk = jobdesk.id_jobdesk', 'left');

        $this->db->order_by('history_pengumpulan.id', $this->order);
        return $this->db->get('history_pengumpulan')->result();
    }

    function total_rows_hr_history($q = NULL)
    {
        $this->db->order_by('id', $this->order);
        return $this->db->get('history_pengumpulan')->num_rows();
    }

    function get_limit_data_hr_history($limit, $start = 0, $q = NULL)
    {
        $this->db->select('history_pengumpulan.*, jobdesk.nama_jobdesk');
        $this->db->join('jobdesk', 'history_pengumpulan.id_jobdesk = jobdesk.id_jobdesk', 'left');
        $this->db->order_by('history_pengumpulan.id', $this->order);
        return $this->db->get('history_pengumpulan')->result();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jobdesk', $q);
        $this->db->or_like('nama_jobdesk', $q);
        // $this->db->or_like('status', $q);
        // $this->db->or_like('tanggal_dibuat', $q);
        // $this->db->or_like('tanggal_selesai', $q);
        // $this->db->or_like('id_user', $q);
        $this->db->or_like('masa_tenggat', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function laporan_jobdesk($limit, $start = 0, $q = NULL)
    {
        $this->db->select("tanggal_dibuat as tanggal, (SELECT COUNT(*) from jobdesk where status=1 and jobdesk.tanggal_dibuat=tanggal) as js,(SELECT COUNT(*) from jobdesk where status=0 and jobdesk.tanggal_dibuat=tanggal) as jbs, (SELECT js+jbs from dual) as jml");
        $this->db->group_by('tanggal');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function chart()
    {

        $this->db->group_by('tanggal');
        return $this->db->get('laporan_jobdesk')->result();
    }

    function chartbulan()
    {
        $date = date('Y-m');
        $this->db->where('tanggal <=', $date);
        $this->db->group_by('tanggal');
        $this->db->limit(5);
        return $this->db->get('laporan_jobdesk')->row();
    }

    function laporan_jobdesk_total($q = NULL)
    {
        $this->db->select("tanggal_dibuat as tanggal, (SELECT COUNT(*) from jobdesk where status=1 and jobdesk.tanggal_dibuat=tanggal) as js,(SELECT COUNT(*) from jobdesk where status=0 and jobdesk.tanggal_dibuat=tanggal) as jbs, (SELECT js+jbs from dual) as jml");
        $this->db->group_by('tanggal_dibuat');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function filter_laporan_jobdesk($limit, $start = 0, $q = NULL, $dari, $sampai)
    {
        $this->db->select("tanggal_dibuat as tanggal, (SELECT COUNT(*) from jobdesk where status=1 and jobdesk.tanggal_dibuat=tanggal) as js,(SELECT COUNT(*) from jobdesk where status=0 and jobdesk.tanggal_dibuat=tanggal) as jbs, (SELECT js+jbs from dual) as jml");
        $this->db->where('tanggal_dibuat >=', $dari);
        $this->db->where('tanggal_dibuat <=', $sampai);
        $this->db->group_by('tanggal_dibuat');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function filter_laporan_jobdesk_total($q = NULL, $dari, $sampai)
    {
        $this->db->select("tanggal_dibuat as tanggal, (SELECT COUNT(*) from jobdesk where status=1 and jobdesk.tanggal_dibuat=tanggal) as js,(SELECT COUNT(*) from jobdesk where status=0 and jobdesk.tanggal_dibuat=tanggal) as jbs, (SELECT js+jbs from dual) as jml");
        $this->db->where('tanggal_dibuat >=', $dari);
        $this->db->where('tanggal_dibuat <=', $sampai);
        $this->db->group_by('tanggal_dibuat');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_limit_data_pegawai($limit, $start = 0, $q = NULL)
    {
        $this->db->join('jobdesk_pegawai', 'jobdesk.id_jobdesk=jobdesk_pegawai.id_jobdesk');
        $this->db->where('jobdesk_pegawai.id_user', $this->session->userdata('user_id'));
        $this->db->like('jobdesk.id_jobdesk', $q);
        $this->db->order_by('jobdesk.id_jobdesk', $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_pegawai_dashboard()
    {
        $this->db->join('jobdesk_pegawai', 'jobdesk.id_jobdesk=jobdesk_pegawai.id_jobdesk');
        $this->db->where('jobdesk_pegawai.id_user', $this->session->userdata('user_id'));
        $this->db->where('jobdesk.status', 0);

        $this->db->like('jobdesk.id_jobdesk');
        $this->db->order_by('jobdesk.id_jobdesk', $this->order);
        return $this->db->get($this->table)->num_rows();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete bulkdata
    function deletebulk()
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }
}

/* End of file Jobdesk_model.php */
/* Location: ./application/models/Jobdesk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-07 08:51:52 */
/* http://harviacode.com */