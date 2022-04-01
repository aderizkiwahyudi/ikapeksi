<?php 

class Helpers {
    public static function hari($date = null) {
        $i = date('N', strtotime($date));
        $hari = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        return $hari[$i];
    }
    public static function tanggal($date = null){
        $bulan_indonesia = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $tgl = date('d', strtotime($date));
        $bulan = date('n', strtotime($date));
        $tahun = date('Y', strtotime($date));

        return $tgl . ' ' . $bulan_indonesia[$bulan] . ' ' . $tahun;
    }
}