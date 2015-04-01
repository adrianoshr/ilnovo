<?php

// +----------------------------------------------------------------------+
// | PHP version 5                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 2012-2014 TecDev                            |
// +----------------------------------------------------------------------+
// | Authors: Marcos Velazquez <marcosvelazquez@me.com>                   |
// |          <mvelazquezbarocio@gmail.com>                               |
// +----------------------------------------------------------------------+
// | Clase: <_Articulos >                                                 |
// | Paquete:                                                             |
// | Metodos:                                                             |
// |     recupera_Articulos():bolean                                      |
// |     guarda_Articulos():bolean                                        |
// |     modifica_Articulos():bollean                                     |
// +----------------------------------------------------------------------+
//
class Articulo {

    private $table;
    private $fields = array();
    public $db;
    public $arSecciones = array();
    public $arCategorias = array();
    public $arImagenes = array();
    public $arTags = array();

    private function Mapping() {
        $this->table = 'scd_Articulos';
        $this->fields['idArticulo'] = Array('table' => 'idArticulo', 'flags' => 'not_null primary_key auto_increment', 'type' => 'int', 'len' => '11', 'change' => false, 'iskey' => 1);
        $this->fields['titulo'] = Array('table' => 'titulo', 'flags' => 'not_null binary', 'type' => 'string', 'len' => '255', 'change' => false, 'iskey' => 0);
        $this->fields['contenido'] = Array('table' => 'contenido', 'flags' => 'not_null blob binary', 'type' => 'blob', 'len' => '65535', 'change' => false, 'iskey' => 0);
        $this->fields['fuente'] = Array('table' => 'fuente', 'flags' => 'not_null binary', 'type' => 'string', 'len' => '45', 'change' => false, 'iskey' => 0);
        $this->fields['fechaAlta'] = Array('table' => 'fechaAlta', 'flags' => 'not_null binary', 'type' => 'date', 'len' => '10', 'change' => false, 'iskey' => 0);
        $this->fields['autor'] = Array('table' => 'autor', 'flags' => 'not_null binary', 'type' => 'string', 'len' => '45', 'change' => false, 'iskey' => 0);
        $this->fields['estado'] = Array('table' => 'estado', 'flags' => 'not_null', 'type' => 'int', 'len' => '4', 'change' => false, 'iskey' => 0);
        $this->fields['metaDescripcion'] = Array('table' => 'metaDescripcion', 'flags' => 'not_null binary', 'type' => 'string', 'len' => '160', 'change' => false, 'iskey' => 0);
        $this->fields['metaKeywords'] = Array('table' => 'metaKeywords', 'flags' => 'not_null binary', 'type' => 'string', 'len' => '160', 'change' => false, 'iskey' => 0);
        $this->fields['h1'] = Array('table' => 'h1', 'flags' => 'not_null', 'type' => 'string', 'len' => '255', 'change' => false, 'iskey' => 0);
        $this->fields['h2'] = Array('table' => 'h2', 'flags' => 'not_null binary', 'type' => 'string', 'len' => '255', 'change' => false, 'iskey' => 0);
        $this->fields['idUsuarioRegistra'] = Array('table' => 'idUsuarioRegistra', 'flags' => 'not_null multiple_key', 'type' => 'int', 'len' => '11', 'change' => false, 'iskey' => 0);
        $this->fields['pageAuthor'] = Array('table' => 'pageAuthor', 'flags' => 'not_null', 'type' => 'string', 'len' => '255', 'change' => false, 'iskey' => 0);
        $this->fields['fechaEdicion'] = Array('table' => 'fechaEdicion', 'flags' => 'not_null binary', 'type' => 'date', 'len' => '10', 'change' => false, 'iskey' => 0);
    }

    function Articulo($db) {
        $this->Mapping();
        $this->db = $db;
    }

