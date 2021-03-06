<?php
class Admin extends Controller
{
    public function __construct()
    {
        $this->formsModel = $this->model('formResponseModel');
        $this->adminModel = $this->model('adminModel');
        $this->postModel = $this->model('postsModel');
        $this->logModel = $this->model('telemetryActionModel');
    }

    function createTableData($message)
    {
        return [
            'msg' => $message,
            'adminModel' => $this->adminModel,
            'response' => $this->formsModel->getForms(),
            'admins' => $this->adminModel->getAdmins(),
            'posts' => $this->postModel->getPosts(),
            'actions' => $this->logModel->getActions()
        ];
    }

    public function index()
    {
        if (!isset($_POST['login'])) {
            $this->view('Admin/login');
        } else {
            $admin = $this->adminModel->getAdminByUsername($_POST['username']);

            if ($admin != null) {
                $hashed_pass = $admin->admin_pass_hash;
                $password = $_POST['password'];
                if (password_verify($password, $hashed_pass)) {
                    createSession($admin);
                    $data = $this->createTableData("Welcome, $admin->admin_name!");
                    logAction("ADMIN_LOGIN");
                    $this->view('Admin/tables', $data);
                } else {
                    $data = [
                        'msg' => "Password incorrect! for $admin->admin_name",
                    ];
                    logAction("ADMIN_LOGIN_FAIL");
                    $this->view('Admin/login', $data);
                }
            } else {
                $data = [
                    'msg' => "Admin: " . $_POST['username'] . " does not exists",
                ];
                $this->view('Admin/login', $data);
            }
        }
    }

    public function forgot()
    {
        if (!isset($_POST['reset'])) {
            $this->view('Admin/forgot');
        } else {
            $admin = $this->adminModel->getAdminByUsername($_POST['name']);

            if ($admin != null) {
                $hashed_pass = $admin->admin_pass_hash;
                $password = $_POST['password'];
                if (password_verify($password, $hashed_pass)) {
                    $newpassword = $_POST['newpassword'];
                    $verifiedpassword = $_POST['verifiedpassword'];
                    if ($newpassword == $verifiedpassword) {
                        logAction("ADMIN_PASS_RESET_SUCCESS");
                        createSession($admin);
                        $data = [
                            'admin_name' => trim($_POST['name']),
                            'admin_pass_hash' => password_hash($_POST['newpassword'], PASSWORD_DEFAULT)
                        ];
                        if ($this->adminModel->updateAdminPass($data)) {
                            echo 'Please wait updating password for the account ' . trim($_POST['name']);
                            echo '<meta http-equiv="Refresh" content="2; url=/MVC/Login/">';
                            $this->view('Admin/forgot');
                        }
                    } else {
                        logAction("ADMIN_PASS_RESET_FAIL_NONMATCH");
                        $data = [
                            'msg' => "Passwords do not match!",
                        ];
                        $this->view('Admin/forgot', $data);
                    }
                } else {
                    logAction("ADMIN_PASS_RESET_FAIL_INCORRECT");
                    $data = [
                        'msg' => "Password incorrect! for $admin->admin_name",
                    ];
                    $this->view('Admin/forgot', $data);
                }
            } else {
                $data = [
                    'msg' => "Admin: " . $_POST['username'] . " does not exists",
                ];
                $this->view('Admin/forgot', $data);
            }
        }
    }

    public function tables()
    {
        if (!isLoggedIn()) {
            logAction("TELEMETRY_ACCESS_DENIED");
            $data = [
                'msg' => "Access denied; please log in.",
            ];
            $this->view('Admin/login', $data);
        } else {   
            logAction("TELEMETRY_READ");
            $data = $data = $this->createTableData("");
            $this->view('Admin/tables', $data);
        }
    }

    public function addPost()
    {
        if (!isLoggedIn()) {
            logAction("POST_CREATE_ACCESS_DENIED");
            $data = [
                'msg' => "Access denied; please log in.",
            ];
            $this->view('Admin/login', $data);
        } else {
            if (!isset($_POST['addPost'])) {
               $this->view('Admin/addPost');
            } else {
                $data = [
                    'description' => trim($_POST['description']),
                    'post_title' => trim($_POST['title']),
                    'post_media_source' => $_POST['mediaSource'],
                    'admin_id' => $_SESSION['admin_id'],
                ];
                if ($this->postModel->createPost($data)) {
                    logAction("POST_CREATE");
                    header('Location: /MVC/Admin/tables');
                }
            }
        }
    }

