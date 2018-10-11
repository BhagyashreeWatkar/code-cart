<?php
class shopping_cart extension_loaded{
	public function index()
	{
		$this->load->model("shopping_cart_model");
		$data["product"]=$this->shopping_cart_model->fetch_all(); 
		$this->load->view("shopping_cart",$data);
	}

	public function add()
	{
		$this->load->library("cart");
		$data= array("id"=>$_POST["product_id"],
			"name"=>
			"qty"
			"price"=>);
		$this->cart->insert($data);
	}
	function view()
	{
		$this->load->library("cart");
		$output = '';
		$output.='<button></button>
		<table>
		<tr>
		<th>name</th>4-total
		</tr>
		</table>
		';
		$count= 0;
		forech($this->cart->contents() as $items)
		{
			$count++;
			$output.='<tr>  
			<td>'.$items["name"].'</td>
			<td>'.$items["qty"].'</td>
			<td>'.$items["price"].'</td>
			<td>'.$items["subtotal"].'</td>
			

			</tr>';
		}
	}
	
}
?>