<?php

class model_adminDashboard extends Model {

    function __construct()
    {
        parent::__construct();
    }

    function getChangePoemTime(){
        $sql = 'select * from tbl_option';
        $result = $this->doSelect($sql);
    }
}

?>