    public function delete($admin_id){
        $posts=[
            'posts' => $this->postModel->getAdminPosts($admin_id)
        ];
        $data = $this->createTableData("");
        $data += [
            'webmaster' => $this->postModel->getWebmaster(),
            'admin_id' => $admin_id
        ];
        if (sizeof($posts) == 0) {
                if($this->adminModel->delete($data)){
                    logAction("ADMIN_DELETE");
                    if ($admin_id == $_SESSION['admin_id']) {
                        unset($_SESSION['user_id']);
                        session_destroy();
                        header('Location: /MVC/Home/home');     
                }else{
                    $data = $this->createTableData("");
                    $data += [
                        'webmaster' => $this->postModel->getWebmaster()
                    ];
                        $this->view('Admin/tables', $data);      
                }
            }
        }else{
            $this->postModel->updateAdminPosts($data);
            if($this->adminModel->delete($data)){
                logAction("ADMIN_DELETE");
                if ($admin_id == $_SESSION['admin_id']) {
                    unset($_SESSION['user_id']);
                    session_destroy();
                    header('Location: /MVC/Home/home');     
            }else{
                $data = $this->createTableData("");
                $this->view('Admin/tables', $data);      
            }
            }
        }
            
    }

    public function deletePost($post_id){
        $data=[
            'post_id' => $post_id
        ];
        if($this->postModel->delete($data)){
            logAction("POST_DELETE");
            header('Location: /MVC/Admin/tables');
        }
    }

    public function rename($admin_id){
        if(!isset($_POST['rename'])){
            $this->view('Admin/rename');
        }else{
            $data=[
                'admin_id' => $admin_id,
                'admin_name' => trim($_POST['name'])
            ];
            logAction("ADMIN_RENAME");
            if($this->adminModel->renameAdmin($data)){
                header('Location: /MVC/Admin/tables');
            }
        }
    }

    public function edit($post_id){
        if(!isset($_POST['editPost'])){
            $this->view('Admin/editPost');
        }else{
            $data=[
                'admin_id' => $_SESSION['admin_id'],
                'post_title' => $_POST['editTitle'],
                'description' => $_POST['editDescription'],
                'post_media_source' => $_POST['editMediaSource'],
                'post_id' => $post_id
            ];

            $filledFields = 0;
            $successfulEdits = 0;
            if (!empty(trim($data['admin_id']))) {
                $filledFields = $filledFields + 1;
                if ($this->postModel->updatePostAdmin($data['admin_id'])) {
                    $successfulEdits = $successfulEdits + 1;
                }
            }if (!empty(trim($data['post_title']))) {
                $filledFields = $filledFields + 1;
                if ($this->postModel->updatePostTitle($data)) {
                    $successfulEdits = $successfulEdits + 1;
                }
            }if (!empty(trim($data['description']))) {
                $filledFields = $filledFields + 1;
                if ($this->postModel->updatePostDescription($data)) {
                    $successfulEdits = $successfulEdits + 1;
                }
            }if (!empty(trim($data['post_media_source']))) {
                $filledFields = $filledFields + 1;
                if ($this->postModel->updatePostMediaSource($data)) {
                    $successfulEdits = $successfulEdits + 1;
                }
            }

            logAction("POST_EDIT");
            if($successfulEdits == $filledFields){
                header('Location: /MVC/Admin/tables');
            }
        }
    }

    public function deleteResponse($form_id){
        $data=[
            'form_id' => $form_id
        ];
        if($this->formsModel->delete($data)){
            logAction("RESPONSE_DELETE");
            header('Location: /MVC/Admin/tables');
        }
    }

    public function logout(){
        unset($_SESSION['admin_id']);
        session_destroy();
        // echo '<meta http-equiv="Refresh" content="0.1; url=/TermProject/Login/">';
        $this->view('Home/home');
    }
    
    public function addAdministrator()
    {
        if (!isLoggedInWebmaster()) {
            logAction("ADMIN_CREATE_ACCESS_DENIED");
            $data = [
                'msg' => "Access denied; please log in.",
            ];
            $this->view('Admin/login', $data);
        } else {

            
            if (!isset($_POST['addAdmin'])) {
                $this->view('Admin/addAdministrator');
            } else {
                $admin = $this->adminModel->getAdminByUsername($_POST['name']);
                if ($admin == null) {
                    $data = [
                        'admin_name' => trim($_POST['name']),
                        'admin_pass_hash' => password_hash($_POST['passwd'], PASSWORD_DEFAULT),
                        'admin_mail' => trim($_POST['adminEmail'])
                    ];
                    if ($this->adminModel->createAdmin($data)) {
                        logAction("ADMIN_CREATE");
                        echo 'Please wait creating the account for ' . trim($_POST['name']);
                        echo '<meta http-equiv="Refresh" content="2; url=/MVC/Login/">';
                    }
                } else {
                    $data = [
                        'msg' => "Admin: " . $_POST['name'] . " already exists",
                    ];
                    $this->view('Admin/addAdministrator', $data);
                }
            }
        }
    }
}
