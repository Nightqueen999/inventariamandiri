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
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}