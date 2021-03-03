<?php

require_once ROOT.'/core/BaseController.php';
require_once ROOT.'/app/Models/User.php';
require_once ROOT.'/app/Models/Order.php';

class OrderController extends BaseController
{
    public function __construct()
	{
        parent::__construct();
        // Got users id from Session

        if($userId=$this->session()->get('userId')){
            $this->user = (new User)->getByPK($userId);
        }else {
          	$this->user = null;
        }
    }

    public function cart()
	{
		if (!$this->user) {
            $this->redirector->redirect("/#login");
        }

        // Only allow POST requests
        if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
            throw new Exception('Only POST requests are allowed');
        }

        // Make sure Content-Type is application/json 
        $content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
        if (stripos($content_type, 'application/json') === false) {
            throw new Exception('Content-Type must be application/json');
        } else {
            // Read the input stream
            // Receive the RAW post data.
            $content = trim(file_get_contents("php://input"));

            // Decode the JSON object
            $decoded = json_decode($content, true);

            // Throw an exception if decoding failed
            if (!is_array($decoded)) {
                throw new Exception('Failed to decode JSON object');
            }
            $productsInCart = json_encode($decoded['cart']);

            (new Order)->save([
                    "user_id"=>$this->user->id, 
                    "products"=>$productsInCart
            ]);

       		$options = array(
			   'error' => false,
			   'message' => 'Everything OK',
			);

            echo json_encode($options);
        }
	}
}