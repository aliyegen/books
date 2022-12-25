<?php
    class user{
        public $userID;
        public $userName;
        private $passW;

        public function __construct()
        {
            session_start();
        }
        
        //clear special characters
        public function codeclear ($text) { 
            $text = preg_replace("'<script[^>]*>.*?</script>'si", '', $text );
            $text = preg_replace('/<a\s+.*?href="([^"]+)"[^>]*>([^<]+)<\/a>/is', '\2 (\1)',$text );
            $text = preg_replace( '/<!--.+?-->/', '', $text );
            $text = preg_replace( '/{.+?}/', '', $text );
            $text = preg_replace( '/&nbsp;/', ' ', $text );
            $text = preg_replace( '/&amp;/', ' ', $text );
            $text = preg_replace( '/&quot;/', ' ', $text );
            $text = strip_tags($text);
            $text = htmlspecialchars($text);
            $text = addslashes(trim($text));
            return $text;
        }

        public function logout(){
            session_unset();
            session_destroy();
            header("Refresh:0 ; url=.");
            exit();
        }

        public function login($userName, $passW){
            $userName = $this->codeclear($userName);
            $passW = $this ->codeclear($passW);
            $passW = md5($passW); //password md5 encrypting
            
            require("config/db.php");//connect db

            //prepare method is using for block SQL injections 
            $query = $db->prepare("SELECT userID, userName
            FROM users 
            WHERE userName = ? and passW = ?");

            $query->execute(array($userName, $passW));

            $users = $query->fetchAll(PDO::FETCH_OBJ);
            $passW = null;

            if($query->rowCount() == 1){

                foreach ($users as $u){
                    $this->userID = $u->userID;
                    $this->userName = $u->userName;
                }
                $_SESSION['userID'] = $this->userID;
                $_SESSION['userName'] = $this->userName;

                echo "1"; //login success code for redirect to dashboard
            }
            else{
                echo "0"; //login error code
                $this->logout();
            }

        }

        //check session
        public function isSession(){
            if(!isset($_SESSION['userName']) && !isset($_SESSION['userID'])){
                $this->logout();
            }
        }
    }
?>