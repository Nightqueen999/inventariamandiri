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

        return $this->db->getAll();
    }
    public function deleteUser($id){
        $query = "DELETE FROM" .$this->tabel. "WHERE idmanageuser=:idmanageuser";
        $this->db->query($query);
        $this->db->bind('idmanageuser',$id);
        return $this->db->execute();
    }
    public function editUser($data){
        $query = "UPDATE ".$this->tabel. "SET username = :username AND position = :position";

        $this->db->query($query);
        $this->db->bind('username',$data['username']);
        $this->db->bind('position',$data['position']);

        $this->db->execute();
    }
    public function getAllUser(){
        $query = "SELECT * FROM ".$this->tabel."";
        $this->db->query($query);
        return $this->db->getAll();
    }
    public function getIdUser($id){
        $query = "SELECT * FROM" .$this->tabel. "WHERE idmanageuser = :idmanageuser";
        $this->db->query($query);
        $this->db->bind('idmanageuser',$id);
        return $this->db->getSingle();

    }

}