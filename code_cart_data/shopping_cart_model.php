class nmnn extends CI_model
{
	function fetch_all()
	{
		$query = $this->db->get("product");
		return $query->result();
	}
}