<?php

use App\Models\District;
use App\Models\Upazila;

if (!function_exists('dis_id_to_name')) {
    function dis_id_to_name($id)
    {
        $dis=  District::findOrFail($id);
        return $dis->name;
    }
}

if (!function_exists('upa_id_to_name')) {
    function upa_id_to_name($id)
    {
        $upa= Upazila::findOrFail($id);
        return $upa->name;
    }
}