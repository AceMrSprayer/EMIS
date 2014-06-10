<?php
/**
 * Created by PhpStorm.
 * User: Neophema
 * Date: 5-6-14
 * Time: 15:29
 */


class functions {
    function callStoredProcedure($proc, $param1, $param2, $param3, $param4, $param5) {
        $paramList = $this->getProcParams($proc);

        $params = array();

        $tsql_callSP = "{call ".$proc."(";


        for($i = 0; $i < count($paramList); $i++) {
            array_push($params, array('$param'.$i, SQLSRV_PARAM_IN));
            $tsql_callSP = $tsql_callSP." ? ";

            if($i != count($paramList)) {
                $tsql_callSP = $tsql_callSP.",";
            }
        }

        $tsql_callSP = $tsql_callSP.")}";

        $result = $this->callSP($tsql_callSP, $params);

        return $result;
    }

    function getProcParams($param1) {

        $tsql_callSP = "{call procGetParameters( ? )}";

        $params = array(
            array($param1, SQLSRV_PARAM_IN)
        );

        $result = $this->callSP($tsql_callSP, $params);

        return $result;
    }

    function callSP($tsql_callSP, $params) {
        require("dbconnect.php");

        /* Execute the Query */
        $stmt3 = sqlsrv_query($conn, $tsql_callSP, $params);

        if( $stmt3 === false ) {
            echo "Error in executing statement 3.\n";
            die( print_r( sqlsrv_errors(), true));
        }

        $list = null;
        while ($obj=sqlsrv_fetch_object($stmt3)) {
            $list[] = $obj;
        }

        return $list;
    }
} 