<?php
    class home_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_home_posts($slug = FALSE){
            if($slug === FALSE){
                $this->db->order_by('id DESC');
                $this->db->limit('5');
                $query = $this->db->get('posts');
                return $query->result_array();
            }

            $query = $this->db->get_where('posts', array('slug'=>$slug));
            return $query->row_array();
        }
    }