    public function modificaArticulo() {
        $arQuery = array();
        $arWhere = array();
        foreach ($this->fields as $key => $value) {
            if (strpos($this->fields[$key][flags], 'primary_key auto_increment')) {
                if ($this->fields[$key][type] == 'int') {
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

    public function guardaArticulo() {
        $qrGuarda = null;
        foreach ($this->fields as $key => $value) {
            if (!is_numeric($key)) {
                if (!strpos($this->fields[$key][flags], 'primary_key auto_increment')) {
                    $arWhere[] = $this->fields[$key]['table'];
                    if ('int' == $this->fields[$key][type]) {
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
            $this->setIdArticulo($llave);
            return true;
        }
    }

    public function recuperaArticulo() {
        $primary = $this->getIdArticulo();
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
            $select = 'SELECT ' . $sel . ' FROM ' . $this->table . " WHERE  idArticulo=$primary";
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
                $qrSecciones = 'SELECT DISTINCT idCFSeccion FROM scd_Articulos_has_Secciones '
                        . " WHERE idArticulo='$primary'";
                $rsSecciones = $this->db->CacheExecute($qrSecciones) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
                if (!$rsSecciones->EOF) {
                    while (list($idCFSeccion) = $rsSecciones->FetchRow()) {
                        $this->arSecciones[] = $idCFSeccion;
                    }
                }
                $qrCategorias = 'SELECT DISTINCT idCFCategoria FROM scd_Articulos_has_Categorias '
                        . " WHERE idArticulo='$primary'";
                $rsCategorias = $this->db->CacheExecute($qrCategorias) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
                if (!$rsCategorias->EOF) {
                    while (list($idCFCategoria) = $rsCategorias->FetchRow()) {
                        $this->arCategorias[] = $idCFCategoria;
                    }
                }
                $qrCategorias = 'SELECT DISTINCT idImagen,path,tituloImagen FROM `scd_Imagenes_has_Articulos` '
                        . " WHERE idArticulo='$primary'";
                $rsCategorias = $this->db->CacheExecute($qrCategorias) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
                if (!$rsCategorias->EOF) {
                    while (list($idImagen, $path, $tituloImagen) = $rsCategorias->FetchRow()) {
                        $this->arImagenes[][$path] = $tituloImagen;
                    }
                }
                $qrTags = 'SELECT DISTINCT idCFTag FROM scd_Articulos_has_Tags '
                        . " WHERE idArticulo='$primary'";
                $rsCategorias = $this->db->CacheExecute($qrTags) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
                if (!$rsCategorias->EOF) {
                    while (list($idCFCategoria) = $rsCategorias->FetchRow()) {
                        $this->arTags[] = $idCFCategoria;
                    }
                }
                return true;
            }
        }
    }

    public function ArticulosPorSeccion($idCFSeccion = 0) {

        $select = 'SELECT DISTINCT ' . $this->table . '.idArticulo,titulo,contenido,fuente,fechaAlta,autor,path,'
                . 'tituloImagen,nombreNodo,caracteristica'
                . ' FROM ' . $this->table . ' INNER JOIN scd_Articulos_has_Secciones '
                . ' ON scd_Articulos_has_Secciones.idArticulo=' . $this->table . '.idArticulo '
                . ' LEFT JOIN scd_Imagenes_has_Articulos ON scd_Imagenes_has_Articulos.idArticulo=' . $this->table . '.idArticulo '
                . ' LEFT JOIN scd_cfsecciones ON scd_cfsecciones.idCF=idCFSeccion '
                . ' WHERE scd_Articulos.estado=1 AND scd_cfsecciones.status=1 ';
        if (!empty($idCFSeccion)) {
            $select.=" AND idCFSeccion='$idCFSeccion' ";
        }
        $select.=' GROUP BY idArticulo ORDER BY fechaAlta DESC ';
        $rs = $this->db->CacheExecute(300, $select) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
        if (!$rs->EOF) {
            return $rs;
        } else {
            return false;
        }
    }

    public function ArticulosPorCalif($idCFSeccion = 0) {

        $select = 'SELECT DISTINCT ' . $this->table . '.idArticulo,titulo,contenido,fuente,fechaAlta,autor,path,'
                . 'tituloImagen,nombreNodo,caracteristica'
                . ' FROM ' . $this->table . ' INNER JOIN scd_Articulos_has_Secciones '
                . ' ON scd_Articulos_has_Secciones.idArticulo=' . $this->table . '.idArticulo '
                . ' LEFT JOIN scd_Imagenes_has_Articulos ON scd_Imagenes_has_Articulos.idArticulo=' . $this->table . '.idArticulo '
                . ' LEFT JOIN scd_cfsecciones ON scd_cfsecciones.idCF=idCFSeccion '
                . ' WHERE scd_cfsecciones.status=1 ';
        if (!empty($idCFSeccion)) {
            $select.=" AND idCFSeccion='$idCFSeccion' ";
        }
        $select.='GROUP BY ' . $this->table . '.idArticulo ORDER BY fechaAlta DESC';
        $rs = $this->db->CacheExecute(300, $select) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
        if (!$rs->EOF) {
            return $rs;
        } else {
            return false;
        }
    }

    public function ArticulosPorTag($idCFTag = 0) {

        $select = 'SELECT DISTINCT ' . $this->table . '.idArticulo,titulo,contenido,fuente,fechaAlta,autor,path,'
                . 'tituloImagen,nombreNodo,caracteristica'
                . ' FROM ' . $this->table . ' INNER JOIN scd_Articulos_has_Tags '
                . ' ON scd_Articulos_has_Tags.idArticulo=' . $this->table . '.idArticulo '
                . ' LEFT JOIN scd_Imagenes_has_Articulos ON scd_Imagenes_has_Articulos.idArticulo=' . $this->table . '.idArticulo '
                . ' LEFT JOIN scd_cftags ON scd_cftags.idCF=idCFTag '
                . ' WHERE scd_cftags.status=1 ';
        if (!empty($idCFTag)) {
            $select.=" AND idCFTag='$idCFTag' ";
        }
        $select.='ORDER BY fechaAlta DESC ';
        $rs = $this->db->CacheExecute(300, $select) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
        if (!$rs->EOF) {
            return $rs;
        } else {
            return false;
        }
    }

    public function eliminaArticulo() {
        $idArticulo = $this->getIdArticulo();
        if (!empty($idArticulo)) {
            $select = 'DELETE  FROM ' . $this->table . " WHERE  idArticulo='$idArticulo'";
            $rs = $this->db->Execute($select) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
            if ($rs->EOF) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function setIdArticulo($value) {
        $value = intval($value);
        $this->fields['idArticulo']['value'] = $value;
        $this->fields['idArticulo']['change'] = true;
    }

    public function setTitulo($value) {
        $value = trim($value);
        $this->fields['titulo']['value'] = $value;
        $this->fields['titulo']['change'] = true;
    }

    public function setContenido($value) {
        $this->fields['contenido']['value'] = addslashes($value);
        $this->fields['contenido']['change'] = true;
    }

    public function setFuente($value) {
        $value = trim($value);
        $this->fields['fuente']['value'] = $value;
        $this->fields['fuente']['change'] = true;
    }

    public function setFechaAlta($value) {
        $this->fields['fechaAlta']['value'] = $value;
        $this->fields['fechaAlta']['change'] = true;
    }

    public function setFechaEdicion($value) {
        $this->fields['fechaEdicion']['value'] = $value;
        $this->fields['fechaEdicion']['change'] = true;
    }

    public function setAutor($value) {
        $value = trim($value);
        $this->fields['autor']['value'] = $value;
        $this->fields['autor']['change'] = true;
    }

    public function setEstado($value) {
        $value = intval($value);
        $this->fields['estado']['value'] = $value;
        $this->fields['estado']['change'] = true;
    }

    public function setMetaDescripcion($value) {
        $value = trim($value);
        $this->fields['metaDescripcion']['value'] = $value;
        $this->fields['metaDescripcion']['change'] = true;
    }

    public function setMetaKeywords($value) {
        $value = trim($value);
        $this->fields['metaKeywords']['value'] = $value;
        $this->fields['metaKeywords']['change'] = true;
    }

    public function setH1($value) {
        $value = intval($value);
        $this->fields['h1']['value'] = $value;
        $this->fields['h1']['change'] = true;
    }

    public function setH2($value) {
        $value = trim($value);
        $this->fields['h2']['value'] = $value;
        $this->fields['h2']['change'] = true;
    }

    public function setIdUsuarioRegistra($value) {
        $value = intval($value);
        $this->fields['idUsuarioRegistra']['value'] = $value;
        $this->fields['idUsuarioRegistra']['change'] = true;
    }

    public function setPageAuthor($value) {
        $value = trim($value);
        $this->fields['pageAuthor']['value'] = $value;
        $this->fields['pageAuthor']['change'] = true;
    }

    public function getIdArticulo() {
        return $this->fields['idArticulo']['value'];
    }

    public function getTitulo() {
        return $this->fields['titulo']['value'];
    }

    public function getContenido() {
        return stripslashes($this->fields['contenido']['value']);
    }

    public function getFuente() {
        return $this->fields['fuente']['value'];
    }

    public function getFechaAlta() {
        return $this->fields['fechaAlta']['value'];
    }

    public function getFechaEdicion() {
        return $this->fields['fechaEdicion']['value'];
    }

    public function getAutor() {
        return $this->fields['autor']['value'];
    }

    public function getEstado() {
        return $this->fields['estado']['value'];
    }

    public function getMetaDescripcion() {
        return $this->fields['metaDescripcion']['value'];
    }

    public function getMetaKeywords() {
        return $this->fields['metaKeywords']['value'];
    }

    public function getH1() {
        return $this->fields['h1']['value'];
    }

    public function getH2() {
        return $this->fields['h2']['value'];
    }

    public function getIdUsuarioRegistra() {
        return $this->fields['idUsuarioRegistra']['value'];
    }

    public function getPageAuthor() {
        return $this->fields['pageAuthor']['value'];
    }

}

?>
