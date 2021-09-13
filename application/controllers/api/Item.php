<?php

require APPPATH . 'libraries/REST_Controller.php';

class Item extends REST_Controller {

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_get() {
        $id = $_GET['id'];
        if (!empty($id)) {
            $this->db->where(array('id' => $id));
            $data = $this->db->get("tb_test")->row_array();
//            echo $this->db->last_query();
        } else {
            $data = $this->db->get("tb_test")->result();
//            echo 'Samanta';
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_post() {
//        $id = $_GET['id'];
//        $entry_date = $_GET['entry_date'];
//        $name = $_GET['name'];
//        $emp_code = $_GET['emp_code'];
//        $designation = $_GET['designation'];
//        $input = array('id' => $id, 'entry_date' => $entry_date, 'name' => $name, 'emp_code' => $emp_code, 'designation' => $designation);
        $input = file_get_contents("php://input");
        $this->db->insert('tb_test', json_decode($input));

        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_put($id) {
        $input = $this->put();
        $this->db->update('items', $input, array('id' => $id));

        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_delete($id) {
        $this->db->delete('items', array('id' => $id));

        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }

}
