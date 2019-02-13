<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		
		// $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter'), $this->config->item('error_end_delimiter'));
		
		$this->lang->load('checkout');
		
		$this->load->model('golongan_model');
		$this->load->model('provinsi_model');
		$this->load->model('kabupaten_model');
		$this->load->model('kecamatan_model');
		$this->load->model('member_model');
		// $this->output->enable_profiler(TRUE);
    }

	public function index()
	{
		
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
		
		$this->data['provinsi'] = $this->provinsi_model->get_all();
		$this->data['province'] = '';
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}
		else
		// if ( $this->ion_auth->logged_in())
        {
			// siapkan data member
			$this->data['anggota'] = $this->ion_auth->user()->row();
        }
            
        $submit = $this->input->post('submit1');

        if ($submit) {
			// die('submited!');

            /* Validate form input */
            $this->form_validation->set_rules('first_name', 'lang:checkout_first_name', 'required');
            $this->form_validation->set_rules('last_name', 'lang:checkout_last_name', 'required');
			$this->form_validation->set_rules('email', 'lang:checkout_email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'lang:checkout_phone', 'required');
			
			$this->form_validation->set_rules('province', 'lang:checkout_province', 'required');
			$this->form_validation->set_rules('regency', 'lang:checkout_regency', 'required');
			$this->form_validation->set_rules('district', 'lang:checkout_district', 'required');
			
			$this->form_validation->set_rules('post_code', 'lang:checkout_post_code', 'required');
			$this->form_validation->set_rules('address1', 'lang:checkout_address1', 'required');
			// $this->form_validation->set_rules('address2', 'lang:checkout_address2', 'required');
			
			if ($this->form_validation->run() == TRUE)
            {

				// shipping address data
                $first_name = $this->input->post('first_name');
                $last_name  = $this->input->post('last_name');
                $company    = $this->input->post('company');
				$email      = strtolower($this->input->post('email'));
				$phone      = $this->input->post('phone');

				$province   = $this->input->post('province');
				$regency    = $this->input->post('regency');
				$district   = $this->input->post('district');
				$post_code  = $this->input->post('post_code');
				$address1   = $this->input->post('address1');
				$address2   = $this->input->post('address2');
				
				$address_data = array(
					'first_name' => $first_name,
					'last_name'  => $last_name,
					'company'    => $company,
					'email'      => $email,
					'phone'      => $phone,
					'province'   => $province,
					'regency'    => $regency,
					'district'   => $district,
					'post_code'  => $post_code,
					'address1'   => $address1,
					'address2'   => $address2,
				);
				
				// mulai transaksi
				$this->db->trans_start();
				$this->db->insert('address', $address_data);
				$addrid = $this->db->insert_id();

				$mbrid      = $this->input->post('mbrid');
				$total      = $this->input->post('total');
				$shipcost   = $this->input->post('shipcost');
				$note       = $this->input->post('note');

				$tglinput   = date('Y-m-d');

				$orders_data = array(
					'tglinput' => $tglinput,
					'mbrid'    => $mbrid,
					'addrid'   => $addrid,
					'total'    => $total,
					'gtotal'   => $total,
					'shipcost' => $shipcost,
					'note'     => $note,
				);
				$this->db->insert('orders', $orders_data);
				$orderid = $this->db->insert_id();
		
				$length = count($this->input->post('kdbar'));

				$kdbar  = $this->input->post('kdbar');
				$qty    = $this->input->post('qty');
				$harga  = $this->input->post('harga');
				$jumlah = $this->input->post('jumlah');

				//  simpan detail
				for ($i = 0; $i < $length; $i++) {
					
					$detail_data = array(
						'id'     => $orderid,
						'tglinput' => $tglinput,
						'kdbar'  => $kdbar[$i],
						'qty'    => $qty[$i],
						'hjual'  => $harga[$i],
						'jumlah' => $jumlah[$i],
					);
					$this->db->insert('orders_detail', $detail_data);
				}
				
				$this->db->trans_complete(); // commit

				// $this->data['item_len'] = count($this->input->post('kdbar'));
				// $this->data['kdbar'] = $this->input->post('kdbar')[0];
						
				if(!empty($_SESSION["cart_item"])) {
		
					foreach($_SESSION["cart_item"] as $k => $v) {
						unset($_SESSION['cart_item'][$k]);
					}
				}
				$this->session->set_userdata('totqty', 0);
				$this->session->set_userdata('tot_price', 0);
				
				redirect('/', 'refresh');
			}
			else
			{
				$this->data['province']  = $this->form_validation->set_value('province');
				$this->data['regency']   = $this->form_validation->set_value('regency');
				$this->data['district']  = $this->form_validation->set_value('district');
				$this->data['post_code'] = $this->form_validation->set_value('post_code');
				$this->data['address1']  = $this->form_validation->set_value('address1');

				$this->data['message'] = (validation_errors() ? validation_errors() : 'Input data belum benar!');
			}
		}

		$this->load->view('layout/header', $this->data);
		$this->load->view('checkout/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	public function regencies()
	{
		$provid = $this->uri->segment(3);
		// $provid = $this->input->post("id");
		$data = $this->kabupaten_model->search($provid);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
				'data' => $data
		)));
	}

	public function districts()
	{
		$kbpid = $this->uri->segment(3);
		// $provid = $this->input->post("id");
		$data = $this->kecamatan_model->search($kbpid);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
				'data' => $data
		)));
	}
}
