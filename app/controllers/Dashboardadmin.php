<?php 


class Dashboardadmin extends Controller{
    public function index()
    {
        session_start();
        if (empty($_SESSION['status'])){
            header('location: '. BASEURL . '/login');
        } else if($_SESSION['status'] == 2){
            header('location: '.BASEURL.'/dashboard');
        }
        $data['judul'] = 'Dashboardadmin';

        $data['user'] = $this->model('User_model')->getAllUser();

        $this->view('templates/header', $data);
        $this->view('dashboardadmin/index', $data);
        $this->view('templates/footer');
    }

    public function addNewUser(){
            if($this->model('User_model')->addUser($_POST) > 0){
                echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    window.location.href = '". BASEURL ."/dashboardadmin';
                </script>
            ";
            exit;
            }
    }
    public function update($id_manageuser){
        if ($id_manageuser > 0){
            $data['user'] = $this->model('User_model')->getIdUser($id_manageuser);
            var_dump( $data['user']);
            if($this->model('User_model')->editUser($_POST) > 0){
                echo "
                    <script>
                        alert('Data berhasil diubah');
                        window.location.href = '". BASEURL ."/dashboardadmin';
                    </script>
                ";
                exit;
            }
        }
    }
    public function delete($id_manageuser){
        if($this->model('User_model')->deleteUser($id_manageuser) > 0){
            echo "
                <script>
                    alert('Data berhasil dihapus');
                    window.location.href = '". BASEURL ."/dashboardadmin';
                </script>
            ";
            exit;
        }
    }
}