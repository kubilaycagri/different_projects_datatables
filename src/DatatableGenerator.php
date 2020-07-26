<?php

namespace Kcy\DynamicDatatables;

class DatatableGenerator
{

    public function simpleTableGenerate($table_cols, $result_set)
    {
        //$return_data['table'] = "/kcy/datatable_get_data";

        $return_data['table_cols'] = $table_cols;
        $return_data['result_set'] = $result_set;
        return view('datatables::simpleDatatableList', $return_data + [$this]);
    }
}
