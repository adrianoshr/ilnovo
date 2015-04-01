<?php

// +----------------------------------------------------------------------+
// | PHP version 5                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 2012-2014 TecDev                            |
// +----------------------------------------------------------------------+
// | Authors: Marcos Velazquez <marcosvelazquez@me.com>                   |
// |          <mvelazquezbarocio@gmail.com>                               |
// +----------------------------------------------------------------------+
// | Clase: <_Anuncios >                                                 |
// | Paquete:                                                             |
// | Metodos:                                                             |
// |     recupera_Anuncios():bolean                                      |
// |     guarda_Anuncios():bolean                                        |
// |     modifica_Anuncios():bollean                                     |
// +----------------------------------------------------------------------+
//
class Anuncio {

    private $table;
    private $fields = array();
    public $arSecciones = array();
    public $arCategorias = array();
    public $db;

    private function Mapping() {
        $this->table = 'scd_Anuncios';
        $this->fields['idAnuncio'] = Array('table' => 'idAnuncio', 'flags' => 'not_null primary_key auto_increment', 'type' => 'int', 'len' => '11', 'change' => false, 'iskey' => 1);
        $this->fields['titulo'] = Array('table' => 'titulo', 'flags' => 'not_null', 'type' => 'string', 'len' => '255', 'change' => false, 'iskey' => 0);
        $this->fields['path'] = Array('table' => 'path', 'flags' => 'not_null', 'type' => 'string', 'len' => '255', 'change' => false, 'iskey' => 0);
        $this->fields['url'] = Array('table' => 'url', 'flags' => 'not_null', 'type' => 'string', 'len' => '255', 'change' => false, 'iskey' => 0);
        $this->fields['cliente'] = Array('table' => 'cliente', 'flags' => 'not_null', 'type' => 'string', 'len' => '255', 'change' => false, 'iskey' => 0);
        $this->fields['fechaInicio'] = Array('table' => 'fechaInicio', 'flags' => 'not_null binary', 'type' => 'date', 'len' => '10', 'change' => false, 'iskey' => 0);
        $this->fields['fechaFin'] = Array('table' => 'fechaFin', 'flags' => 'not_null binary', 'type' => 'date', 'len' => '10', 'change' => false, 'iskey' => 0);
        $this->fields['estado'] = Array('table' => 'estado', 'flags' => 'not_null', 'type' => 'int', 'len' => '4', 'change' => false, 'iskey' => 0);
        $this->fields['hits'] = Array('table' => 'hits', 'flags' => 'not_null', 'type' => 'int', 'len' => '11', 'change' => false, 'iskey' => 0);
        $this->fields['idCFTipoBanner'] = Array('table' => 'idCFTipoBanner', 'flags' => 'not_null multiple_key', 'type' => 'int', 'len' => '4', 'change' => false, 'iskey' => 0);
    }

    function Anuncio($db) {
        $this->Mapping();
        $this->db = $db;
    }

    public function modificaAnuncio() {
        $arQuery = array();
        $arWhere = array();
        foreach ($this->fields as $key => $value) {
            if (strpos($this->fields[$key]['flags'], 'primary_key auto_increment')) {
                if ('int' == $this->fields[$key]['type']) {
                    $arWhere[] = ' ' . $this->fields[$key]['table'] . '=' . intval($this->fields[$key]['value']);
                } else {
                    $arWhere[] = ' ' . $this->fields[$key]['table'] . "='" . $this->fields[$key]['value'] . "'";
                }
            } else {
                if (true == $this->fields[$key][change]) {
                    if ($this->fields[$key][type] == "int") {
                        $arQuery[] = ' ' . $this->fields[$key]['table'] . '=' . intval($this->fields[$key]['value']);
                    } else {
                        $arQuery[] = ' ' . $this->fields[$key]['table'] . "='" . ($this->fields[$key]['value']) . "'";
                    }
                }
            }
        }
        $query = implode(',', $arQuery);
        $where = implode(',', $arWhere);
        if (empty($query) or empty($where)) {
            return false;
        }
        $qrModifica = 'UPDATE ' . $this->table . ' SET ' . $query . ' WHERE ' . $where;
        $rs = $this->db->Execute($qrModifica) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
        if ($rs->EOF) {
            return true;
        } else {
            return false;
        }
    }

    public function guardaAnuncio() {
        $qrGuarda = null;
        foreach ($this->fields as $key => $value) {
            if (!is_numeric($key)) {
                if (!strpos($this->fields[$key]['flags'], 'primary_key auto_increment')) {
                    $arWhere[] = $this->fields[$key]['table'];
                    if ('int' == $this->fields[$key]['type']) {
                        $arValues[] = ' ' . intval($this->fields[$key]['value']);
                    } else {
                        $arValues[] = " '" . ($this->fields[$key]['value']) . "'";
                    }
                }
            }
        }
        $values = implode(',', $arValues);
        $where = implode(',', $arWhere);
        if (empty($values) || empty($where)) {
            return false;
        }
        $qrGuarda = 'INSERT INTO ' . $this->table . ' (' . $where . ') VALUES (' . $values . ')';
        $rs = $this->db->Execute($qrGuarda) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
        if ($rs->EOF) {
            $llave = $this->db->Insert_ID();
            $this->setIdAnuncio($llave);
            return true;
        }
    }

