<?php

function login_admin()
{
    $ci=get_instance();
    if(empty($ci->session->userdata('loged'))){
        redirect('auth');
    }else{
        $id_role=$ci->session->userdata('id_role');
        if($id_role!="1"){
            redirect('auth/blocked');
        }
    }
}

function login_kades()
{
    $ci=get_instance();
    if(empty($ci->session->userdata('loged'))){
        redirect('auth');
    }else{
        $id_role=$ci->session->userdata('id_role');
        if($id_role!="2"){
            redirect('auth/blocked');
        }
    }
}

function login_wp()
{
    $ci=get_instance();
    if(empty($ci->session->userdata('loged'))){
        redirect('auth/wp');
    }else{
        $id_role=$ci->session->userdata('id_role');
        if($id_role!="3"){
            redirect('auth/blocked');
        }
    }
    
}

