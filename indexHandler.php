<?php
function connectBDD(){
$sqlQuery = new PDO( 'mysql:host=localhost;dbname=ecode2022;charset=UTF8','root');
    $sqlQuery->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = 'SELECT id, lastName, firstName, is_infected, birth FROM users';
    $stm = $sqlQuery->prepare($sql);
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
};

    function nameColor($status){
        if($status==0){
            $color='bgNeg';
        }
        else{
            $color='bgPos';
        }
        return $color;

    
    };
    function getFormatedDate($dateRecup){
        $d = $dateRecup;
        $t = new DateTime($d);
        return $t->format('d-m-Y');
    }?>