<?php

class M_dashboard extends CI_Model
{
    public function insertData($dataArray)
    {
        // clean the data
        $this->db->query("INSERT INTO xml (judul, tautan, waktu, deskripsi) VALUES $dataArray");

        // $query_str = 'insert into xml (judul,tautan, waktu, deskripsi) values ' . implode(',', $dataArray) . '';
        // $query = $this->db->query($query_str);
    }

    public function getData()
    {
        $query = $this->db->query("SELECT id_xml,judul, tautan, waktu,deskripsi FROM xml  ORDER BY id_xml DESC")->result_array();
        return $query;
    }

    public function deleteBerita($id_xml)
    {
        $this->db->query("DELETE FROM xml WHERE id_xml = '$id_xml'");
    }

    public function addBerita($data)
    {
        $this->db->insert('xml', $data);
    }

    public function ambilBeritaDB($id_xml)
    {
        return $this->db->query("SELECT * FROM xml WHERE id_xml= '$id_xml'")->row_array();
    }

    public function perbaruiBeritaDB($data)
    {
        $this->db->where('id_xml', $this->input->post('id_xml'));
        $this->db->update('xml', $data);
    }
}
