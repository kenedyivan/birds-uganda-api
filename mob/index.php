<?php
include '../dbcon.php';
class mob extends dbcon{
	
	public function do_get_msg(){
		$db = $this->db_properties();
		$u_num = $_POST['u_num'];
		$response["result"] = array(); 
		
		$qry = $db->query("select * from admin_client_chat where chat_topic='".$u_num."'");
		
		while($array = $qry->fetch_assoc()){
			$response['result'][] = $array;
			}                        
		
		echo json_encode($response);
		
	}
    
    public function do_send_msg(){
        $db = $this->db_properties();
        $chat_msg = $db->real_escape_string($_POST['u_name']);
        $u_num = $_POST['u_num'];
        
        $response["result"] = array(); 
        $results = array();        
        $msg = "Thank you for registering with us.";
        $status = "1";
        
        $check = $db->query("select * from admin where u_number='".$u_num."'");
        
        if($check->num_rows>0){
            
            //$array = $check->fetch_array();
            $date_ = date('Y-m-d H:i:s');
            if($db->query("insert into admin_client_chat set chat_topic='".$u_num."', chat_msg='".$chat_msg."', chat_u_num='".$u_num."', chat_date_time='".$date_."'")){
                
            } else {
                $status = "0";
                $msg = "Failed, try again later";
            }
            
            
        } else {
            $status = "0";
            $msg = "Account error, try to re-login";
        }
        
        $results['message'] = $msg;
                $results['status'] = $status;
    
    array_push($response["result"],$results);
    echo json_encode($response);
        
    }

    public function do_register(){
        $db = $this->db_properties();
        $u_num = date('ym').rand(100, 999);
        $msg = "Thank you for registering with us.";
        $status = "1";
        $u_name = $db->real_escape_string($_POST['u_name']);
        $u_email = $db->real_escape_string($_POST['u_email']);
        $u_pw = $db->real_escape_string($_POST['u_pw']);
        
        $response["result"] = array(); 
        $results = array();
        
        $check = $db->query("select * from admin where email='".$u_email."'");
        
        if($check->num_rows>0){
            $msg = "This email is already registered.";
            $status = "0";
        } else {
            $u_pw = md5($u_pw);
            $qry = $db->query("insert into admin set name='".$u_name."', email='".$u_email."', password='".$u_pw."', u_number='".$u_num."'");
            if($qry){
                
            } else {
                $status = "0";
                $msg = "Internal server error while registering, try again later";
            }
        }
        
        $results['message'] = $msg;
                $results['status'] = $status;
    
    array_push($response["result"],$results);
    echo json_encode($response);
        
    }
    
    public function do_login(){
        $db = $this->db_properties();
        
        $response["result"] = array(); 
        $results = array();
        
        $msg = "Wrong email or password";
        $status = "0";
        $u_names = "";
        $u_number = "";
        
        $u_name = $db->real_escape_string($_POST['u_name']);
        $u_pw = $db->real_escape_string($_POST['u_pw']);
        
        $u_pw = md5($u_pw);
        $qry = $db->query("select * from admin where email='".$u_name."' and password='".$u_pw."'");
        while ($array = $qry->fetch_array()){
            $status = "1";
            $u_name = $array['name'];
            $u_number = $array['u_number'];
        }
        
        
        
        $results['message'] = $msg;
        $results['u_names'] = $u_names;
                $results['status'] = $status;
                $results['u_number'] = $u_number;
                
                array_push($response["result"],$results);
    echo json_encode($response);
        
    }
    
}
$mob = new mob();
$bd = "";
if(isset($_GET['bd'])){
$bd = $_GET['bd'];

switch ($bd){
    case "do_register";
        $mob->do_register();
        break;
    
    case "do_login";
        $mob->do_login();
        break;
    
    case "do_send_msg";
        $mob->do_send_msg();
        break;
		
		case "do_get_msg";
		$mob->do_get_msg();
		break;
}

}
