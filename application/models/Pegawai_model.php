<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    private $_table = "pegawai";
 
    public $nip;
    public $nama;
    public $golongan;
    public $jabatan;
    
    public function rules()
    {
        return [
            ['field' => 'nip',
            'label' => 'Nip',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'golongan',
            'label' => 'Golongan',
            'rules' => 'required'],

            ['field' => 'jabatan',
            'label' => 'Jabatan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["nip" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->golongan = $post["golongan"];
        $this->jabatan = $post["jabatan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->golongan = $post["golongan"];
        $this->jabatan = $post["jabatan"];;
	
        $this->db->update($this->_table, $this, array('nip' => $post['nip']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("nip" => $id));
	}
	
}
