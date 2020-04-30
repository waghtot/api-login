<?php 

class Master extends Controller
{


    public function __construct(){
        return $this->index();
    }

    public function index(){

        $this->setRequest();

        if($this->getRequest() !== false){


            $data = $this->getRequest();

            if(isset($data->action))
            {
                $response = false;
                switch($data->action)
                {
                    case 'Login';
                        if($this->verifyData()!==false)
                        {
                            $response = $this->logUser();
                        }
                    break;
                }
                echo json_encode($response);
            }

        }

    }

    private function verifyData()
    {
        $data = new stdClass();
        $data->api = 'verify';
        $data->action = 'Login';
        $data->params = $this->getRequest()->params;

        $res = API_model::doAPI($data);
        error_log('show verify response: '.print_r($res, 1));
        return $res;
        
    }

    private function logUser()
    {
        error_log('we are about login user');
    }
}