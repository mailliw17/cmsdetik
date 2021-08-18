<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_dashboard');
        $this->load->helper('url');
    }

    public function getDataXML()
    {
        // ambil data XML
        $url = "https://news.detik.com/rss";
        $fgc = file_get_contents($url);
        $x = new SimpleXmlElement(html_entity_decode($fgc));

        // siapkan array kosong
        $dataArray = array();

        // iterasi array
        foreach ($x->channel->item as $row) {
            // str_replace untuk mengatasi bug apostrophe pada data di XML
            $title = str_replace("'", " ", $row->title);
            $link = str_replace("'", " ", $row->link);
            $pubDate = date("Y-m-d H:i:s", strtotime($row->pubDate));
            $description = str_replace("'", " ", $row->description);
            $dataArray[] = "('$title', '$link', '$pubDate', '$description')";
        }

        // masukan dataArray ke database
        $cleanData = implode(',', $dataArray);
        $this->M_dashboard->insertData($cleanData);
        redirect('dashboard');
    }

    public function index()
    {
        $data['xml'] = $this->M_dashboard->getData();
        $judul['judul'] = 'Dashboard Admin';
        $this->load->view('template/header', $judul);
        $this->load->view('V_dashboard', $data);
        $this->load->view('template/footer');
    }

    public function delete($id_xml)
    {
        $this->M_dashboard->deleteBerita($id_xml);

        $this->session->set_flashdata('delete', 'oke');
        redirect('dashboard');
    }

    public function addForm()
    {
        $judul['judul'] = 'Tambah Berita';
        $this->load->view('template/header', $judul);
        $this->load->view('V_tambah_berita');
        $this->load->view('template/footer');
    }

    public function storeForm()
    {
        $data = [
            "judul" => $this->input->post('judul', true),
            "waktu" => date("Y-m-d H:i:sa"),
            "deskripsi" => $this->input->post('deskripsi', true),
            "tautan" => $this->input->post('tautan', true),
        ];

        $this->M_dashboard->addBerita($data);

        //pindah ke halaman landingpage
        $this->session->set_flashdata('berita-baru', 'oke');
        redirect('dashboard');
    }

    public function editForm($id_xml)
    {
        // ambil data berita dari database
        $data['laporan'] = $this->M_dashboard->ambilBeritaDB($id_xml);
        $judul['judul'] = 'Tambah Berita';
        $this->load->view('template/header', $judul);
        $this->load->view('V_edit_berita', $data);
        $this->load->view('template/footer');
    }

    public function storeEditForm()
    {
        $data = [
            "judul" => $this->input->post('judul', true),
            "waktu" => date("Y-m-d H:i:sa"),
            "deskripsi" => $this->input->post('deskripsi', true),
            "tautan" => $this->input->post('tautan', true),
        ];

        $this->M_dashboard->perbaruiBeritaDB($data);

        //pindah ke halaman landingpage
        $this->session->set_flashdata('berita-edit-berhasil', 'oke');
        redirect('dashboard');
    }
}
