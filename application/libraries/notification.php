<?php
class notification{  
    function send_message($phone,$msg){
        $token = 'M23BEMzPmZ7KM8U8nyhXRcrl91ZYFbt6aOS8VpLqru8zy4umiH';
        $phone = $phone;
        $message =$msg;
        $url = 'http://ruangwa.com/api/send-message.php';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT,30);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array(
            'token'    => $token,
            'phone'     => $phone,
            'message'   => $message,
        ));
        $response = curl_exec($curl);
        curl_close($curl);  
    } 
    function send_email($receiver,$subject,$msg){
       $ci=get_instance();
       $ci->load->library('email');
       $ci->email->set_newline("\r\n");  
       $ci->email->from('hatinfree1@gmail.com', 'no-reply@PBBsindangsari');   
       $ci->email->to($receiver);   
       $ci->email->subject($subject);   
       $ci->email->message($msg);  
    }
} 
     