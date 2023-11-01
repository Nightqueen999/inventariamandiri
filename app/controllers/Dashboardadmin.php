<?php 


class Dashboardadmin extends Controller{
    public function index()
    {
        session_start();
        if (empty($_SESSION['status'])){
            header('location: '. BASEURL . '/login');
        } 
        $data['judul'] = 'Dashboard';

        $this->view('tamplates/header', $data);
        $this->view('dashboardadmin/index');
        $this->view('tamplates/footer');
    }
}