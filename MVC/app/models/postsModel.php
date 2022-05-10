<?php

    class postsModel{
        public function __construct(){
            $this->db = new Model;
        }
        public function getPosts(){
            $this->db->query("SELECT * FROM posts");
            return $this->db->getResultSet();
        }

        public function getAdminPosts($admin_id){
            $this->db->query("SELECT * FROM posts WHERE admin_id = :admin_id");
            $this->db->bind(':admin_id',$admin_id);
            return $this->db->getResultSet();
        }

        public function getPost($post_id){
            $this->db->query("SELECT * FROM posts WHERE post_id = :post_id");
            $this->db->bind(':post_id',$post_id);
            return $this->db->getSingle();
        }

        public function createPost($data){
            $this->db->query("INSERT INTO posts (description, post_title, post_media_source, admin_id) values (:description, :post_title, :post_media_source, :admin_id)");
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':post_title', $data['post_title']);
            $this->db->bind(':post_media_source', $data['post_media_source']);
            $this->db->bind(':admin_id', $data['admin_id']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function updatePost($data){
            $this->db->query("UPDATE posts SET description=:description, post_title=:post_title, post_media_source=:post_media_source, admin_id=:admin_id WHERE post_id=:post_id");
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':post_title', $data['post_title']);
            $this->db->bind(':post_media_source', $data['post_media_source']);
            $this->db->bind(':admin_id', $data['admin_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }
        

        public function delete($data){
            $this->db->query("DELETE FROM posts WHERE post_id=:post_id");
            $this->db->bind('post_id',$data['post_id']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }
    }