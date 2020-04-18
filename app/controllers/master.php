<?php 

class Master extends Controller
{


    public function __construct(){
        return $this->index();
    }

    public function index(){

        $this->setRequest();

        if($this->getRequest() !== false){

            $this->setData();
            $data = $this->getData();

            $res = API_model::doAPI($data);
            $responseObj = new stdClass();
            $responseObj = json_decode($res);

            error_log('show object response object: '.print_r($responseObj, 1));

            if($responseObj[0]->code != '6000')
            {
                switch($responseObj[0]->code)
                {
                    case 6001:
                        $responseObj[0]->message = 'User doesn\'t exists';
                    break;
                    case 6002:
                        $responseObj[0]->message = 'Incorrect Username or Password';
                    break;
                    default:
                        $responseObj[0]->code = '400';
                        $responseObj[0]->message = 'No response from database';
                    break;
                }
                echo json_encode($responseObj[0]);
            }else{
                echo json_encode($responseObj[0]);
            }
        }

    }

}