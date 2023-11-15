<?php 

class Login extends Controller{
    
    public function index()
    {

        $_SESSION['status'] = [];
        session_start();

        if (!empty($_SESSION['status'])){

            if($_SESSION['status'] == 1){
                header('location: '. BASEURL . '/dashboardadmin');

            }else if($_SESSION['status'] == 2){
                header('location: '. BASEURL . '/dashboard');

            }
        } 

            $data['judul'] = 'Login';
    
            $this->view('templates/header', $data);
            $this->view('login/index', $data);
            $this->view('templates/footer');
    }

    public function logout(){
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();

        header('location: '. BASEURL .'/login');
    } 

    public function user()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if( !empty($username) || !empty($password) ) {

            if( $this->model('Login_model')->cekUserTrue($username) > 0 ) {

                $data = $this->model('Login_model')->ambilDataUser($username);
                $passwordDb = $data['password'];

                if( password_verify($password, $passwordDb) ) {
                    session_start();
                    $_SESSION['status'] = $data['status'];
                    // var_dump($_SESSION['status']);

                    if($_SESSION['status'] == 1){
                        header('location: '. BASEURL . '/dashboardadmin');

                    }else if($_SESSION['status'] == 2){
                        header('location: '. BASEURL . '/dashboard');

                    }
                    else {
                        header('location: '. BASEURL . '/login');
                    }

                } else {
                    echo "<script>
                            window.location.href = '". BASEURL ."/login';
                            alert('Data berhasil diubah!');
                        </script>";
                }

            } else {
                echo "<script>
                            window.location.href = '". BASEURL ."/dashboardadmin';
                            alert('Tidak ada User!');
                        </script>";
            }

        } else {
            echo "<script>
                            window.location.href = '". BASEURL ."/dashboardadmin';
                            alert('Harap isi data terlebih dahulu!');
                        </script>";
        }
        
    }

}