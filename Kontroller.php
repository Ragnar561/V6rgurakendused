<?php
function Kontroller_add($nimetus, $kogus)
{
	
    if (!Kontroller_user()) {
       message_add('Tegevus eeldab sisselogimist');
	  
		return false;
		
    }
    
    if ($nimetus == '' || $kogus <= 0) {
         message_add('Sisendandmed on vigased!');

		return false;
		
    }
	
    if (mudel_add($nimetus, $kogus)) {
        message_add('Lisati uus rida');
        
		return true;
    }
	
    message_add('Andmete lisamine ebaõnnestus');
    
	return false;
	
}

function Kontroller_delete($id)
{
    if (!Kontroller_user()) {
		message_add('Antud tegevus eeldab sisselogimist.');
       
	   return false;
	   
    }
   
   if ($id <= 0) {
        message_add('Sisendandmed on vigased!');
		
		return false;
    }
	
	if(mudel_delete($id)) {
		message_add('Kustutati rida ' $id);
   
   return true;
	
	}
	
	message_add('Rea kustutamine ebaõnnestus!');
	
	return false;
	
}

function Kontroller_update($id, $kogus)
{
	if ( !Kontroller_user() ){
		message_add('Antud tegevus eeldab sisselogimist.');
		
		return false;
	}
	
	if ( $id <= 0 || $kogus <= 0 ) {
		message_add('Sisendandmed on vigased');
		
		return false;
		
	}
	
	if(mudel_update($id, $kogus)){
		message_add('Andmeid uuendati real ' $id);
	
	return true;
	
}

	message_add('Andmete uuendamine ebaõnnestus');
	
	return false;
	
}

function Kontroller_user()
{
    if (empty($_SESSION['login'])) {
        
		return false;
    }
    
	return $_SESSION['login'];
}

function Kontroller_register($kasutajanimi, $parool)
{
    if ($kasutajanimi == '' || $parool == '') {
        message_add('Sisendandmed on vigased!!');
		
		return false;
		
    }
	
	if(mudel_user_add($kasutajanimi, $parool)) {
		message_add('Registreeritud');
	
    return true;
	
}
	message_add('Konto registreerimine ebaõnnestus!! Sisestatud kasutajanimi võib olla juba kasutusel.');
	
	return false;
	
}

function Kontroller_login($kasutajanimi, $parool)
{
    if ($kasutajanimi == '' || $parool == '') {
        message_add('Sisendandmed on vigased!!');
		
		return false;
		
    }
    
	$id = mudel_user_get($kasutajanimi, $parool);
    if (!$id) {
		message_add('Sisestatud kasutajanimi või parool on vale!');
        
		return false;
		
    }
    
	session_regenerate_id();
    $_SESSION['login'] = $id;
    message_add('Olete sisselogitud.');
	
	return $id;
	
}

function Kontroller_logout()
{
    if (!Kontroller_user()) {
        
		return false;
		
    }

    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 42000, '/');
		
    }

    $_SESSION = array();

    session_destroy();
	
	message_add('Olete laoprogrammist välja logitud');
	
    return true;
	
}
   
    
function message_add($message)
{
	if(empty($_SESSION['messages'])){
		$_SESSION['messages'] = array();
		
	}
	
	$_SESSION['messages'][] = $message;
	
}

function message_list()
{
	if(empty($_SESSION['messages'])){
		
		return array();
		
	}
	
	$messages = $_SESSION['messages'];
	$_SESSION['messages'] = array();
	
	return $messages;	
	
} 