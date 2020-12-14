<?php

class Pendapatan_model extends CI_model {
    public function getAllPendapatan() {
        return $this->db->get('penjualan')->result_array();
    }

    public function tambahDataPendapatan() {
        $nominal = $this->input->post('nominal');

        $bahan  = $this->input->post('bahan');
        $sablon = $this->input->post('sablon');
        $jahit  = $this->input->post('jahit');
        $label  = $this->input->post('label');
        $qty    = $this->input->post('quantity');
        
        $biaya = ($bahan * $qty) + ($sablon * $qty) + ($jahit * $qty) + ($label * $qty);
        $laba = $nominal - $biaya;

        $data = [
            "bahan"       => $qty * $this->input->post('bahan'),
            "sablon"      => $qty * $this->input->post('sablon'),
            "jahit"       => $qty * $this->input->post('jahit'),
            "label"       => $qty * $this->input->post('label'),
            "laba"        => $laba,
            "qty"         => $this->input->post('quantity'),
            "tanggal"     => $this->input->post('tanggal')
        ];
        
        $this->db->insert('penjualan',$data);
    }

    public function jumlahLaba() {
        $this->db->select_sum('laba');
        $query = $this->db->get('penjualan');
        return $query->row()->laba;
    }

    public function jumlahBahan() {
        $this->db->select_sum('bahan');
        $query = $this->db->get('penjualan');
        return $query->row()->bahan;
    }

    public function jumlahSablon() {
        $this->db->select_sum('sablon');
        $query = $this->db->get('penjualan');
        return $query->row()->sablon;
    }

    public function jumlahJahit() {
        $this->db->select_sum('jahit');
        $query = $this->db->get('penjualan');
        return $query->row()->jahit;
    }

    public function jumlahLabel() {
        $this->db->select_sum('label');
        $query = $this->db->get('penjualan');
        return $query->row()->label;
    }

    public function jumlahQty() {
        $this->db->select_sum('qty');
        $query = $this->db->get('penjualan');
        return $query->row()->qty;
    }

}