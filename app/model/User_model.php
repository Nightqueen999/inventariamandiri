<?php

class User_model{
    private $db;
    private $tabel = 'manageuser';

    public function __construct(){
        $this->db = new Database;
    }
    public function addUser($data){
        $query = "INSERT INTO ".$this->tabel." VALUES (NULL,:username,:position)";

        $this->db->query($query);
        $this->db->bind('username',$data['username']);
        $this->db->bind('position',$data['position']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function deleteUser($id_manageuser){
        $query = "DELETE FROM " .$this->tabel. " WHERE id_manageuser =:id_manageuser";
        $this->db->query($query);
        $this->db->bind('id_manageuser',$id_manageuser);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function editUser($data){
        $query = "UPDATE {$this->tabel} SET username =:username, position =:position WHERE id_manageuser =:id_manageuser";

        $this->db->query($query);
        $this->db->bind('username',$data['username']);
        $this->db->bind('position',$data['position']);
        $this->db->bind('id_manageuser',$data['id_manageuser']);

        $this->db->execute();
        return $this->db->rowCount();
        
    }
    public function getAllUser(){
        $query = "SELECT * FROM ".$this->tabel."";
        $this->db->query($query);
        return $this->db->getAll();
    }
    public function getIdUser($id){
        $query = "SELECT * FROM " .$this->tabel. " WHERE id_manageuser = :id_manageuser";
        $this->db->query($query);
        $this->db->bind('id_manageuser',$id);
        return $this->db->getSingle();

    }

    public function ambilDataJs($id_manageuser){
        $query = "SELECT * FROM ".$this->tabel." WHERE id_manageuser = :id_manageuser";
        $this->db->query($query);
        $this->db->bind('id_manageuser',$id_manageuser);
        return $this->db->getSingle();

        // while ($row = $this->db->getAll() ){
        //     $id_manageuser = $row['id_manageuser'];
        //     $username = $row['username'];
        //     $position = $row['position'];

        //     $data[] = array('id_manageuser' => $id_manageuser, 'username' => $username, 'position' => $position);
        // }
    }

}