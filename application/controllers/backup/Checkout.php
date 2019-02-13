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
		// $this->load->model('member_model');
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
            
        // $submit = $this->input->post('submit1');

        // if ($submit) {
			
			$tab  = $this->input->get('tab');

			if ($tab) {

				if ($tab === 'address') {
					
					$dir  = $this->input->get('dir');

					if (!$dir) {

						/* Validate form input */
						$this->form_validation->set_rules('first_name', 'lang:checkout_first_name', 'required');
						$this->form_validation->set_rules('last_name', 'lang:checkout_last_name', 'required');
						$this->form_validation->set_rules('email', 'lang:checkout_email', 'required|valid_email');
						$this->form_validation->set_rules('phone', 'lang:checkout_phone', 'required');
						
						$this->form_validation->set_rules('province', 'lang:checkout_province', 'required');
						$this->form_validation->set_rules('regency', 'lang:checkout_regency', 'required');
						$this->form_validation->set_rules('district', 'lang:checkout_district', 'required');
						
						$this->form_validation->set_rules('post_code', 'lang:checkout_post_code', 'required');
						$this->form_validation->set_rules('address', 'lang:checkout_address', 'required');
						
						if ($this->form_validation->run() == TRUE)
						{

							// shipping address data
							$first_name = $this->input->post('first_name');
							$last_name  = $this->input->post('last_name');
							$company    = $this->input->post('company');
							$address    = $this->input->post('address');

							$province   = $this->input->post('province');
							$regency    = $this->input->post('regency');
							$district   = $this->input->post('district');
							$post_code  = $this->input->post('post_code');
							$phone      = $this->input->post('phone');
							$email      = strtolower($this->input->post('email'));
							$note       = $this->input->post('note');
							
							$address_data = array(
								'first_name' => $first_name,
								'last_name'  => $last_name,
								'company'    => $company,
								'address'    => $address,
								'province'   => $province,
								'regency'    => $regency,
								'district'   => $district,
								'post_code'  => $post_code,
								'phone'      => $phone,
								'email'      => $email,
								'note'       => $note,
							);
							// simpan data alamat pengiriman ke variabel session
							$this->session->set_userdata($address_data);

							$this->data['kabupaten'] = $this->kabupaten_model->get_by_province_id($province);
							$this->data['kecamatan'] = $this->kecamatan_model->get_by_regency_id($regency);

							$this->load->view('layout/header', $this->data);
							$this->load->view('checkout/delivery', $this->data);
							$this->load->view('layout/footer', $this->data);
							return;
						}
						else // validasi input gagal
						{
							$this->data['province']  = $this->form_validation->set_value('province');
							$this->data['regency']   = $this->form_validation->set_value('regency');
							$this->data['district']  = $this->form_validation->set_value('district');
							$this->data['post_code'] = $this->form_validation->set_value('post_code');
							$this->data['address']   = $this->form_validation->set_value('address');
			
							$this->data['message'] = (validation_errors() ? validation_errors() : 'Input data belum benar!');
						}
					}
				}
				elseif ($tab === 'delivery')
				{
					
					$dir  = $this->input->get('dir');

					$this->load->view('layout/header', $this->data);
					if ($dir) {
						$this->load->view('checkout/address', $this->data);
					} else {
						$delivery = $this->input->post('delivery');
						$this->session->set_userdata('delivery', $delivery);
	
						$this->load->view('checkout/payment', $this->data);
					}
					$this->load->view('layout/footer', $this->data);
					return;

				}
				else  // tab payment
				{
					
					$dir  = $this->input->get('dir');
					if ($dir) {
						$this->load->view('layout/header', $this->data);
						$this->load->view('checkout/delivery', $this->data);
						$this->load->view('layout/footer', $this->data);
					}
					else
					{
					
						// mulai transaksi
						$this->db->trans_start();
						
						$address_data = array(
							'first_name' => $_SESSION["first_name"],
							'last_name'  => $_SESSION["last_name"],
							'company'    => $_SESSION["company"],
							'address'    => $_SESSION["address"],
							'province'   => $_SESSION["province"],
							'regency'    => $_SESSION["regency"],
							'district'   => $_SESSION["district"],
							'post_code'  => $_SESSION["post_code"],
							'phone'      => $_SESSION["phone"],
							'email'      => $_SESSION["email"],
						);
					
						$this->db->insert('address', $address_data);
						$addrid = $this->db->insert_id();

						$mbrid      = $this->input->post('mbrid');
						$total      = $this->input->post('total');
						$shipcost   = $this->input->post('shipcost');
						$tax        = $this->input->post('tax');
						$note       = $_SESSION["note"];
						
						$payment    = $this->input->post('payment');

						$tglinput   = date('Y-m-d');

						$orders_data = array(
							'tglinput' => $tglinput,
							'mbrid'    => $mbrid,
							'addrid'   => $addrid,
							'total'    => $total,
							'gtotal'   => $total,
							'shipcost' => $shipcost,
							'tax'      => $tax,
							'payment'  => $payment,
							'note'     => $note,
						);
						$this->db->insert('orders', $orders_data);
						$orderid = $this->db->insert_id();
				
						// $length = count($this->input->post('kdbar'));

						// $kdbar  = $this->input->post('kdbar');
						// $qty    = $this->input->post('qty');
						// $harga  = $this->input->post('harga');
						// $jumlah = $this->input->post('jumlah');

						//  simpan detail
						// for ($i = 0; $i < $length; $i++) {
						foreach ($_SESSION["cart_item"] as $item) {						
						
							$item_price  = (float)$item["qty"]*$item["harga"];
							
							$detail_data = array(
								'id'       => $orderid,
								'tglinput' => $tglinput,
								'kdbar'    => $item["kdbar"],
								'qty'      => $item["qty"],
								'hjual'    => $item["harga"],
								'jumlah'   => $item_price
							);
							$this->db->insert('orders_detail', $detail_data);
						}
						
						$this->db->trans_complete(); // commit

						
						// clear data
						$array_items = array('first_name', 'last_name', 'company', 'address',
							'province', 'regency', 'district', 'post_code', 'phone', 'email');
						$this->session->unset_userdata($array_items);

						if(!empty($_SESSION["cart_item"])) {
				
							foreach($_SESSION["cart_item"] as $k => $v) {
								unset($_SESSION['cart_item'][$k]);
							}
						}
						$this->session->set_userdata('totqty', 0);
						$this->session->set_userdata('tot_price', 0);
						
						redirect('/', 'refresh');
					}

				}
			}
		// }

		$this->load->view('layout/header', $this->data);
		$this->load->view('checkout/address', $this->data);
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
