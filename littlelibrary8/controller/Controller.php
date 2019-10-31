<?php
include_once 'model/LibraryDB.php';
include_once 'model/Book.php';
require_once("model/Fields.php");
require_once("model/Validator.php");
//include_once 'Smarty.class.php';
include_once 'smarty/libs/Smarty.class.php';

class Controller {
    private $action;
    private $view;
    private $library_db;
    private $error_msg;
    
    /**
     * setup the controller
     */
    public function __construct() {
        session_start();
        $this->secureConnection();
        
        $this->library_db = new LibraryDB();
        if ($this->library_db->isConnected()) {
            $this->action = '';
            $this->error_msg = '';
        }
        else {
            $this->action = 'error';
            $this->error_msg = 'unable to connect to the database';
        }
        $this->view = new Smarty();
        $user = '';
        $image = '';
        $this->view->assign('user', $user);
        $this->view->assign('image', $image);
        // If a user is logged in, display the logout label
        if (isset($_SESSION['is_valid_user']) && $_SESSION['is_valid_user'] == True) {
            $this->view->assign('logInOut', 'Logout');
            $email = $_SESSION['email'];
            $user = $this->library_db->getUserName($email);
            $image = $this->library_db->getUserImage($email);
            if ($image[0] == NULL) {
                $image = 'default_profile.jpg';
            } else {
                $image = $image[0];
            }
            $this->view->assign('user', $user[0]);
            $this->view->assign('image', $image);
        }
    }
    
    /**
     * determine which action to take
     */
    public function invoke() {
        
        // get the action to be processed
        $this->getAction();
        
        switch ($this->action) {
            case 'show_home_page':
                $this->view->display('home.tpl');
                break;
            case 'show_catalog_page':
                $this->showCatalogPage();
                break;
            case 'show_locations_page':
                $this->showLocationsPage();
                break;
            case 'show_contact_page':
                $this->showContactPage();
                break;
            case 'process_contact_form':
                $this->processContactpage();
                break;
            case 'show_login_page':
                $this->showLoginPage();
                break;
            case 'login_logout' :
                $this->processLoginLogout();
                break;
            case 'login_user' :
                $this->processLogin();
                break;
            case 'show_registration_page':
                $this->showRegistrationPage();
                break;
            case 'process_registration_form':
                $this->processRegistrationPage();
                break;
            case 'upload_file' :
                $this->uploadFile();
                break;
            default:
                $this->view->assign('error_msg', $this->error_msg);
                $this->view->display('error.tpl');
                break;
        }
    }
    
    /*--------------------------------------------------------------
     *
     * Process requested page
     *
     *------------------------------------------------------------*/
    private function showCatalogPage() {
        $book_catalog = $this->library_db->getBookCatalog();
        $this->view->assign('book_catalog', $book_catalog);
        $this->view->display('catalog.tpl');
    }
    
    private function showLocationsPage() {
        $this->view->display('locations.tpl');
    }
    
    private function showContactPage() {
        $libraries = $this->library_db->getLibraries();
        $fields = new Fields();
        $fields->addField('name', '');
        $fields->addField('email', '');
        $fields->addField('phone', '');
        $fields->addField('date', '');
        $fields->addField('libraryID', 0);
        $fields->addField('comments', '');
        
        // assign smarty variables for the view
        $this->view->assign('libraries',$libraries);
        $this->view->assign('fields', $fields);
        
        $this->view->display('contact.tpl');
    }
    
    private function processContactPage() {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        $library_id = filter_input(INPUT_POST, 'library', FILTER_SANITIZE_STRING);
        $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
        
        $fields = new Fields();
        $fields->addField('name', $name, True);
        $fields->addField('email', $email, True);
        $fields->addField('phone', $phone);
        $fields->addField('date', $date);
        $fields->addField('libraryID', $library_id);
        $fields->addField('comments', $comments, True);
        Validator::validateAll($fields, $this->library_db);
         
        // assign smarty variables for the view
        $libraries = $this->library_db->getLibraries();
        $this->view->assign('libraries',$libraries);
        $this->view->assign('fields', $fields); 
        
        if ($fields->hasError()) {
            $this->view->display('contact.tpl');
        }
        else {
            $this->library_db->addMessage($library_id, $name, $email, $phone, $date, $comments);
            $this->view->display('confirmcontact.tpl');
        }
    }
    
