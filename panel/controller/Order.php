<?php

ADOdb_Active_Record::SetDatabaseAdapter($db);
ADODB_Active_Record::ClassHasMany('Order', 'product_order', 'id_order');

class Order extends ADOdb_Active_Record {

    var $_table = 'orders';

    function getTotalOrder(){
    	$total = 0;
    	foreach ($this->product_order as $p) {
    		$total =+ ($p->amount * $p->unit_price) + $p->tax;
    	}
    	return $total+$this->shipping_cost;
    }

}

class Product_Order extends ADOdb_Active_Record {

    var $_table = 'product_order';

}

class catStatusOrder extends ADOdb_Active_Record {
	var $_table = 'cat_status_order';
}