<?php

function rs2json($rs, $moveFirst = false) {
    if (!$rs) {
        printf(ADODB_BAD_RS, 'rs2json');
        return false;
    }

    $output = '';
    $rowOutput = '';

    $output .= '{"rows":';
    $totalRows = $rs->numrows();

    if ($totalRows > 0) {
        $output .= '[';
        $rowCounter = 1;
        while ($row = $rs->fetchRow()) {
            $rowOutput .= '{"row":{';
            $cols = count($row);
            $colCounter = 1;

            foreach ($row as $key => $val) {
                $rowOutput .= '"' . $key . '":';
                $rowOutput .= '"' . $val . '"';

                if ($colCounter != $cols) {
                    $rowOutput .= ',';
                }
                $colCounter++;
            }

            $rowOutput .= '}}';

            if ($rowCounter != $totalRows) {
                $rowOutput .= ',';
            }
            $rowCounter++;
        }
        $output .= $rowOutput . ']';
    } else {
        $output .= '"row"';
    }

    $output .= '}';

    if ($moveFirst) {
        $rs->MoveFirst();
    }
    return $output;
}
