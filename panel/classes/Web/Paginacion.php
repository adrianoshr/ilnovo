<?php

// +----------------------------------------------------------------------+
// | PHP version 5                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2014 TecDev                                      |
// +----------------------------------------------------------------------+
// | Authors: Marcos Velzquez <<mvelazquez@teraloc.com>                         |
// +----------------------------------------------------------------------+
// | Clase: Paginacion                                                    |
// | Mtodos:                                                             |
// |     Paginacion(db:objetoDB, query:String[, maxResults]):void         |
// |     setParameters(parameters:String):void                            |
// |     setPage(page:int):void                                           |
// |     queryLimits():ResultObject                                       |
// |     linkFirst(html:String):String                                    |
// |     linkPrev(html:String):String                                     |
// |     linkNext(html:String):String                                     |
// |     linkLast(html:String):String                                     |
// |     links(separador:String[, boundary:int]):String                   |
// +----------------------------------------------------------------------+
//
// $Id: Paginacion.php,v 1.1 2006/09/12 19:14:12 Administrador Exp $
//clase

class Paginacion {

    var $db;
    var $query;
    var $maxResults;
    var $totalPages;
    var $page = 1;
    var $parameters;
    var $totalResults = 0;
    var $url = '';

    public function Paginacion($db, $query, $maxResults = 25) {
        $this->db = $db;
        $this->query = $query;
        $resultSet = $this->db->CacheExecute(190, $query) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
        $totalResults = $resultSet->RecordCount();
        $this->totalResults = $totalResults;
        if (0 != $maxResults) {
            $this->maxResults = $maxResults;
        } else {
            $this->maxResults = $totalResults;
        }
        if (0 == $this->maxResults) {
            $this->totalPages = 1;
        } else {
            $this->totalPages = ceil($totalResults / $this->maxResults);
        }
    }

    public function setParameters($parameters) {
        $this->parameters = $parameters . '&';
    }

    public function setPage($page) {
        $this->page = $page;
    }

    public function queryLimits() {
        $from = (($this->page * $this->maxResults) - $this->maxResults);
        $max = $this->maxResults;
        $limitString = " limit $from, " . $max;
        $resultSet = $this->db->Execute($this->query . $limitString) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
        if ($resultSet->EOF) {
            return null;
        } else {
            return $resultSet;
        }
    }

    public function linkFirst($html) {
        if (empty($html))
            trigger_error('linkFirst necesita un argumento', E_USER_ERROR);
        $link = "<a  onclick=\"busca('" . $this->parameters . 'page=1' . "')\">" . $html . '</a>';
        return $link;
    }

    public function linkPrev($html) {
        if (empty($html))
            trigger_error('linkPrev Necesita un Argumento', E_USER_ERROR);
        if (1 < $this->page) {
            $prev = ($this->page - 1);
            $link = "<a  onclick=\"busca('" . $this->parameters . 'page=' . "$prev')\">" . $html . '</a>';
            return $link;
        } else {
            return '&nbsp;';
        }
    }

    public function linkLast($html) {
        if (empty($html)) {
            trigger_error('linkLast necesita un argumento', E_USER_ERROR);
        }
        $link = "<a  onclick=\"busca('" . $this->parameters . 'page=' . $this->totalPages . "')\">" . $html . '</a>';
        return $link;
    }

    public function linkNext($html) {
        if (empty($html)) {
            trigger_error('linkNext Necesita un Argumento', E_USER_ERROR);
        }
        if ($this->page < $this->totalPages) {
            $next = ($this->page + 1);
            $link = "<a  onclick=\"busca('" . $this->parameters . 'page=' . $next . "')\">" . $html . '</a>';
            return $link;
        } else {
            return '&nbsp;';
        }
    }

    public function links($separador, $boundary = 5) {
        if (empty($separador)) {
            trigger_error('links Necesita un Argumento', E_USER_ERROR);
        }
        $bottomLimit = $this->page - $boundary;
        if (1 > $bottomLimit) {
            $bottomLimit = 1;
        }
        $upperLimit = $this->page + $boundary;
        if ($upperLimit > $this->totalPages) {
            $upperLimit = $this->totalPages;
        }
        if (1 != $bottomLimit) {
            $htmlLinks = '<li><a>...</a></li> ';
        }
        for ($i = $bottomLimit; $i <= $upperLimit; $i++) {
            if (($this->page) == $i) {
                if (empty($htmlLinks)) {
                    $htmlLinks .= '<li class="active"><a href="#">' . $i . '</a></li>';
                } else {
                    $htmlLinks .= $separador . '<li class="active"><a href="#">' . $i . '</a></li>';
                }
            } else {
                $htmlLinks.="<li ><a onclick=\"busca('" . $this->parameters . 'page=' . $i . "')\" >" . $i . '</a></li> ';
            }
        }
        if ($upperLimit != $this->totalPages) {
            $htmlLinks .= ' ...';
        }
        return $htmlLinks;
    }

}

?>