    private function showLoginPage() {
        $this->view->display('login.tpl');
    }
    
    private function processLoginLogout() {
        // Check whether the user is logged in and therefore requests to log out
        if (isset($_SESSION['is_valid_user']) && $_SESSION['is_valid_user'] == True) {
            // Clear session data from memory
            $_SESSION = array();
            // Clean up the session ID
            session_destroy();
            // Get seesion cookie name
            $name = session_name();
            // Ceate expiration date in past
            $expire = strtotime('-1 year');
            // Get session params
            $params = session_get_cookie_params();
            $path = $params['path'];
            $domain = $params['domain'];
            $secure = $params['secure'];
            $httponly = $params['httponly'];
            setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
            $user = '';
            $image = '';
            $this->view->assign('message', 'You have successfully logged out');
            $this->view->assign('user', $user);
            $this->view->assign('image', $image);
            $this->view->assign('logInOut', 'Login');
        }
        $this->view->display('login.tpl');
    }
    
    private function processLogin() {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        if ($this->library_db->isValidUser($email, $password)) {
            $user = $this->library_db->getUserName($email);
            $image = $this->library_db->getUserImage($email);
            $this->view->assign('email', $email);
            $_SESSION['is_valid_user'] = True;
            $_SESSION['email'] = $email;
            $this->view->assign('message', 'Thanks for logging in.');
            $this->view->display('home.tpl');
            header("Location: .");
            
        }
        else {
            $this->view->assign('message', 'Invalid login information.');
            $this->view->assign('email', $email);
            $this->view->display('login.tpl');
        }
        
    }
    
    private function showRegistrationPage() {
        $fields = new Fields();
        $fields->addField('firstname', '');
        $fields->addField('lastname', '');
        $fields->addField('email', '');
        $fields->addField('phone', '');
        $fields->addField('password', '');
        
        // assign smarty variables for the view
        $this->view->assign('fields', $fields);
        $this->view->display('registration.tpl');
    }
    
    private function processRegistrationPage() {
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $fields = new Fields();
        $fields->addField('firstname', $firstname, True);
        $fields->addField('lastname', $lastname, True);
        $fields->addField('email', $email, True);
        $fields->addField('phone', $phone);
        $fields->addField('password', $password, True);
        Validator::validateAll($fields, $this->library_db);
        
        // assign smarty variables for the view
        $this->view->assign('fields', $fields);
        
        if ($fields->hasError()) {
            $this->view->display('registration.tpl');
        }
        else {
            $this->library_db->addRegistration($firstname, $lastname, $email, $phone, $password);
            $this->view->display('login.tpl');
        }
    }
    
    private function uploadFile() {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $this->view->assign('message', 'File is an image');
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $this->view->assign('message', 'File is not an image.');
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $this->view->assign('message', 'Sorry, file already exists.');
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            //echo "Sorry, your file is too large.";
            $this->view->assign('message', 'Sorry, your file is too large.');
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $this->view->assign('message', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                //echo "Sorry, your file was not uploaded.";
                $this->view->assign('message', 'Sorry, your file was not uploaded.');
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    $this->view->assign('message', 'File uploaded successfully; continue with user registration');
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                    $this->view->assign('message', 'Sorry, there was an error uploading your file');
                }
            }
            $this->showRegistrationPage();
    }
    
    /*--------------------------------------------------------------
     *
     * Utility Functions
     *
     *------------------------------------------------------------*/
    private function getAction() {
        if ($this->action === '') {
            $this->action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($this->action === NULL) {
                $this->action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if ($this->action === NULL) {
                    $this->action = 'show_home_page';
                }
            }
        }
    }
    
    private function secureConnection() {
        $https = filter_input(INPUT_SERVER, 'HTTPS');
        if(!$https) {
            $host = filter_input(INPUT_SERVER, 'HTTP_HOST');
            $uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
            $url = 'https://' . $host . $uri;
            header("Location: " . $url);
            exit();
        }
    }
}

?>