<?php 


class Dashboard extends Controller{
    public function index()
    {
        session_start();
        if (empty($_SESSION['status'])){
            header('location: '. BASEURL . '/login');
        } else if($_SESSION['status'] == 1){
            header('location: '.BASEURL.'/dashboardadmin');
        }

        $data['judul'] = 'Dashboard';

        $this->view('templates/header', $data);
        $this->view('dashboard/index');
        $this->view('templates/footer');
    }
}