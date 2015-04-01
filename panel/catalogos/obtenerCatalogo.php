<?php 

require '../includes/main.php';
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
$table = $_REQUEST["table"];
$index = $_REQUEST["index"];
$nodo = $_REQUEST["nodo"];
$description = $_REQUEST["description"];
$query = "";
if(isset($_REQUEST["query"])){
	$query = $_REQUEST["query"];
}
//echo stripslashes($query);
$recs = $db->GetActiveRecords($table,stripslashes($query));
$result = array();
$result["query"] = $query;
foreach ($recs as $rec) {
	$elem = array();
	$elem["index"] = $rec->$index;
	$elem["description"] = $rec->$description;
	$elem["nodo"] = $rec->$nodo;
	$result["list"][] = $elem;
}

echo json_encode($result);

?>