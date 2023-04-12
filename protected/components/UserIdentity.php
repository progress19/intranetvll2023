<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
 private $_id;
 public function authenticate()
 {
 $username=strtolower($this->username);
 $user=Usuario::model()->find('LOWER(username)=?',array($username));
 
 if($user===null)
 	$this->errorCode=self::ERROR_USERNAME_INVALID;
 else if(!$user->validatePassword($this->password))
 	$this->errorCode=self::ERROR_PASSWORD_INVALID;
 else
 {
 
 $this->_id=$user->id;
 $this->username=$user->username;
 $this->setState('roles', $user->roles); 
 $this->errorCode=self::ERROR_NONE;

/*Consultamos los datos del usuario por el username ($user->username) */
$info_usuario = Usuario::model()->find('LOWER(username)=?', array($user->username));
/*En las vistas tendremos disponibles ultimologin etc */
$this->setState('nombre',$info_usuario->nombre);
$this->setState('apellido',$info_usuario->apellido);
$this->setState('ultimologin',$info_usuario->ultimologin);
$this->setState('idSector',$info_usuario->idSector);

if ($info_usuario->avatar==1) {
$this->setState('avatar',"/img/avatar1.png");
}

if ($info_usuario->avatar==2) {
$this->setState('avatar',"/img/avatar2.png");
}

if ($info_usuario->avatar==3) {
$this->setState('avatar',"/img/avatar3.png");
}

if ($info_usuario->avatar==4) {
$this->setState('avatar',"/img/avatar4.png");
}

if ($info_usuario->avatar==5) {
$this->setState('avatar',"/img/avatar5.png");
}

/*Actualizamos el ultimologin del usuario que se esta autenticando ($user->username) */
$sql = "update usuario set ultimologin = now() where username='$user->username'";
$connection = Yii::app() -> db;
$command = $connection -> createCommand($sql);
$command -> execute();

 }
 return $this->errorCode==self::ERROR_NONE;
 }
 public function getId()
 {
 return $this->_id;
 }
 }