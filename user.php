<?php
    class user{
        public $userID;
        public $userName;
        public $name;
        public $surName;
        private $passW;
        public $RGTime;

        public function __construct()
        {
            session_start();
        }

        public function isSession(){
            if(!isset($_SESSION['userName']) && !isset($_SESSION['userID'])){
                $this->logout();
            }
        }

        public function login($userName, $passW){
            require("config/db.php");

            //prepare method is for block SQL injections 
            $query = $db->prepare("SELECT userID, userName, name, surname, registerTime 
            FROM users 
            WHERE userName = ? and passW = ?");

            $query->execute(array($userName, $passW));

            $users = $query->fetchAll(PDO::FETCH_OBJ);
            $passW = null;

            if($query->rowCount() == 1){

                foreach ($users as $u){
                    $this->userID = $u->userID;
                    $this->userName = $u->userName;
                    $this->name = $u->name;
                    $this->surName = $u->surName;
                    $this->RGTime -> $u->registerTime;
                }
                $_SESSION['userID'] = $this->userID;
                $_SESSION['userName'] = $this->userName;
                $_SESSION['name'] = $this->name;
                $_SESSION['RGtime'] = $this->RGTime;

                echo "1"; //login success code for redirect to dashboard
            }
            else{
                echo "0"; //login error code
                $this->logout();
            }

        }

        public function logout(){
            session_unset();
            session_destroy();
            header("Refresh:0 ; url=index.html");
            exit();
        }
    }
?>