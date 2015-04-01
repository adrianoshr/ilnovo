<?php

ADOdb_Active_Record::SetDatabaseAdapter($db);
ADODB_Active_Record::ClassHasMany('Galeria', 'scd_galeria_has_imagenes', 'id_galeria');

class Galeria extends ADOdb_Active_Record {

    var $_table = 'scd_galerias';

}

class GaleriaHasImagenes extends ADOdb_Active_Record {

    var $_table = 'scd_galeria_has_imagenes';

}
