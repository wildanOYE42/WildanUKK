<?php

class B_generate extends CI_Model{
    public function getPengaduanByTgl($tglAwal, $tglAkhir){
        $query = "SELECT pengaduan.id_pengaduan, pengaduan.nik, pengaduan.isi_laporan, pengaduan.status, masyarakat.nama FROM pengaduan, masyarakat WHERE pengaduan.nik = masyarakat.nik AND pengaduan.tgl_pengaduan BETWEEN '".$tglAwal."' AND '".$tglAkhir."' ORDER BY pengaduan.tgl_pengaduan ASC";
        return $this->db->query($query)->result(); 
    }

    public function getMasyarakatAll(){
        return $this->db->get('masyarakat')->result();
    }

    public function getTanggapanAll()
    {
        $query = "SELECT masyarakat.nama as nama_masyarakat, petugas.nama_petugas as nama_admin, isi_laporan, tanggapan, tgl_pengaduan  FROM tanggapan 
        JOIN petugas ON petugas.id_petugas = tanggapan.id_petugas 
        JOIN pengaduan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan
        JOIN masyarakat ON pengaduan.nik = masyarakat.nik";
        return $this->db->query($query)->result();
    }


    public function getPetugasAll(){
        return $this->db->get_where('petugas',['level' => 2])->result();
    }
}