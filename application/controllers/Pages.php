<?php
    class Pages extends CI_Controller{
        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);
            $data['posts'] = $this->home_model->get_home_posts();
            
            $this->load->view('templates/header');
            $this->load->view('posts/home_index', $data);
            $this->load->view('templates/footer');
        }
    }