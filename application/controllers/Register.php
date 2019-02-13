<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Public_Controller {

    public function __construct()
    {
		parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');
        $this->lang->load('auth');
        
        $this->load->model('golongan_model');
        $this->load->model('member_model');

		// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}

        $fn = $this->input->post('first_name');

        if ($fn) {

            /* Variables */
            $tables = $this->config->item('tables', 'ion_auth');
            
            /* Validate form input */
            $this->form_validation->set_rules('first_name', 'lang:users_firstname', 'required');
            $this->form_validation->set_rules('last_name', 'lang:users_lastname', 'required');
            $this->form_validation->set_rules('email', 'lang:users_email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
            
            // $this->form_validation->set_rules('phone', 'lang:users_phone', 'required');
            // $this->form_validation->set_rules('company', 'lang:users_company', 'required');
            
            $this->form_validation->set_rules('password', 'lang:users_password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'lang:users_password_confirm', 'required');

            if ($this->form_validation->run() == TRUE)
            {
                $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
                $email    = strtolower($this->input->post('email'));
                $password = $this->input->post('password');

                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name'  => $this->input->post('last_name'),
                    // 'company'    => $this->input->post('company'),
                    // 'phone'      => $this->input->post('phone'),
                );
            }

            if ($this->form_validation->run() == TRUE && $this->ion_auth->register($username, $password, $email, $additional_data))
            {
                $this->session->set_flashdata('message_reg', $this->ion_auth->messages());
                redirect('login', 'refresh');
            }
            else
            {
                // $this->data['message_register'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                $this->session->set_flashdata('message_reg', validation_errors() ? validation_errors() : $this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'));

                $this->data['first_name'] = array(
                    'name'  => 'first_name',
                    'id'    => 'first_name',
                    'type'  => 'text',
                    'class' => 'form-control',
                    'value' => $this->form_validation->set_value('first_name'),
                );
                $this->data['last_name'] = array(
                    'name'  => 'last_name',
                    'id'    => 'last_name',
                    'type'  => 'text',
                    'class' => 'form-control',
                    'value' => $this->form_validation->set_value('last_name'),
                );
                $this->data['email'] = array(
                    'name'  => 'email',
                    'id'    => 'email',
                    'type'  => 'email',
                    'class' => 'form-control',
                    'value' => $this->form_validation->set_value('email'),
                );
                /*$this->data['company'] = array(
                    'name'  => 'company',
                    'id'    => 'company',
                    'type'  => 'text',
                    'class' => 'form-control',
                    'value' => $this->form_validation->set_value('company'),
                );
                $this->data['phone'] = array(
                    'name'  => 'phone',
                    'id'    => 'phone',
                    'type'  => 'tel',
                    'pattern' => '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$',
                    'class' => 'form-control',
                    'value' => $this->form_validation->set_value('phone'),
                );*/
                $this->data['password'] = array(
                    'name'  => 'password',
                    'id'    => 'password',
                    'type'  => 'password',
                    'class' => 'form-control',
                    'value' => $this->form_validation->set_value('password'),
                );
                $this->data['password_confirm'] = array(
                    'name'  => 'password_confirm',
                    'id'    => 'password_confirm',
                    'type'  => 'password',
                    'class' => 'form-control',
                    'value' => $this->form_validation->set_value('password_confirm'),
                );

                /* Load Template */
                // $this->template->admin_render('admin/users/create', $this->data);
            }
        }

        $this->load->view('layout/header', $this->data);
		$this->load->view('register/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
