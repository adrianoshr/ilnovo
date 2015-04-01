<?php

ADOdb_Active_Record::SetDatabaseAdapter($db);

class Modulo extends ADOdb_Active_Record {

    var $_table = 'sys_modulos';

}

class SuperModulo extends ADOdb_Active_Record {

    var $_table = 'sys_supermodulos';

}

class ModuloHasPerfiles extends ADOdb_Active_Record {

    var $_table = 'sys_modulo_has_perfiles';

}
