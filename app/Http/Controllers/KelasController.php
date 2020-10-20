<?php

namespace App\Http\Controllers;

class KelasController extends Controller
{
    public function index()
    {
        $postfields = "apikey=&signature=".env('SIGNATURE')."&query=SELECT * FROM m_kelas";

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
        $postfields = "apikey=&signature=8f1e9c88ec64c2a1819ff6e4c5774e34&query=SELECT * FROM m_kelas WHERE m_kelas.id_kelas = ".$id;

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
