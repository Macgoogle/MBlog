<?php
    class Posts extends CI_Controller{
        public function index($offset = 0){
            //pagination
            $config['base_url'] = base_url().'posts/index/';
            $config['total_rows'] = $this->db->count_all('posts');
            $config['per_page'] = 3;
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'pagination-link');
            //init pagination
            $this->pagination->initialize($config);

            $data['title'] = 'All Posts';
            
            $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);
            
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
            $data['post'] = $this->post_model->get_posts($slug);

            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = $data['post']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }
        

        public function create(){
            $data['title'] = 'Create Post';
            
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('tag', 'Tag', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            }else{
                $config['upload_path']='./assets/images/posts';
                $config['allowed_types']='gif|jpg|png|jpeg';
                $config['max_size']='2048';
                $config['max_width']='2000';
                $config['max_height']='2000';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image ='placeholder.png';
                }else{
                    $data = array('upload_data'=>$this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
                }

                $this->post_model->create_post($post_image);
               redirect('home');
            }
        }
           public function delete($id){
                $this->post_model->delete_post($id);
                redirect('posts');
           }

           public function edit($slug){
            $data['post'] = $this->post_model->get_posts($slug);

            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = 'Edit Post';

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
           }
           
           public function update(){
               $this->post_model->update_post();
               redirect('posts');
           }
        }

    
