<?php
/*Ripetere l’esercizio del controllo password visto a lezione (da soli o rivedendo il video)
Implementare un metodo che faccia reinserire la password qualora anche una delle regole non fosse rispettate e che, invece, lo interrompa in caso di password accettata visualizzare in console quale regola non è stata rispettata. */

$pwd= readline("write the password: ");

function check_length($string){
    if(strlen($string)>=8){
       return true;
    }else{
        echo "Required length not met.\n";
        return false;
    }
}


$check_length=check_length($pwd);


function check_number($string){
    for($i=0;$i<strlen($string);$i++){
        if(is_numeric($string[$i])){
            return true;
        }
    }
    echo "Required at least one Number!\n";
    return false;
}

$check_number=check_number($pwd);



function check_uppercase($string){
     for($i=0;$i<strlen($string);$i++){
        if(ctype_upper($string[$i])){
            return true;
        }
    }
    echo "Required at least one upper case!\n";
    return false;
}

$check_uppercase=check_uppercase($pwd);



function check_special($string){
    $special_characters=['!','@','#','$','%','&'];
     for($i=0;$i<strlen($string);$i++){
        if(in_array($string[$i],$special_characters)){
            return true;
        }
    }
    echo "Required at least one special character!\n";
    return false;
}

$check_special=check_special($pwd);


function check_password($phase1,$phase2,$phase3,$phase4){
    if($phase1 && $phase2 && $phase3 && $phase4){
        echo "Password Accepted! \n";
    }else{
        echo "Password Not Accepted!\n";
        $pwd= readline("write the password: ");
        $phase1 = check_length($pwd);
        $phase2 = check_number($pwd);
        $phase3 = check_uppercase($pwd);
        $phase4 = check_special($pwd);

        check_password($phase1, $phase2, $phase3, $phase4);
 }
}

$check_password=check_password($check_length,$check_number,$check_special,$check_uppercase);
echo $check_password;

?>