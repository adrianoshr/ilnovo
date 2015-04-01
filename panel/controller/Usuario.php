<?php

ADOdb_Active_Record::SetDatabaseAdapter($db);
ADODB_Active_Record::ClassHasMany('Usuario', 'datos', 'id_usuario');
ADODB_Active_Record::ClassHasMany('Usuario', 'direccion', 'id_usuario');

class Usuario extends ADOdb_Active_Record {

    var $_table = 'sys_usuarios';

    function login() {
        global $db;
        $nombreu = $this->nombreu;
        $contrasenia = md5($this->contrasenia);
        $res = $this->Load("contrasenia='$contrasenia' AND nombreu='$nombreu' AND id_status=1");
        if (true == $res) {
            $id_usuario = $this->id_usuario;
            $_SESSION['g000_id_usuario'] = $id_usuario;
            $_SESSION['g000_nombreu'] = $this->nombreu;
            $_SESSION['g000_correo'] = $this->correo;
            $_SESSION['g000_id_perfil'] = $this->id_perfil;
            $_SESSION['remoteAddr'] = $_SERVER['REMOTE_ADDR'];
            return true;
        } else {
            return false;
        }
    }

    function loginSocial() {
        global $db;
        $llave = $this->llave;
        $res = $this->Load("llave='$llave' AND id_status=1");
        if (true == $res) {
            $id_usuario = $this->id_usuario;
            $_SESSION['g000_id_usuario'] = $id_usuario;
            $_SESSION['g000_nombreu'] = $this->nombreu;
            $_SESSION['g000_correo'] = $this->correo;
            $_SESSION['g000_id_perfil'] = $this->id_perfil;
            $_SESSION['remoteAddr'] = $_SERVER['REMOTE_ADDR'];
            unset($_SESSION['g000_id_empresa']);
            if (4 != $this->id_perfil) {
                $arDatos = $this->datos;
                $id_datos = $arDatos[0]->id_datos;
                $qrSelect = 'SELECT DISTINCT id_empresa '
                        . ' FROM rel_usuario_sucursales '
                        . ' INNER JOIN sys_usuarios '
                        . ' ON sys_usuarios.id_usuario=rel_usuario_sucursales.id_usuario'
                        . ' INNER JOIN sucursales '
                        . ' ON sucursales.id_sucursal=rel_usuario_sucursales.id_sucursal '
                        . " WHERE sys_usuarios.id_usuario='$id_usuario'"
                        . ' limit 1';
                $rsSelect = $db->Execute($qrSelect)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                if (!$rsSelect->EOF) {
                    list($id_empresa) = $rsSelect->FetchRow();
                    $_SESSION['g000_id_empresa'] = $id_empresa;
                }
            }
        }
        return $res;
    }

    function autoLogin() {
        global $db;
        $nombreu = $this->nombreu;
        $contrasenia = $this->contrasenia;
        $res = $this->Load("contrasenia='$contrasenia' AND nombreu='$nombreu' AND id_status=1");
        if (true == $res) {
            $id_usuario = $this->id_usuario;
            $_SESSION['g000_id_usuario'] = $id_usuario;
            $_SESSION['g000_nombreu'] = $this->nombreu;
            $_SESSION['g000_correo'] = $this->correo;
            $_SESSION['g000_id_perfil'] = $this->id_perfil;
            $_SESSION['remoteAddr'] = $_SERVER['REMOTE_ADDR'];
            unset($_SESSION['g000_id_empresa']);
            if (4 != $this->id_perfil) {
                $arDatos = $this->datos;
                $id_datos = $arDatos[0]->id_datos;
                $qrSelect = 'SELECT DISTINCT id_empresa '
                        . ' FROM rel_usuario_sucursales '
                        . ' INNER JOIN sys_usuarios '
                        . ' ON sys_usuarios.id_usuario=rel_usuario_sucursales.id_usuario'
                        . ' INNER JOIN sucursales '
                        . ' ON sucursales.id_sucursal=rel_usuario_sucursales.id_sucursal '
                        . " WHERE sys_usuarios.id_usuario='$id_usuario'"
                        . ' LIMIT 1';
                $rsSelect = $db->Execute($qrSelect)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                if (!$rsSelect->EOF) {
                    list($id_empresa) = $rsSelect->FetchRow();
                    $_SESSION['g000_id_empresa'] = $id_empresa;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    function valida_nombre_usuario($nombre_usuario) {
        if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20) {
            return false;
        }
        $permitidos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_@.';
        for ($i = 0; $i < strlen($nombre_usuario); $i++) {
            if (false === strpos($permitidos, substr($nombre_usuario, $i, 1))) {
                return false;
            }
        }

        return $nombre_usuario;
    }

    function validaPassword($password) {
        $tamanoMin = 3;
        if (empty($tamanoMin)) {
            return false;
        }
        if (!empty($password)) {
            if (ctype_space($password) || false !== strpos($password, ' ')) {
                return false;
            }
            $pass = (strip_tags($password));
            $passw = (strlen(trim($pass)));
            if ($passw < $tamanoMin || 15 < strlen($passw)) {
                return false;
            } else {
                return true;
            }
        }
        return false;
    }

}

class Datos extends ADOdb_Active_Record {

    var $_table = 'datos';

}

class Direccion extends ADOdb_Active_Record {

    var $_table = 'direcciones';

}

class Empleado extends Usuario {

}
