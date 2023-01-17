<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BaseController extends Controller{
    protected $model;
    protected const DELETABLE = ['1'=>'No','2'=>'Yes'];
    protected const ACTION_BUTTON = [
        'Edit'                   => '<i class="fas fa-edit text-primary mr-2"></i> Edit',
        'View'                   => '<i class="fas fa-eye text-warning mr-2"></i> View',
        'Schedule View'          => '<i class="fas fa-eye text-info mr-2"></i> Schedule View',
        'Delete'                 => '<i class="fas fa-trash text-danger mr-2"></i> Delete',
        'Change Status'          => '<i class="fas fa-check-circle text-success mr-2"></i>Change Status',
        'Booking Schedule'       => '<i class="fas fa-check-circle text-primary mr-2"></i>Booking Schedule',
    ];
    public function actionButton($key){
        $button = [
            'Edit'                          => '<i class="fas fa-edit text-primary mr-2"></i>Edit',
            'View'                          => '<i class="fas fa-eye text-warning mr-2"></i>View',
            'Over View'                     => '<i class="fas fa-eye text-warning mr-2"></i>Over View',
            'Details'                       => '<i class="fas fa-newspaper text-primary mr-2"></i>Details',
            'Delete'                        => '<i class="fas fa-trash text-danger mr-2"></i>Delete',
            'Change Status'                 => '<i class="fas fa-check-circle text-success mr-2"></i>Change Status',
            'Track'                         => '<i class="fas fa-check-circle text-info mr-2"></i>Track',
            'Partial Received'              => '<i class="fas fa-check-circle text-danger mr-2"></i>Partial Received',
            'Return'                        => '<i class="fas fa-check-circle text-danger mr-2"></i>Return',
            'Return Invoice'                => '<i class="fas fa-newspaper text-danger mr-2"></i>Return Invoice',
            'Add Payment'                   => '<i class="fas fa-plus-square text-info mr-2"></i>Add Payment',
            'Payment List'                  => '<i class="fas fa-file-invoice-dollar text-dark mr-2"></i>Payment List',
            'Finish Good'                   => '<i class="fas fa-boxes text-info mr-2"></i>Finish Good',
            'Production Product'            => '<i class="fas fa-boxes text-info mr-2"></i>Production Product',
            'Update Delivery'               => '<i class="fas fa-truck text-info mr-2"></i>Update Delivery',
            'Report'                        => '<i class="fas fa-file-invoice text-info mr-2"></i>Report',
            'Add Delivery'                  => '<i class="fas fa-truck text-info mr-2"></i>Add Delivery',
            'Purchase Invoice'              => '<i class="fas fa-file-invoice text-info mr-2"></i>Purchase Invoice',
            'Partial Received Invoice'      => '<i class="fas fa-receipt text-info mr-2"></i>Partial Received Invoice',
            'Save'                          => 'Save',
            'Generate Slip'                 => '<i class="fas fa-file-invoice-dollar text-dark mr-2"></i>Generate Slip',
            'Builder'                       => '<i class="fas fa-th-list text-success mr-2"></i>Builder',
            'Summary'                       => '<i class="fas fa-newspaper text-primary mr-2"></i>Summary',
            'Fixture'                       => '<i class="fas fa-newspaper text-primary mr-2"></i>Fixture',
        ];
        return $button[$key];
    }
    protected function setPageData(string $page_title, string $sub_title=null, string $page_icon=null, $breadcrumb=null){
        view()->share(['page_title' => $page_title, 'sub_title' => $sub_title ?? $page_title, 'page_icon' => $page_icon, 'breadcrumb' => $breadcrumb]);
    }
    protected function table_image($path,$image,$alt_text,$gender=null){
        if(!empty($path) && !empty($image) && !empty($alt_text)) {
            return "<img src='".asset("storage/".$path.$image)."' alt='".$alt_text."' style='width:50px;'/>";
        }else{
            if($gender){
                    return "<img src='".asset("images/".($gender == 1 ? 'male' : 'female').".svg")."' alt='Default Image' style='width:50px;'/>";
            }else{
                return "<img src='".asset("images/default.svg")."' alt='Default Image' style='width:50px;'/>";
            }
        }
    }
    protected function set_datatable_default_properties(Request $request){
        $this->model->setOrderValue($request->input('order.0.column'));
        $this->model->setDirValue($request->input('order.0.dir'));
        $this->model->setLengthValue($request->input('length'));
        $this->model->setStartValue($request->input('start'));
    }
    protected function showErrorPage($errorCode = 404, $message = null){
        $data['message'] = $message;
        return response()->view('errors.'.$errorCode, $data, $errorCode);
    }
    protected function response_json($status='success',$message=null,$data=null,$response_code=200){
        return response()->json([
            'status'        => $status,
            'message'       => $message,
            'data'          => $data,
            'response_code' => $response_code,
        ]);
    }
    protected function datatable_draw($draw, $recordsTotal, $recordsFiltered, $data){
        return array(
            "draw" => $draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data,
        );
    }
    protected function store_message($result, $update_id = null){
        return $result ? ['status' => 'success','message' => !empty($update_id) ? 'Data Has Been Updated Successfully' : 'Data Has Been Saved Successfully'] : ['status' => 'error','message' => !empty($update_id) ? 'Failed To Update Data' : 'Failed To Save Data'];
    }
    protected function delete_message($result){
        return $result ? ['status' => 'success','message' => 'Data Has Been Delete Successfully'] : ['status' => 'error','message' => 'Failed To Delete Data'];
    }
    protected function bulk_delete_message($result){
        return $result ? ['status' => 'success','message' => 'Selected Data Has Been Delete Successfully'] : ['status' => 'error','message' => 'Failed To Delete Selected Data'];
    }
    protected function unauthorized(){
        return ['status'=>'error','message'=>'Unauthorized Access Blocked!'];
    }
    protected function data_message($data){
        return $data ? $data : ['status' => 'error','message' => 'No data found'];
    }
    protected function access_blocked(){
        return redirect('unauthorized')->with(['status'=>'error','message'=>'Unauthorized Access Blocked']);
    }
    protected function track_data($collection, $update_id=null){
        $created_by   = $modified_by = auth()->user()->name;
        $created_at   = $updated_at  = Carbon::now();
        return $update_id ? $collection->merge(compact('modified_by','updated_at')) : $collection->merge(compact('created_by','created_at'));
    }
    protected function notification($device_token,$message){
        $SERVER_API_KEY = 'AIzaSyAI6egGW3pAafgySF8G0SzhLFEpkvgxfbE';
        $data = [
            "registration_ids" => [
                $device_token
            ],
            "notification" => [
                "title" => 'Notification',
                "body" => $message,
                "sound"=> "default"
            ],
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_exec($ch);
    }
}
