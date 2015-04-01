<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Newsletter
 *
 * @author marcos
 */
ADOdb_Active_Record::SetDatabaseAdapter($db);

class Newsletter extends ADOdb_Active_Record {

    var $_table = 'newsletters';

}
