<?php

ADOdb_Active_Record::SetDatabaseAdapter($db);

class Binnacle extends ADOdb_Active_Record {

    var $_table = 'binnacles';

    public function registerBinnacle($id_evento, $datos) {

        $this->id_usuario = $_SESSION['g000_id_usuario'];
        $this->id_evento = $id_evento;
        $this->fecha = date('Y-m-d');
        $this->hora = date('H:i:s');
        $this->datos = $datos;
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $rsB = $this->Save();
        if (false == $rsB) {
            return $this->ErrorMsg();
        } else {
            return true;
        }
    }

}

?>