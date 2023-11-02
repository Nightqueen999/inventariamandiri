<?php 


class Dashboardadmin extends Controller{
    public function index()
    {
        session_start();
        if (empty($_SESSION['status'])){
            header('location: '. BASEURL . '/login');
        } 
        $data['judul'] = 'Dashboardadmin';

        $this->view('templates/header', $data);
        $this->view('dashboardadmin/index');
        $this->view('templates/footer');
    }
    public function indexbener()
    {
        session_start();
        if (empty($_SESSION['status'])){
            header('location: '. BASEURL . '/login');
        } 
        $data['judul'] = 'Dashboardadmin';

        $this->view('templates/header', $data);
        $this->view('dashboardadmin/indexbener', $data);
        $this->view('templates/footer');
    }
}