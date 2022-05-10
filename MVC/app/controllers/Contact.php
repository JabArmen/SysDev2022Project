<?php
class Contact extends Controller
{
    public function __construct()
    {
        $this->formModel = $this->model('formResponseModel');
    }

    public function index()  {
        if(!isset($_POST['submit'])){
            $this->view('Contact/contact');
        }
        else{
            $data = [
                'service' => $_POST['service'],
                'client_name' => $_POST['name'],
                'client_surname' => $_POST['surname'],
                'client_email' => $_POST['email'],
                'client_phone' => $_POST['telephone'],
                'message' => $_POST['message']
            ];
            if($this->formModel->createForm($data)){
                $confirmation = "confirmed";
                $this->view('Contact/contact',$confirmation);
            };
        }
    }
}