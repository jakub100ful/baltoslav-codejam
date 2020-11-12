<?php 


class DB {  

    public $connection;

    public $disorderDic = [
        "hasAnxietyDisorder",
        "hasMoodDisorder",
        'hasPsychoticDisorder',
        'hasEatingDisorder',
        'hasADHD',
        'hasPersonalityDisorder',
        'hasOCD',
        'hasPTSD',
        'hasStressResponseSyndrome',
        'hasDissociativeDisorder',
        'hasSubstanceUseDisorder',
        'hasAddictiveDisorder',
        'Other',
    ];

    function __construct(){
        $servername = "178.62.91.41";
        $username = "db_user";
        $password = "baltoslav";
        $dbname = "db_baltoslav";
        $port = "3306";

        $conn = new mysqli();
        $conn->init();
        if(!$conn){
            echo "Connection failed";
        }else{
            $conn->ssl_set(NULL,NULL,NULL,'/public_html/sys_tests', NULL);

            $conn->real_connect($servername, $username, $password, $dbname, $port, NULL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

            if($conn->connection_errorno){
                echo "Connection failed";
            }else{
                //echo"<p>Connected to server: " . $conn->host_info . "</p>";
                $this->connection = $conn;
                //echo "Set connection object";
            }
        }



    }

    function getUsers(){
        $sql = "SELECT `supportiveResponseToMentalHealthDescription`, count(*) FROM `Raw_Survey_Data` GROUP BY `supportiveResponseToMentalHealthDescription`";
        $result = mysqli_query($this->connection,$sql);

        $users = [];

        while ($row = mysqli_fetch_assoc($result)){
           
            array_push($users,$row);
        }



        return $users;

    }

    
}
?>