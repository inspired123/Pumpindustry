<?php
namespace cms\user\Controllers;

use cms\globalcp\Jobs\SendWhatsappMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /*
     * send api response
     */
    protected function sendResponse($status = 1,$code = 200,
                                 $data = array(),
                                 $message = "") {
        if(count($data) == 0) {
            $data = ["dummy" => ""];
        }
        $response = [
            'status' => $status,
            'code' => $code,
            'data'  => $data,
            'message' => ucfirst($message)
        ];

        return response()->json($response,$code);
    }
    
}
