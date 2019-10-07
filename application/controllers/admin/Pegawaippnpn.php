<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawaippnpn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pegawaippnpn_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pegawai"] = $this->pegawaippnpn_model->getAll();
        $this->load->view("admin/pegawaippnpn/list", $data);
    }

    public function add()
    {
        $pegawai = $this->pegawaippnpn_model;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/pegawaippnpn/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/pegawaippnpn');
       
        $pegawai = $this->pegawaippnpn_model;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pegawai"] = $pegawai->getById($id);
        if (!$data["pegawai"]) show_404();
        
        $this->load->view("admin/pegawaippnpn/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pegawaippnpn_model->delete($id)) {
            redirect(site_url('admin/pegawaippnpn'));
        }
    }
}
