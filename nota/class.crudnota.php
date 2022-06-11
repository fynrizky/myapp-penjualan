<?php require_once "../config/koneksi.php"; ?>
<?php 

class Nota{
    public function tampil_nota_pembelian($koneksi,$kd){
        $qry = $koneksi->query("SELECT * FROM tb_supplier sup 
            JOIN pembelian pem ON pem.id_supplier = sup.id_supplier
            JOIN tb_users adm ON adm.id_users = pem.id_users
            JOIN d_pembelian dpem ON pem.kode_pembelian = dpem.kode_pembelian
            JOIN barang_pembelian bpem ON dpem.id_barang_pembelian = bpem.id_barang_pembelian
            WHERE pem.kode_pembelian = '$kd'");
        
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[]=$pecah;
        }
        $hitung = mysqli_num_rows($qry);
        if ($hitung > 0) {
            return $data;
        }
        else{
            error_reporting(0);
        }	
    }
    public function ambil_nota_pembelian($koneksi,$kd){
        $qry = $koneksi->query("SELECT * FROM tb_supplier sup 
            JOIN pembelian pem ON pem.id_supplier = sup.id_supplier
            JOIN tb_users adm ON adm.id_users = pem.id_users
            JOIN d_pembelian dpem ON pem.kode_pembelian = dpem.kode_pembelian
            JOIN barang_pembelian bpem ON dpem.kode_pembelian = bpem.kode_pembelian
            WHERE pem.kode_pembelian = '$kd'");
        $pecah = mysqli_fetch_assoc($qry);
        return $pecah;
    }
    public function tampil_nota_penjualan($koneksi,$kd){
        $qry = $koneksi->query("SELECT * FROM penjualan pen
            JOIN tb_users adm ON adm.id_users = pen.id_users
            JOIN d_penjualan dpen ON pen.kode_penjualan = dpen.kode_penjualan
            JOIN data_stok bar ON dpen.id_brg = bar.id_brg 
            JOIN tb_barang tbbar ON bar.id_brg = tbbar.id_brg
            WHERE pen.kode_penjualan = '$kd'");
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
    public function ambil_nota_penjualan($koneksi,$kd){
        $qry = $koneksi->query("SELECT * FROM penjualan pen
        JOIN tb_pelanggan pl ON pen.id_pelanggan = pl.id_pelanggan
        JOIN tb_users adm ON adm.id_users = pen.id_users
        JOIN d_penjualan dpen ON pen.kode_penjualan = dpen.kode_penjualan
        JOIN data_stok bar ON dpen.id_brg = bar.id_brg
        WHERE pen.kode_penjualan = '$kd'");
        $pecah = mysqli_fetch_assoc($qry);
        return $pecah;
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