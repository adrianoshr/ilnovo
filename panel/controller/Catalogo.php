<?php

ADOdb_Active_Record::SetDatabaseAdapter($db);
ADODB_Active_Record::ClassBelongsTo('Catalogo', 'rel_paquetes_perfiles', 'id_perfil', 'idcf');

class IndiceCatalogo extends ADOdb_Active_Record {

    var $_table = 'indice_catalogos';

}

class Catalogo extends ADOdb_Active_Record {

    var $_table = 'cfservicio';

    function _constructor($_table) {
        $this->_table = $table;
    }

}

class PaqueteHasPerfil extends ADOdb_Active_Record {

    var $_table = 'rel_paquetes_perfiles';

}
