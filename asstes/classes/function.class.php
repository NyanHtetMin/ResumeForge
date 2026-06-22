<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} class Functions{
    public function redirect($address){
        header("Location:".$address);
        exit;
    }
    public function setError($msg){
        $_SESSION['error']=$msg;
    }
    public function error(){
        if(isset($_SESSION['error'])){
            echo "Swal.fire('','".$_SESSION['error']."','error')";
            unset($_SESSION['error']);
           
        }
    }
    public function setAlert($msg){
        $_SESSION['alert']=$msg;
    }
    public function alert(){
        if(isset($_SESSION['alert'])){
            echo "Swal.fire('','".$_SESSION['alert']."','success')";
            unset($_SESSION['alert']);
           
        }
    }
    public function setAuth($data){
        $_SESSION['Auth']=$data;
    }
    public function Auth(){
        if(isset($_SESSION['Auth'])){
            return $_SESSION['Auth'];
        
    }else{
        return false;
    }
    }
    public function Authpage(){
         if(!isset($_SESSION['Auth'])){
            $this->redirect("index.php");
        }
    }
    public function nonAuthpage(){
         if(isset($_SESSION['Auth'])){
            $this->redirect("myresumes.php");
        }
    }
    public function setSession($key,$value){
        $_SESSION[$key]=$value;
    }
    public function getSession($key){
        return $_SESSION[$key]??'';
    }
    public function randomstring(){
        $string="0123456789abcdefghijklmnopqrstuvwxyz_".time().rand(1111,2222333);
        $string=str_shuffle($string);
        return str_split($string,18)[0];
       
    }
}
    
 $fn=new Functions();