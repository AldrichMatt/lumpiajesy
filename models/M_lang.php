<?php
defined('BASEPATH') OR exit('No direct script access allowed');   

class M_lang extends CI_Model {

    public function translate_ind($string)
    {
        $base = strtoupper($string);
        $data = [
            'MONDAY' => 'Senin',
            'TUESDAY' => 'Selasa',
            'WEDNESDAY' => 'Rabu',
            'THURSDAY' => 'Kamis',
            'FRIDAY' => 'Jumat',
            'SATURDAY' => 'Sabtu',
            'SUNDAY' => 'Minggu',
            'JANUARY' => 'Januari',
            'FEBRUARY' => 'Februari',
            'MARCH' => 'Maret',
            'APRIL' => 'April',
            'MAY' => 'Mei',
            'JUNE' => 'Juni',
            'JULY' => 'Juli',
            'AUGUST' => 'Agustus',
            'SEPTEMBER' => 'September',
            'OCTOBER' => 'Oktober',
            'NOVEMBER' => 'November',
            'DECEMBER' => 'Desember',
        ];
        
        return $data[$base];
    }
}   
