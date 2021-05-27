<?php

$databases = [];

try{ 
    $pdo = new PDO("mysql:host=localhost", "root", ""); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e){ 
    die("ERROR: Could not connect. " . $e->getMessage()); 
} 



  
try{ 
    $sql = "SHOW DATABASES"; 
    $res = $pdo->query($sql); 


	$databases = $res->fetchAll();


	foreach ($databases as $key => $value) {

		$pdo = new PDO("mysql:host=localhost;dbname=" . $value[0] , "root", ""); 

		$value = $value[0];

	
    	var_dump($pdo->exec("DROP DATABASE $value"));
		
	}

	

    echo "Database DEMO deleted successfully."; 
} catch(PDOException $e){ 
    die("ERROR: Could not able to execute $sql. " 
                                . $e->getMessage()); 
} 
unset($pdo); 
?>