    public function recuperaAnuncio() {
        $primary = $this->getIdAnuncio();
        if (!empty($primary)) {
            $sel = false;
            foreach ($this->fields as $key => $value) {
                if (!$this->fields[$key][iskey]) {
                    if (false != trim($sel)) {
                        $sel.=',';
                    }
                    $sel.=$this->fields[$key]['table'];
                }
            }
            $select = 'SELECT ' . $sel . ' FROM ' . $this->table . " WHERE  idAnuncio=$primary";
            $rs = $this->db->Execute($select) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
            if (!$rs->EOF) {
                if ($row = $rs->FetchRow()) {
                    foreach ($row as $key => $value) {
                        $this->fields[$key]['value'] = $value;
                        if (strpos($this->fields[$key][flags], 'primary_key auto_increment')) {
                            $llave = $this->fields[$key]['value'];
                        }
                    }
                }
                $qrSecciones = 'SELECT DISTINCT idCFSeccion FROM scd_Anuncios_has_Secciones '
                        . " WHERE idAnuncio='$primary'";
                $rsSecciones = $this->db->Execute($qrSecciones) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
                if (!$rsSecciones->EOF) {
                    while (list($idCFSeccion) = $rsSecciones->FetchRow()) {
                        $this->arSecciones[] = $idCFSeccion;
                    }
                }
                $qrCategorias = 'SELECT DISTINCT idCFCategoria FROM scd_Anuncios_has_Categorias '
                        . " WHERE idAnuncio='$primary'";
                $rsCategorias = $this->db->Execute($qrCategorias) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
                if (!$rsCategorias->EOF) {
                    while (list($idCFCategoria) = $rsCategorias->FetchRow()) {
                        $this->arCategorias[] = $idCFCategoria;
                    }
                }
                return true;
            }
        }
    }

    public function RandomPost($idCFSeccion = 0, $idCFTipoBanner = 0) {
        $hoy = date('Y-m-d');
        $select = 'SELECT DISTINCT ' . $this->table . '.idAnuncio,titulo,fechaInicio,fechaFin,path,'
                . 'url,nombreNodo,caracteristica'
                . ' FROM ' . $this->table . ' LEFT JOIN scd_Anuncios_has_Secciones '
                . ' ON scd_Anuncios_has_Secciones.idAnuncio=' . $this->table . '.idAnuncio '
                . ' LEFT JOIN scd_cfsecciones ON scd_cfsecciones.idCF=idCFSeccion '
                . ' WHERE  ' . $this->table . '.estado=1 AND scd_cfsecciones.status=1 ';
        if (!empty($idCFSeccion)) {
            $select .=" AND  idCFSeccion='$idCFSeccion'";
        }
        if (!empty($idCFTipoBanner)) {
            $select .=" AND  idCFTipoBanner='$idCFTipoBanner'";
        }
        $select .=" AND fechaInicio<='$hoy' AND fechaFin>='$hoy' ";
        $select .=' GROUP BY ' . $this->table . '.idAnuncio ORDER BY rand()  LIMIT 3';
        $rs = $this->db->CacheExecute(300, $select) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
        if (!$rs->EOF) {
            return $rs;
        } else {
            return false;
        }
    }

    public function eliminaAnuncio() {
        $idAnuncio = $this->getIdAnuncio();
        if (!empty($idAnuncio)) {
            $select = 'DELETE FROM ' . $this->table . " WHERE  idAnuncio=$idAnuncio";
            $rs = $this->db->Execute($select) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
            if ($rs->EOF) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function setIdAnuncio($value) {
        $value = intval($value);
        $this->fields['idAnuncio']['value'] = $value;
        $this->fields['idAnuncio']['change'] = true;
    }

    public function setTitulo($value) {
        $value = trim($value);
        $this->fields['titulo']['value'] = $value;
        $this->fields['titulo']['change'] = true;
    }

    public function setPath($value) {
        $value = trim($value);
        $this->fields['path']['value'] = $value;
        $this->fields['path']['change'] = true;
    }

    public function setUrl($value) {
        $value = trim($value);
        $this->fields['url']['value'] = $value;
        $this->fields['url']['change'] = true;
    }

    public function setCliente($value) {
        $value = trim($value);
        $this->fields['cliente']['value'] = $value;
        $this->fields['cliente']['change'] = true;
    }

    public function setFechaInicio($value) {
        $this->fields['fechaInicio']['value'] = $value;
        $this->fields['fechaInicio']['change'] = true;
    }

    public function setFechaFin($value) {
        $this->fields['fechaFin']['value'] = $value;
        $this->fields['fechaFin']['change'] = true;
    }

    public function setEstado($value) {
        $value = intval($value);
        $this->fields['estado']['value'] = $value;
        $this->fields['estado']['change'] = true;
    }

    public function setHits($value) {
        $value = intval($value);
        $this->fields['hits']['value'] = $value;
        $this->fields['hits']['change'] = true;
    }

    public function setIdCFTipoBanner($value) {
        $value = intval($value);
        $this->fields['idCFTipoBanner']['value'] = $value;
        $this->fields['idCFTipoBanner']['change'] = true;
    }

    public function getIdAnuncio() {
        return $this->fields['idAnuncio']['value'];
    }

    public function getTitulo() {
        return $this->fields['titulo']['value'];
    }

    public function getPath() {
        return $this->fields['path']['value'];
    }

    public function getUrl() {
        return $this->fields['url']['value'];
    }

    public function getCliente() {
        return $this->fields['cliente']['value'];
    }

    public function getFechaInicio() {
        return $this->fields['fechaInicio']['value'];
    }

    public function getFechaFin() {
        return $this->fields['fechaFin']['value'];
    }

    public function getEstado() {
        return $this->fields['estado']['value'];
    }

    public function getHits() {
        return $this->fields['hits']['value'];
    }

    public function getIdCFTipoBanner() {
        return $this->fields['idCFTipoBanner']['value'];
    }

}

?>