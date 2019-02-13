<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
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
        
        if ( ! $this->ion_auth->logged_in())
        {
            
            $guest = $this->input->post('guest');
            $id    = $this->input->post('identity');

            if ($id) {
    
                /* Valid form */
                $this->form_validation->set_rules('identity', 'Email', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                if ($this->form_validation->run() == TRUE)
                {
                    $remember = (bool) $this->input->post('remember');

                    if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
                    {
                        
                        $this->session->set_userdata('mbrid', $this->ion_auth->user()->row()->id);

                        if ( ! $this->ion_auth->is_admin())
                        {

                            $this->session->set_flashdata('message', $this->ion_auth->messages());
                            
                            if (isset($_SESSION["cart_item"])) {
                                
                                if (count($_SESSION["cart_item"]) > 0)
                                {
                                    redirect('checkout', 'refresh');
                                }
                                else
                                {
                                    redirect('/', 'refresh');
                                }
                            }
                            else
                            {
                                redirect('/', 'refresh');
                            }
                        }
                        else
                        {
                            /* Data */
                            // $this->data[''] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                            $this->session->set_flashdata('message', validation_errors() ? validation_errors() : $this->session->flashdata('message'));

                            /* Load Template */
                            // $this->template->auth_render('auth/choice', $this->data);
                            redirect('admin', 'refresh');
                            return;
                        }
                        
                    }
                    else
                    {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('login', 'refresh');
                        return;
                    }
                }
                else
                {

                    // $this->data['message_login'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                    $this->session->set_flashdata('message', validation_errors() ? validation_errors() : $this->session->flashdata('message'));

                    $this->data['identity'] = array(
                        'name'        => 'identity',
                        'id'          => 'identity',
                        'type'        => 'email',
                        'value'       => $this->form_validation->set_value('identity'),
                        'class'       => 'form-control',
                        'placeholder' => lang('auth_your_email')
                    );
                    $this->data['password'] = array(
                        'name'        => 'password',
                        'id'          => 'password',
                        'type'        => 'password',
                        'class'       => 'form-control',
                        'placeholder' => lang('auth_your_password')
                    );

                    /* Load Template */
                    // $this->template->auth_render('auth/login', $this->data);
                }
            }
            elseif ($guest)
            {
                $remember = (bool) $this->input->post('remember');
                
                if ($this->ion_auth->login('guest@asovic.com', 'zyxwv_98765', $remember)) {

                    $this->session->set_userdata('guest', TRUE);
                    $this->data['first_name'] = 'Guest';
                    $this->data['last_name']  = '';
                    
                    if (isset($_SESSION["cart_item"]))
                    {
                        if (count($_SESSION["cart_item"]) > 0)
                            redirect('checkout', 'refresh');
                    }
                    else
                    {
                        redirect('/', 'refresh');
                    }
                }
            }

            $this->load->view('layout/header', $this->data);
            $this->load->view('login/index', $this->data);
            $this->load->view('layout/footer', $this->data);
        }
        else
        {
            redirect('/', 'refresh');
		}
    }
}
