<?php 
    if(count($_POST) > 0){
       
        if(isValidationForm()==true){
            setUser();
        };
      };

    function setUser(){
    $sqlQuery = new PDO( 'mysql:host=localhost;dbname=ecode2022;charset=UTF8','root');
    $sqlQuery->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql = "INSERT INTO `users`(`lastName`, `firstName`, `is_infected`, `birth`, `mail`, `password`) VALUES (:lastname,:firstname,:infectStat,:birth, :mail, :password)";
    $stm = $sqlQuery->prepare($sql);
    $stm->execute([
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'infectStat' => $_POST['infectStat'],
        'birth' => $_POST['birth'],
        'mail' => $_POST['mail'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)]);
    
    header('Location: index.html'); exit();
    };

    function isValidationForm():bool {
            $isValid=false;
            foreach ($_POST as $key => $value){
                if((strlen($value))==0){
                    $isValid=true;
                    return $isValid;
                }
            }
            //var_dump($_POST);
            //die;
            return $isValid;
    };


?>



