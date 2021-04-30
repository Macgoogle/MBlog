<?php
    class Post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){
            if($limit){
                $this->db->limit($limit,$offset);
            }
            if($slug === FALSE){
                $this->db->order_by('title');
                $query = $this->db->get('posts');
                return $query->result_array();
            }

            $query = $this->db->get_where('posts', array('slug'=>$slug));
            return $query->row_array();
        }

        public function create_post($post_image){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'description' => $this->input->post('description'),
                'tag' => $this->input->post('tag'),
                'post_image' => $post_image
            );

            return $this->db->insert('posts', $data);
        }

        public function delete_post($id){
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }

        public function update_post(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'description' => $this->input->post('description'),
                'tag' => $this->input->post('tag')
            );
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }
    }