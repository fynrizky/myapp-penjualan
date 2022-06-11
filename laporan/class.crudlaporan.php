<?php require_once "../config/koneksi.php"; ?>
<?php 


class Cetak_Laporan{
    public function laporan_penjualan_bulan($koneksi,$bln1,$bln2){
        $qry = $koneksi->query("SELECT * FROM penjualan pen
            JOIN d_penjualan dpen ON pen.kode_penjualan = dpen.kode_penjualan
            JOIN tb_barang bar ON dpen.id_brg = bar.id_brg 
            WHERE pen.tgl_penjualan BETWEEN '$bln1' AND '$bln2'");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[]=$pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        }
        else{
            error_reporting(0);
        }
    }
    public function laporan_semua_penjualan($koneksi){
        $qry = $koneksi->query("SELECT * FROM penjualan pen
            JOIN d_penjualan dpen ON pen.kode_penjualan = dpen.kode_penjualan
            JOIN tb_barang bar ON dpen.id_brg = bar.id_brg ");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[]=$pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        }
        else{
            error_reporting(0);
        }
    }
    public function laporan_pembelian_bulan($koneksi,$bln1,$bln2){
        $qry = $koneksi->query("SELECT * FROM tb_supplier sup
            JOIN pembelian pem ON sup.id_supplier = pem.id_supplier
            JOIN d_pembelian dpem ON pem.kode_pembelian = dpem.kode_pembelian
            JOIN barang_pembelian barpem ON dpem.id_barang_pembelian = barpem.id_barang_pembelian 
            WHERE pem.tgl_pembelian BETWEEN '$bln1' AND '$bln2'");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[]=$pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        }
        else{
            error_reporting(0);
        }
    }public function laporan_semua_pembelian($koneksi){
        $qry = $koneksi->query("SELECT * FROM tb_supplier sup
            JOIN pembelian pem ON sup.id_supplier = pem.id_supplier
            JOIN d_pembelian dpem ON pem.kode_pembelian = dpem.kode_pembelian
            JOIN barang_pembelian barpem ON dpem.id_barang_pembelian = barpem.id_barang_pembelian");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[]=$pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        }
        else{
            error_reporting(0);
        }
    }public function laporan_data_stok_history($koneksi){
        //$qry = $koneksi->query("SELECT * FROM data_stok INNER JOIN tb_barang ON data_stok.id_brg = tb_barang.id_brg ORDER BY tb_barang.kode_barang ASC");
        $qry = $koneksi->query("SELECT * FROM history_stok INNER JOIN data_stok ON history_stok.id_brg_stok = data_stok.id_brg_stok INNER JOIN tb_barang ON data_stok.id_brg = tb_barang.id_brg ORDER BY history_stok.tanggal_perubahan ASC");
        
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[]=$pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        }
        else{
            error_reporting(0);
        }
    }
}
class Perusahaan{
    public function tampil_perusahaan($koneksi){
        $qry = $koneksi->query("SELECT * FROM perusahaan WHERE id_perusahaan = '1'");
        $pecah = mysqli_fetch_assoc($qry);
        return $pecah;
    }
    public function simpan_perusahaan($koneksi,$nama,$alamat,$pemilik,$kota){
        $koneksi->query("UPDATE perusahaan SET nama_perusahaan='$nama',pemilik='$pemilik',alamat='$alamat' WHERE id_perusahaan ='1' ");
    }
}

?>