<?php
class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('partials/header.php');
        $this->load->view('partials/menu.php');
        $this->load->view('index.php');
        $this->load->view('partials/footer.php');
    }
}
