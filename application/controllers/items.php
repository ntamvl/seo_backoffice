<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$items =& SeoItemModel::getItemList();

		$this->smview->assign('items', $items);
		$this->smview->display('item/items.html');
	}

	public function getTargetItem()
	{
		$rtn = array();

		$target_id = $this->input->post('id');
		$arr = SeoItemModel::getTargetItem($target_id);

		$internal = array(
			'cid' => $arr['icid'],
			'cname' => $arr['category_in'],
			'title' => $arr['title_inside'],
			'description' => $arr['description_inside'],
			'solution' => $arr['solution_inside'],
		);
		$external = array(
			'cid' => $arr['icid'],
			'cname' => $arr['category_out'],
			'title' => $arr['title_outside'],
			'description' => $arr['description_outside'],
			'solution' => $arr['solution_outside'],
		);
		$normal = array(
			'func_name' => $arr['name'],
			'release_status' => $arr['release_status'],
			'critical_status' => $arr['critical_status'],
			'score' => $arr['score'],
		);

		$rtn = array(
			'internal' => $internal,
			'external' => $external,
			'normal' => $normal,
		);

		echo json_encode($rtn);
	}

	/*public function newCategory()
	{
		$parent_id = $this->input->post('parent_id');
		SeoCategoryInsideModel::newCategory($parent_id, '請輸入類別名');
	}

	public function deleteCategory()
	{
		$id = $this->input->post('id');
		SeoCategoryInsideModel::deleteCategory($id);
	}

	public function updateCategory()
	{
		$data = array(
			'id' => $id = $this->input->post('id'),
			'title' => $id = $this->input->post('title'),
			'description' => $id = $this->input->post('description')
		);
		SeoCategoryInsideModel::updateCategory($data);
	}*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
