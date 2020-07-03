<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('kriptografi');
        $this->load->library('notification');
        $this->load->model('Wp_model','wp');
        $this->load->model('Role_model','role');
    }

    public function test(){
        $accesscode=$this->input->post('accesscode');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $enc=$this->kriptografi->enkripsi("anggaekapurnama4@gmail.com|1234","sindangsari2020");
        $enc2=$this->kriptografi->enkripsi($email."|".$password,$accesscode);
        $dec=$this->kriptografi->deskripsi($enc,"sindangsari2020");
        $dec2=$this->kriptografi->deskripsi($enc2,"sindangsari2020");
        echo $enc."<br>".$dec."<br>";
        echo $enc2."<br>".$dec2."<br>";
        echo $accesscode."<br>".$email."<br>".$password;
    }
    public function index(){
        if($this->session->userdata('id_role')=="1"){
            redirect("kdesa");
        }

        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
       
        if ($this->form_validation->run()==false){
            $data['title']='Login Page';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }else{
        	 $this->_login();
        }
    }
    private function _login()
    {
        
        $accesscode=$this->input->post('accesscode');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $login=$this->kriptografi->enkripsi($email."|".$password, $accesscode);
        $kunci=$this->db->get('validasi')->row_array();
        if(password_verify($accesscode,$kunci['data_validation'])){
            $user=$this->db->get_where('admin',['login_admin'=>$login])->row_array();
            if($user){
                        $data=[
                            'id_login'=>$user['id'],
                            'loged'=>$user['login_admin'],
                            'key'=>$accesscode,
                            'id_role'=>$user['id_role']
                        ];
                        $this->session->set_userdata($data);
                        if($user['id_role']==1){
                            redirect('kdesa');
                        }else{
                            redirect('kades');
                        }
            }else{
            	 $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Username unregistered! </div>');
                 redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Wrong Access Code! </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('key');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        You have been logout </div>');
        redirect('auth');
    }

    public function blocked(){
    	$data['title']='Blocked Page';
    	$this->load->view('templates/auth_header',$data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/auth_footer');
    }
    public function wp(){
        // if($this->session->userdata('id_role')=="1"){
        //     redirect("kdesa");
        // }
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        if ($this->form_validation->run()==false){
            $data['title']='Login Wajib Pajak';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/login_wp');
            $this->load->view('templates/auth_footer');
        }else{
        	 $this->_login_wp();
        }
    }
    private function _login_wp()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $login=$this->kriptografi->enkripsi($username."|".$password,"sindangsari2020");
        $user=$this->db->get_where('wajib_pajak',['login_wp'=>$login])->row_array();
        if($user){
            $data=[
                'id_login'=>$user['id_wp'],
                'loged'=>$user['login_wp'],
                'key'=>"sindangsari2020",
                'id_role'=>"3"
            ];
            $this->session->set_userdata($data);
            redirect('user');
        }else{
        	 $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Username unregistered! </div>');
             redirect('auth/wp');
        }
    }

    public function logout_wp()
    {
        $this->session->unset_userdata('id_login');
        $this->session->unset_userdata('loged');
        $this->session->unset_userdata('key');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        You have been logout </div>');
        redirect('auth/wp');
    }

    public function forgot_admin()
    {
        $data['title']="Forgot Account";
        $this->form_validation->set_rules('nama_admin','Nama Admin','trim|required');
        if ($this->form_validation->run()==false){
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/forgot_admin');
            $this->load->view('templates/auth_footer');
        }else{
            $nama_admin=$this->input->post('nama_admin');
            $enc_admin=$this->kriptografi->enkripsi($nama_admin,"sindangsari2020");
            $admin=$this->role->getAdmin($enc_admin);
            if($admin){
                $account=explode("|",$this->kriptografi->deskripsi($admin['login_admin'],"sindangsari2020"));
                $receiver=$account[0];
            }else{
                $receiver=null;
            }
            if ($receiver==null){
                $this->load->view('templates/auth_header',$data);
                $this->load->view('auth/false');
                $this->load->view('templates/auth_footer');
            }else{
                $subject="Informasi Akun ";
                $msg="Hai ".$nama_admin.". Berikut ini merupakan akun anda, untuk login ke dalam sistem \n Username : ".$account[0]." \n Password : ".$account[1];
                $this->notification->send_email($receiver,$subject,$msg);
                if (!$this->email->send()) {  
                    show_error($this->email->print_debugger());
                }else{
                    $data['title']="Sending Email";
                    $this->load->view('templates/auth_header',$data);
                    $this->load->view('auth/notif');
                    $this->load->view('templates/auth_footer');
                }
            }
            
        }
    }

    public function forgot()
    {
        $data['title']="Forgot Password";
        
        $this->form_validation->set_rules('nama','Nama Wajib Pajak','trim|required');
        if ($this->form_validation->run()==false){
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/forgot');
            $this->load->view('templates/auth_footer');
        }else{
            $username=$this->input->post('nama');
            $username=$this->kriptografi->enkripsi($username,"sindangsari2020");
            $info=$this->wp->cariUser($username);
            $account=explode("|",$this->kriptografi->deskripsi($info['login_wp'],"sindangsari2020"));
            $message = 'Berikut ini merupakan akun anda. Silahkan Login Dengan Akun Berikut : *username : '.$account[0].' password : '.$account[1].'*';
            $this->notification->send_message($account[0],$message);
            redirect("auth/wp");    
        }
    }
}
