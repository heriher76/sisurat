<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model
{
    private $_table = "surat";
    private $_view = "cetak_jadwal";

    public $id_surat;
    public $tanggal_surat;
    public $no_surat;
    public $kode_dosen;
    public $periode;
    public $semester;
    public $tanggal_sap;
    public $kode_pejabat;
    public $tanggal_mulai;
    public $tanggal_selesai;


    public function rules()
    {
        return [
            
            ['field' => 'no_surat',
            'label' => 'Nomor Surat',
            'rules' => 'required'],

            ['field' => 'tanggal_surat',
            'label' => 'Tanggal Surat',
            'rules' => 'required'],

            ['field' => 'nip',
            'label' => 'NIP',
            'rules' => 'required'],

            ['field' => 'periode',
            'label' => 'Periode',
            'rules' => 'required'],

            ['field' => 'semester',
            'label' => 'Semester',
            'rules' => 'required'],

            ['field' => 'kode_pejabat',
            'label' => 'Pejabat',
            'rules' => 'required'],

            ['field' => 'tanggal_sap',
            'label' => 'Tanggal SAP',
            'rules' => 'required'],

            ['field' => 'tanggal_mulai',
            'label' => 'Tanggal Mulai',
            'rules' => 'required'],
            
            ['field' => 'tanggal_selesai',
            'label' => 'Tanggal Selesai',
            'rules' => 'required'],
            
            ['field' => 'alasan',
            'label' => 'Alasan',
            'rules' => 'required'],
            
            ['field' => 'dasar_kedua',
            'label' => 'Dasar Kedua'],
            
            ['field' => 'dasar_ketiga',
            'label' => 'Dasar Ketiga'],
            
            ['field' => 'dasar_keempat',
            'label' => 'Dasar Keempat'],
            
            ['field' => 'desa',
            'label' => 'Desa',
            'rules' => 'required'],
            
            ['field' => 'kecamatan',
            'label' => 'Kecamatan',
            'rules' => 'required'],
            
            ['field' => 'pegawai_kedua',
            'label' => 'Pegawai Kedua'],
            
            ['field' => 'ppnpn_pertama',
            'label' => 'PPNPN Pertama'],
            
            ['field' => 'ppnpn_kedua',
            'label' => 'PPNPN Kedua']
        ];
    }

    public function jumlahSurat()
    {
            $this->db->select('count(id_surat) as id_surat');
            $this->db->from('surat');
               
            $query = $this->db->get();
            return $query->result();
    }

    public function getAll()
    {
            $this->db->select('surat.*,pejabat.nama as nama_pejabat');
            $this->db->from('surat');
            $this->db->join('pejabat', 'pejabat.kode_pejabat = surat.kode_pejabat');
        
            $query = $this->db->get();
            return $query->result();
    }

    public function cetakSurat($id)
    {
        $this->db->select('surat.*, 
            nama_pegawai.nama as nama_pegawai, pegawai_kedua.nama as nama_pegawai_kedua, 
            jabatan_pegawai_pertama.jabatan as jabatan_pegawai_pertama, jabatan_pegawai_kedua.jabatan as jabatan_pegawai_kedua,
            golongan_pegawai_pertama.golongan as golongan_pegawai_pertama, golongan_pegawai_kedua.golongan as golongan_pegawai_kedua, 

            nama_ppnpn.nama as nama_ppnpn, ppnpn_kedua.nama as nama_ppnpn_kedua, 
            nama_ppnpn.jabatan as jabatan_ppnpn_pertama, ppnpn_kedua.jabatan as jabatan_ppnpn_kedua, 

            pejabat.nip as nip_pejabat, pejabat.nama as nama_pejabat, pejabat.jabatan ');
            
            $this->db->from('surat');

            $this->db->join('pegawai nama_pegawai', 'nama_pegawai.nip = surat.kode_dosen', 'left');
            $this->db->join('pegawai pegawai_kedua', 'pegawai_kedua.nip = surat.pegawai_kedua', 'left');
            $this->db->join('pegawai jabatan_pegawai_pertama', 'jabatan_pegawai_pertama.nip = surat.kode_dosen', 'left');
            $this->db->join('pegawai jabatan_pegawai_kedua', 'jabatan_pegawai_kedua.nip = surat.pegawai_kedua', 'left');
            $this->db->join('pegawai golongan_pegawai_pertama', 'golongan_pegawai_pertama.nip = surat.kode_dosen', 'left');
            $this->db->join('pegawai golongan_pegawai_kedua', 'golongan_pegawai_kedua.nip = surat.pegawai_kedua', 'left');

            $this->db->join('pegawai_ppnpn nama_ppnpn', 'nama_ppnpn.id = surat.ppnpn_pertama', 'left');
            $this->db->join('pegawai_ppnpn ppnpn_kedua', 'ppnpn_kedua.id = surat.ppnpn_kedua', 'left');
            $this->db->join('pegawai_ppnpn jabatan_ppnpn_pertama', 'jabatan_ppnpn_pertama.id = surat.ppnpn_pertama', 'left');
            $this->db->join('pegawai_ppnpn jabatan_ppnpn_kedua', 'jabatan_ppnpn_kedua.id = surat.ppnpn_kedua', 'left');

            $this->db->join('pejabat', 'pejabat.kode_pejabat = surat.kode_pejabat');

            $this->db->where('surat.id_surat='.$id);
            // var_dump($this->db->get()->row());
            // die;
            return $query = $this->db->get()->row();
    }
    public function cetakS($kode_dosen)
    {
        $this->db->select('surat.*,dosen.nama as nama_dosen, pejabat.nip as nip_pejabat, pejabat.nama as nama_pejabat, pejabat.jabatan ');
            $this->db->from('surat');
            $this->db->join('dosen', 'dosen.kode_dosen = surat.kode_dosen');
            $this->db->join('pejabat', 'pejabat.kode_pejabat = surat.kode_pejabat');
            $this->db->where('surat.kode_dosen='.$kode_dosen);
        
            return $query = $this->db->get()->row_array();
    }


    public  function cetakJadwal($kode_dosen)
    {
             $this->db->select('cetak_jadwal.*');
            $this->db->from('cetak_jadwal');
            $this->db->where('kode_dosen='. $kode_dosen);
        
            $query = $this->db->get();
            return $query->result();
    }
    
    public function getById($id_surat)
    {
        return $this->db->get_where($this->_table, ["id_surat" => $id_surat])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->no_surat = $post["no_surat"];
        $this->kode_dosen = $post["nip"];
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->periode = $post["periode"];
        $this->semester = $post["semester"];
        $this->tanggal_sap = $post["tanggal_sap"];
        $this->kode_pejabat = $post["kode_pejabat"];
        $this->tanggal_mulai = $post["tanggal_mulai"];
        $this->tanggal_selesai = $post["tanggal_selesai"];
        $this->alasan = $post["alasan"];
        $this->dasar_kedua = $post["dasar_kedua"];
        $this->dasar_ketiga = $post["dasar_ketiga"];
        $this->dasar_keempat = $post["dasar_keempat"];
        $this->desa = $post["desa"];
        $this->kecamatan = $post["kecamatan"];
        $this->pegawai_kedua = $post["pegawai_kedua"];
        $this->ppnpn_pertama = $post["ppnpn_pertama"];
        $this->ppnpn_kedua = $post["ppnpn_kedua"];
        $this->db->insert($this->_table, $this);
    }

    public function print()
    {
       $post = $this->input->post('kode_dosen');
       echo $post;die();
        $this->kode_dosen = $post;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_surat = $post["id_surat"];
        $this->no_surat = $post["no_surat"];
        $this->kode_dosen = $post["kode_dosen"];
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->periode = $post["periode"];
        $this->semester = $post["semester"];
        $this->tanggal_sap = $post["tanggal_sap"];
        $this->kode_pejabat = $post["kode_pejabat"];
        $this->tanggal_mulai = $post["tanggal_mulai"];
		$this->tanggal_selesai = $post["tanggal_selesai"];
        $this->alasan = $post["alasan"];
        $this->dasar_kedua = $post["dasar_kedua"];
        $this->dasar_ketiga = $post["dasar_ketiga"];
        $this->dasar_keempat = $post["dasar_keempat"];
        $this->desa = $post["desa"];
        $this->kecamatan = $post["kecamatan"];
        $this->pegawai_kedua = $post["pegawai_kedua"];
        $this->ppnpn_pertama = $post["ppnpn_pertama"];
        $this->ppnpn_kedua = $post["ppnpn_kedua"];
        $this->db->update($this->_table, $this, array('id_surat' => $post['id_surat']));
    }

    public function delete($id_surat)
    {
        return $this->db->delete($this->_table, array("id_surat" => $id_surat));
	}


}
