<?php

namespace App\Http\Controllers;

class MateriController extends Controller
{
    public function index($page = 1)
    {
        // nilai awal Offset dan Limit per Halaman
        $offset = 0;
        $row_count = 10;

        // hitung offset
        $offset = ( $page > 1 ) ? ($row_count * $page - $row_count) : $offset;

        // masukkan ke variabel limit
        $limit = "LIMIT ${row_count} OFFSET ${offset}";
        $postfields = "apikey=&signature=".env('SIGNATURE')."&query=SELECT * FROM m_materi ".$limit;

        // dd($postfields);
        // $postfields = "apikey=&signature=".env('SIGNATURE')."&query=SELECT * FROM m_materi LIMIT 0,20";

        // persiapkan curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://lms.pln-pusdiklat.co.id/liteapi/liteapi.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$postfields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close ($ch);

        // mengembalikan hasil curl
        return response($output)->header('Content-Type', 'application/json');;
    }

    public function show($id)
    {
        $postfields = "apikey=&signature=".env('SIGNATURE')."&query=SELECT * FROM m_materi WHERE m_materi.id_materi = ".$id;

        // persiapkan curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://lms.pln-pusdiklat.co.id/liteapi/liteapi.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$postfields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close ($ch);

        // mengembalikan hasil curl
        return json_decode($output, TRUE);
    }
}
