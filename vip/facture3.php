<?php
session_start();

if (!isset($_SESSION['eleve']))
    header("location:../html/connect.php");
  
    function recupsol(){
        
        $DB_DSN = 'mysql:host=localhost;dbname=u549774271_registration';
        $DB_USER = 'u549774271_root';
        $DB_PASS = 'Geisha@987^qs';
        
        try
        {
            $options =
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE
            ];
            
            $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS,$options);
            
            $request = $PDO->prepare("SELECT * FROM registre");
            $request->execute();
            $request->setFetchMode(PDO::FETCH_ASSOC);
            
            while($data = $request->fetch())
            {
                if($data['dutil'] == $_SESSION['eleve'])
                { $sol=$data['sol1'];return $sol;echo $sol;}
            }
        }
        catch (PDOException $pe){ echo 'erreur : '.$pe->getMessage();}
    } 
      
    function donnepts()
    {
        global $pts;
        
        $DB_DSN = 'mysql:host=localhost;dbname=u549774271_registration';
        $DB_USER = 'u549774271_root';
        $DB_PASS = 'Geisha@987^qs';
        
        try
        {
            $options =
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE
            ];
            
            $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS,$options);
            
            $request = $PDO->prepare("SELECT * FROM registre");
            $request->execute();
            $request->setFetchMode(PDO::FETCH_ASSOC);
            
            while($data = $request->fetch())
            {
                if($data['dutil'] == $_SESSION['eleve'])
                { $pts=$data['points'];return $pts;}
            }
        }
        
        catch (PDOException $pe){ echo 'erreur : '.$pe->getMessage();}
        
    }
    
    function verifpoints()
    {
        if(isset($_POST['montant'])&&!empty($_POST['montant']))
        {
            
            $Variable_user = $_POST['montant'];
            $montant= htmlspecialchars($Variable_user);
        }
        else header("location:../vip/facture1.php");
        
              
        
        $DB_DSN = 'mysql:host=localhost;dbname=u549774271_registration';
        $DB_USER = 'u549774271_root';
        $DB_PASS = 'Geisha@987^qs';
        
       try
        {
            $options =
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE
            ];
            
            $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS,$options);
         
            $pts=donnepts();
            
            $sol=recupsol();
            
            //mini déchiffrement
            $cipher ="AES-256-CBC";
            $iv=str_repeat("0", openssl_cipher_iv_length($cipher));
            $sol=openssl_decrypt($sol,$cipher,"@^Solution^@",'0',$iv); 
            
            if($montant == $sol)
            {
                $pts++;
            }
           
            
            $request = $PDO->prepare("UPDATE registre SET points = :points WHERE dutil =:eleve");
            $request->execute(array(":points"=>$pts,":eleve"=>$_SESSION['eleve'])); 
            
            
        }
        
        catch (PDOException $pe){ echo 'erreur : '.$pe->getMessage();}
        
    }
    
   verifpoints();
   
   
    
    
    
   
    
?> <script>window.location.replace("../vip/base.php");</script>
