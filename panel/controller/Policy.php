<?php

ADOdb_Active_Record::SetDatabaseAdapter($db);
ADODB_Active_Record::ClassHasMany('Policy', 'sys_policiesgroup', 'id_group');

class Policy extends ADOdb_Active_Record {

    var $_table = 'sys_policies';

}

class PoliciesGroup extends ADOdb_Active_Record {

    var $_table = 'sys_policiesgroup';

}

?>