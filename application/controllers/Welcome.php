<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
  
  function __construct()
  {
    parent::__construct();
  }  
  
	public function index()
	{
    
    $this->load->helper('form');
	$this->load->helper('url');
    
    // Load the cart library to use it.
    $this->load->library('cart');
    
	/*
    // To add items in your shopping cart
    $data = array(
               'id'      => 'sku_999',
               'qty'     => 5,
               'price'   => 99.85,
               'name'    => 'iPad4',
               'options' => array('Storage' => '32GB', 'Color' => 'White')
            );

    $this->cart->insert($data);
    
    // You can also put multiple data to your cart
    $data = array(
               array(
                       'id'      => 'sku_888',
                       'qty'     => 1,
                       'price'   => 39.95,
                       'name'    => 'T-Shirt'
                       
                    ),
               array(
                       'id'      => 'sku_777',
                       'qty'     => 1,
                       'price'   => 9.95,
                       'name'    => 'Coffee Mug'
                    ),
               array(
                       'id'      => 'sku_666',
                       'qty'     => 1,
                       'price'   => 29.95,
                       'name'    => 'Shot Glass'
                    )
            );

    $this->cart->insert($data);
	*/
	
	// Assuming this is the products from our database
		$data['products'] = array(
               array(
                       'id'      => 'sku_888',
                       'qty'     => 1,
                       'price'   => 39.95,
                       'name'    => 'T-Shirt',
                       'options' => array('Size' => 'xxx', 'Color' => 'White')
                       
                    ),

                array(
                       'id'      => 'sku_888',
                       'qty'     => 1,
                       'price'   => 39.95,
                       'name'    => 'T-Shirt',
                       'options' => array('Size' => 'xx', 'Color' => 'green')
                       
                    ),


               array(
                       'id'      => 'sku_777',
                       'qty'     => 1,
                       'price'   => 9.95,
                       'name'    => 'Coffee Mug'
                    ),
               array(
                       'id'      => 'sku_666',
                       'qty'     => 1,
                       'price'   => 29.95,
                       'name'    => 'Shot Glass'
                    )
            );


			
	// Insert the product to cart
	if ($this->input->get('id') != '' && array_key_exists($this->input->get('id'), $data['products']))
	{

		$this->cart->insert($data['products'][$this->input->get('id')]);
	}
	
	// Lets update our cart
	if ($this->input->post('update_cart'))
	{

		unset($_POST['update_cart']);
		$contents = $this->input->post();
    

		foreach ($contents as $content)
		{
			$info = array(
		   'rowid' => $content['rowid'],
		   'qty'   => $content['qty']
			 );

			$this->cart->update($info);

		}
	}
    
	  $this->load->view('welcome_message', $data);
	}
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */