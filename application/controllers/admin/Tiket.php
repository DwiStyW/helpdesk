<?php
class Tiket extends CI_Controller
{
    public function index()
    {
        $data['tiket'] = $this->model_tiket->tampil_data()->result();
        $this->load->view("admin/partials/header");
        $this->load->view("admin/partials/menu");
        $this->load->view("admin/partials/mobile");
        $this->load->view("admin/tiket", $data);
        $this->load->view("admin/partials/footer");
    }

    public function proses($id)
    {
        $where = array('id' => $id);
        $data['tiket'] = $this->model_penjual->proses_data($where, 'tiket')->result();
        $this->load->view("admin/partials/header");
        $this->load->view("admin/partials/menu");
        $this->load->view("admin/partials/mobile");
        $this->load->view("admin/tiketedit", $data);
        $this->load->view("admin/partials/footer");
    }
}
