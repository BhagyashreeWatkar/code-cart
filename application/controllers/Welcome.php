<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function  __construct() {
        parent::__construct();
      
        $this->load->library('session');
        $this->load->model('file');
    }
    
    public function index(){
        //$products=array('product_name'=>$this->input->post('productname'));
        //print_r($products);
        $data = array();
       
        if($this->input->post('fileSubmit') && !empty($_FILES['files']['name']))
        {
            $filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++)
            {
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                
                
                //$uploadPath = 'uploads/files/';
                $config['upload_path'] = 'uploads/files';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                
                if($this->upload->do_upload('file'))
                {
                 
                    $fileData = $this->upload->data();
                    //echo "<pre>";
                    //print_r($fileData);
                    //echo "<pre>";
                    //$products=array('product_name'=>$this->input->post('productname'));
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    //$pro_file_name=$uploadData[$i]['file_name'];

                     $products=array('product_name'=>$this->input->post('productname'),
                        'file_name'=>$uploadData[$i]['file_name']);
                     echo"<pre>";
                     print_r($products);
                     echo "<pre>";
                    //print_r($pro_file_name);
                    //$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

                    $insert = $this->file->insert($products);
                }
            }
            
        }
        
       
        $data['files'] = $this->file->getRows();
        $this->load->view('upload_files/index', $data);
    }

    public function cart_action()
    {
      //print_r($_POST); exit;
       $product_id = $this->input->post['X'];

       $data = array(
        'id'=>$product_id);
    
        $this->cart->insert($data);
       // echo $product_id;
       //echo $product_id;
       //echo "<pre>";
       //print_r (isset($_COOKIE['cookie_product_id']));exit;
       //echo "</pre>";
       print_r($_COOKIE);
       //foreach ($variable as $key => $value) {
           
       //}
       /*if(!isset($_COOKIE['cookie_product_id']))
       {
        $newproduct = $product_id;
        $cookie = array('name'=>'cookie_product_id',
                'value'=>$this->input->post('X'));
        $this->input->set_cookie($cookie);
       }*/
       /*else
       {
            $getcookiedata = $_COOKIE['cookie_product_id'];
            $newproduct = $getcookiedata.",".$product_id;
            $cookie = array('name'=>'cookie_product_id',
                'value'=>$this->input->post('X'));

       }
       $ans=explode(",",$newproduct);
       print_r($ans);
       $result = array_unique($ans);
       print_r($result);
       echo count($result);*/
    }

    public function show_cart()
    {
      $this->load->library('cart');
        $this->load->view('cart',$this->cart->contents( ));
    }
    public function insert()
    {
        $data = array('id'=>'sku_123abc',
            'qty'=> 1,
            'price'=>39.95,
            'name'=>'t-shirt');
        $this->cart->insert($data);
    }

    ////////////
    function add_product()
      {
        $this->load->library('cart'); 
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        //console//echo $id.$name.$price;
        $data = array(
        'id'      => '$id',
        'qty'     => 1,
        'price'   => $price,
        'name'    => $name
        
);

if($this->cart->insert($data))
{
  echo "whghjew";
}
else
{
   echo "try again";
}
      }

}

