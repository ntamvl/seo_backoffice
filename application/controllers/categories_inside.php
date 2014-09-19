<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_inside extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$categories =& SeoCategoryInsideModel::getCategories();

		$this->smview->assign('cate_datas', $categories);
		$this->smview->display('category/categories_inside.html');
	}

	public function getTargetCategory()
	{
		$rtn = array();

		$target_id = $this->input->post('id');
		$arr = SeoCategoryInsideModel::getTargetCategory($target_id);

		$rtn = array(
			'id' => $arr['id'],
			'title' => $arr['title'],
			'description' => $arr['description']
		);

		echo json_encode($rtn);
	}

	public function newCategory()
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
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
