<?php

    class adminModel{
        public function __construct(){
            $this->db = new Model;
        }
        public function getAdmins(){
            $this->db->query("SELECT * FROM admins");
            return $this->db->getResultSet();
        }

        public function getAdmin($admin_id){
            $this->db->query("SELECT * FROM admins WHERE admin_id = :admin_id");
            $this->db->bind(':admin_id',$admin_id);
            return $this->db->getSingle();
        }

        public function createAdmin($data){
            $this->db->query("INSERT INTO admins (admin_name, admin_pass_hash, admin_mail) values (:admin_name, :admin_pass_hash, :admin_mail)");
            $this->db->bind(':admin_name', $data['admin_name']);
            $this->db->bind(':admin_pass_hash', $data['admin_pass_hash']);
            $this->db->bind(':admin_mail', $data['admin_mail']);
            

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function updateAdmin($data){
            $this->db->query("UPDATE admins SET admin_name=:admin_name, admin_pass_hash=:admin_pass_hash, admin_mail=:admin_mail WHERE admin_id=:admin_id");
            $this->db->bind(':admin_name', $data['admin_name']);
            $this->db->bind(':admin_pass_hash', $data['admin_pass_hash']);
            $this->db->bind(':admin_mail', $data['admin_mail']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function delete($data){
            $this->db->query("DELETE FROM admins WHERE admin_id=:admin_id");
            $this->db->bind('admin_id',$data['admin_id']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function getAdminByUsername($admin_name){
            $this->db->query("SELECT * FROM admins WHERE admin_name = :admin_name");
            $this->db->bind(':admin_name',$admin_name);
            return $this->db->getSingle();
        }

         public function updateAdminPass($data){
            $this->db->query("UPDATE admins SET admin_pass_hash=:admin_pass_hash WHERE admin_name=:admin_name");
            $this->db->bind(':admin_name', $data['admin_name']);
            $this->db->bind(':admin_pass_hash', $data['admin_pass_hash']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }
    }