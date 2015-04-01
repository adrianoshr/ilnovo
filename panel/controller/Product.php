<?php

ADOdb_Active_Record::SetDatabaseAdapter($db);
ADODB_Active_Record::ClassHasMany('Product', 'image_product', 'id_product');
ADODB_Active_Record::ClassHasMany('Product', 'cfcategories_products', 'idcf');
ADODB_Active_Record::ClassHasMany('Product', 'prices', 'id_product');

class Product extends ADOdb_Active_Record {

    var $_table = 'products';

}

class ImageProduct extends ADOdb_Active_Record {

    var $_table = 'image_product';

}

class cfCategoriesProducts extends ADOdb_Active_Record {

    var $_table = 'cfcategories_products';

}

class cfTaxt extends ADOdb_Active_Record {

    var $_table = 'cftaxs';

}

class Price extends ADOdb_Active_Record {

    var $_table = 'prices';

}
