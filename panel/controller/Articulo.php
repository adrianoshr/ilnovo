<?php

ADOdb_Active_Record::SetDatabaseAdapter($db);
ADODB_Active_Record::ClassHasMany('Article', 'imagenes_has_articulos', 'id_articulo');
ADODB_Active_Record::ClassHasMany('Article', 'articulos_has_secciones', 'id_articulo');

class Article extends ADOdb_Active_Record {

    var $_table = 'articles';

}

class ImagesHasArticles extends ADOdb_Active_Record {

    var $_table = 'imagenes_has_articulos';

}

class ArticlesHasSections extends ADOdb_Active_Record {

    var $_table = 'articulos_has_secciones';

}

?>