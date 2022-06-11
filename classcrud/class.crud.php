<?php require_once "config/koneksi.php"; ?>
<?php

//class users
class Users
{
    // User
    public function tampiluser($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM tb_users ORDER BY id_users");
        return $qry;

        while ($pecah = $qry->fetch_assoc()) {
            $data[] = $pecah;
        }
        return $data;
    }
    public function hapus_user($koneksi, $id)
    {
        $koneksi->query("DELETE FROM tb_users WHERE id_users = '$id'");
    }
    public function simpan_user($koneksi, $username, $namauser, $password, $level, $image)
    {
        $koneksi->query("INSERT INTO tb_users(username,nama_user,password,level,image) 
				VALUES('$username','$namauser','$password','$level','$image')");
    }
    public function ubah_user($koneksi, $id, $username, $namauser, $password, $image)
    {
        $koneksi->query("UPDATE tb_users SET username='$username', nama_user='$namauser', password='$password', image='$image' WHERE id_users = '$id' ");
    }
    public function ambil_user($koneksi, $id)
    {
        $qry = $koneksi->query("SELECT * FROM tb_users WHERE id_users = '$id'");
        $pecah = $qry->fetch_assoc();

        return $pecah;
    }
}

//class barang
class Barang
{


    // Barang
    public function tampilbrg($koneksi)
    {

        $qry = $koneksi->query("SELECT * FROM tb_barang ORDER BY tb_barang.id_brg");
        return $qry;

        while ($pecah = $qry->fetch_assoc()) {
            $data[] = $pecah;
        }
        return $data;
    }

    public function hapus($koneksi, $id)
    {
        $koneksi->query("DELETE FROM tb_barang WHERE id_brg = '$id'");
    }
    public function simpan_barang($koneksi, $kodebrg, $namabrg, $satuan, $hargajual, $hargabeli)
    {
        $koneksi->query("INSERT INTO tb_barang(kode_barang,nama_barang,satuan,harga_jual,harga_beli) 
				VALUES('$kodebrg','$namabrg','$satuan','$hargajual','$hargabeli')");
    }
    public function ubah_barang($koneksi, $namabarang, $satuan, $hargajual, $hargabeli, $id)
    {
        $koneksi->query("UPDATE tb_barang SET nama_barang='$namabarang', satuan='$satuan', harga_jual='$hargajual', harga_beli='$hargabeli' WHERE id_brg = '$id' ");
    }
    public function ambil_barang($koneksi, $id)
    {
        $qry = $koneksi->query("SELECT * FROM tb_barang WHERE id_brg = '$id'");
        $pecah = $qry->fetch_assoc();

        return $pecah;
    }
}

class Supplier
{
    public function tampilsupp($koneksi)
    {

        $qry = $koneksi->query("SELECT * FROM tb_supplier ORDER BY id_supplier");
        return $qry;

        while ($pecah = $qry->fetch_assoc()) {
            $data[] = $pecah;
        }
        return $data;
    }
    public function hapus_supp($koneksi, $id)
    {
        $koneksi->query("DELETE FROM tb_supplier WHERE id_supplier = '$id'");
    }
    public function simpan_supp($koneksi, $namasupplier, $alamatsupplier, $notelpsup)
    {
        $koneksi->query("INSERT INTO tb_supplier(nama_supplier,alamat_supplier,no_telp) 
				VALUES('$namasupplier','$alamatsupplier','$notelpsup')");
    }
    public function ubah_supp($koneksi, $namasupplier, $alamatsupplier, $notelpsup, $id)
    {
        $koneksi->query("UPDATE tb_supplier SET nama_supplier='$namasupplier', alamat_supplier='$alamatsupplier', no_telp='$notelpsup'  WHERE id_supplier = '$id' ");
    }
    public function ambil_supp($koneksi, $id)
    {
        $qry = $koneksi->query("SELECT * FROM tb_supplier WHERE id_supplier = '$id'");
        $pecah = $qry->fetch_assoc();

        return $pecah;
    }
}

class Pelanggan
{
    public function tampil_pelanggan($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM tb_pelanggan ORDER BY id_pelanggan");
        return $qry;

        while ($pecah = $qry->fetch_assoc()) {
            $data[] = $pecah;
        }
        return $data;
    }
    public function hapus_pelanggan($koneksi, $id)
    {
        $koneksi->query("DELETE FROM tb_pelanggan WHERE id_pelanggan = '$id'");
    }
    public function simpan_pelanggan($koneksi, $namapelanggan, $notelp, $alamatpelanggan)
    {
        $koneksi->query("INSERT INTO tb_pelanggan(nama_pelanggan,notelp,alamat_pelanggan) 
				VALUES('$namapelanggan','$notelp','$alamatpelanggan')");
    }
    public function ubah_pelanggan($koneksi, $namapelanggan, $notelp, $alamatpelanggan, $id)
    {
        $koneksi->query("UPDATE tb_pelanggan SET nama_pelanggan='$namapelanggan', notelp='$notelp', alamat_pelanggan='$alamatpelanggan' WHERE id_pelanggan = '$id'");
    }
    public function ambil_pelanggan($koneksi, $id)
    {
        $qry = $koneksi->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id'");
        $pecah = $qry->fetch_assoc();

        return $pecah;
    }
}

class Pembelian
{
    public function kode_otomatis($koneksi)
    {
        $qry = $koneksi->query("SELECT MAX(kode_pembelian) AS kode FROM pembelian");
        $pecah = mysqli_fetch_array($qry);
        $kode = substr($pecah['kode'], 3, 5);
        $jum = $kode + 1;
        if ($jum < 10) {
            $id = "PEM0000" . $jum;
        } else if ($jum >= 10 && $jum < 100) {
            $id = "PEM000" . $jum;
        } else if ($jum >= 100 && $jum < 1000) {
            $id = "PEM00" . $jum;
        } else {
            $id = "PEM0" . $jum;
        }
        return $id;
    }
    public function tampil_pembelian($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM pembelian p INNER JOIN tb_supplier s ON p.id_supplier=s.id_supplier ORDER BY p.kode_pembelian DESC");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[] = $pecah;
        }
        $cek = $qry->num_rows;
        if ($cek > 0) {
            return $data;
        } else {
            error_reporting(0);
        }
    }
    public function hitung_item_pembelian($koneksi, $kodepembelian)
    {
        $qry = $koneksi->query("SELECT count(*) as jumlah FROM d_pembelian WHERE kode_pembelian = '$kodepembelian'");
        $pecah = mysqli_fetch_array($qry);

        return $pecah;
    }
    //sementara
    public function tambah_barang_sementara($koneksi, $kode, $nama, $satuan, $hargab, $item)
    {
        $tot = $item * $hargab;
        $koneksi->query("INSERT INTO barangp_sementara(kode_pembelian,nama_barangp,satuan,harga_barangp,item,total) 
            VALUES('$kode','$nama','$satuan','$hargab','$item','$tot')");
    }
    public function tampil_barang_sementara($koneksi, $kode)
    {
        $qry = $koneksi->query("SELECT * FROM barangp_sementara WHERE kode_pembelian = '$kode'");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        } else {
            error_reporting(0);
        }
    }
    public function hitung_total_sementara($koneksi, $kode)
    {
        $qry = $koneksi->query("SELECT sum(total) as jumlah FROM barangp_sementara WHERE kode_pembelian = '$kode'");
        $pecah = mysqli_fetch_array($qry);
        $cek = $this->cek_data_barangp($koneksi, $kode);
        if ($cek === true) {
            $subtotal = $pecah['jumlah'];
        } else {
            $subtotal = 0;
        }
        return $subtotal;
    }
    public function hapus_barang_sementara($koneksi, $hapus)
    {
        $koneksi->query("DELETE FROM barangp_sementara WHERE id_barangp ='$hapus'");
    }
    public function cek_data_barangp($koneksi, $kode)
    {
        $qry = $koneksi->query("SELECT * FROM barangp_sementara WHERE kode_pembelian = '$kode'");
        $hitung = $qry->num_rows;
        if ($hitung >= 1) {
            return true;
        } else {
            return false;
        }
    }
    //end sementara
    public function simpan_pembelian($koneksi, $kodepembelian, $tglpembelian, $supplier, $totalpem)
    {
        //insert pembelian
        $id_users = $_SESSION['adm']['id_users'];
        $koneksi->query("INSERT INTO pembelian(kode_pembelian,tgl_pembelian,id_users,id_supplier,total_pembelian) 
            VALUES('$kodepembelian','$tglpembelian','$id_users','$supplier','$totalpem')");
        //insert data barang
        $koneksi->query("INSERT INTO barang_pembelian(kode_pembelian,nama_barang_beli,satuan,harga_beli,item,total) 
            SELECT kode_pembelian,nama_barangp,satuan,harga_barangp,item,total FROM barangp_sementara");
        //insert detail pembelian
        $koneksi->query("INSERT INTO d_pembelian(kode_pembelian,id_barang_pembelian,jumlah,subtotal) 
            SELECT kode_pembelian,id_barang_pembelian,item,total FROM barang_pembelian WHERE kode_pembelian='$kodepembelian'");
        //hapus data barang pembelian sementara
        $koneksi->query("DELETE FROM barangp_sementara WHERE kode_pembelian='$kodepembelian'");
    }
    public function tampil_barang_pembelian($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM barang_pembelian WHERE status = '0'");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        } else {
            error_reporting(0);
        }
    }
    public function ambil_kdpem($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM pembelian ORDER BY kode_pembelian DESC LIMIT 1");
        $pecah = mysqli_fetch_array($qry);
        return $pecah;
    }
    public function cek_hapuspembelian($koneksi, $kd)
    {
        $qry = $koneksi->query("SELECT * FROM barang_pembelian WHERE kode_pembelian = '$kd' AND status = '0'");
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return false;
        } else {
            return true;
        }
    }
    public function hitung_jumlah_pembelian($koneksi, $kd)
    {
        $qry = $koneksi->query("SELECT SUM(subtotal) as total FROM d_pembelian WHERE kode_pembelian = '$kd'");
        $pecah = mysqli_fetch_assoc($qry);
        return $pecah['total'];
    }
    public function hapus_pembelian($koneksi, $kodepembelian)
    {
        $koneksi->query("DELETE FROM pembelian WHERE kode_pembelian='$kodepembelian'");
        $koneksi->query("DELETE FROM barang_pembelian WHERE kode_pembelian = '$kodepembelian' AND status = '0'");
    }
}

class Historystok
{
    public function tampilhistorystok($koneksi)
    {

        $qry = $koneksi->query("SELECT * FROM history_stok INNER JOIN data_stok ON history_stok.id_brg_stok = data_stok.id_brg_stok INNER JOIN tb_barang ON data_stok.id_brg = tb_barang.id_brg ORDER BY id_history_stok");
        return $qry;

        while ($pecah = $qry->fetch_assoc()) {
            $data[] = $pecah;
        }
        return $data;
    }
    public function hapushistorystok($koneksi, $id)
    {
        $koneksi->query("DELETE FROM history_stok WHERE id_history_stok = '$id'");
    }
}

class Datastok
{


    // Barang
    public function tampilbrgstok($koneksi)
    {

        $qry = $koneksi->query("SELECT * FROM data_stok INNER JOIN tb_barang ON data_stok.id_brg = tb_barang.id_brg ORDER BY id_brg_stok");
        return $qry;

        while ($pecah = $qry->fetch_assoc()) {
            $data[] = $pecah;
        }
        return $data;
    }

    public function hapusstok($koneksi, $id)
    {
        $koneksi->query("DELETE FROM data_stok WHERE id_brg_stok = '$id'");
    }
    public function simpan_barang_stok($koneksi, $id_brg, $stok)
    {
        $koneksi->query("INSERT INTO data_stok(id_brg,stok) 
				VALUES('$id_brg','$stok')");
    }
    public function ubah_barang_stok($koneksi, $stok, $tambahstok, $id)
    {
        $tgl_perubahan = date('Y-m-d');
        $newstok = $stok + $tambahstok;

        $qry = $koneksi->query("SELECT * FROM data_stok WHERE id_brg_stok = '$id'");
        $data = $qry->fetch_assoc();
        $stoksblm = $data['stok']; //ambil stok sblm

        $koneksi->query("UPDATE data_stok SET stok='$newstok' WHERE id_brg_stok = '$id'");
        $koneksi->query("INSERT INTO history_stok(id_brg_stok,stok_sblm,stok_sesudah,tanggal_perubahan) 
				VALUES('$id','$stoksblm','$newstok','$tgl_perubahan')");
    }
    public function ambil_barang_stok($koneksi, $kdbarang)
    {
        $qry = $koneksi->query("SELECT * FROM tb_barang INNER JOIN data_stok ON tb_barang.id_brg = data_stok.id_brg WHERE tb_barang.id_brg = '$kdbarang'");
        $pecah = mysqli_fetch_assoc($qry);

        return $pecah;
    }
    public function ambil_barang_stok2($koneksi, $kdbarang)
    {
        $qry = $koneksi->query("SELECT * FROM data_stok WHERE id_brg_stok = '$kdbarang'");
        $pecah = mysqli_fetch_assoc($qry);

        return $pecah;
    }
}

class Penjualan extends Datastok
{
    public function kode_otomatis($koneksi)
    {
        $qry = $koneksi->query("SELECT MAX(kode_penjualan) AS kode FROM penjualan");
        $pecah = mysqli_fetch_array($qry);
        $kode = substr($pecah['kode'], 3, 5);
        $jum = $kode + 1;
        if ($jum < 10) {
            $id = "PEN0000" . $jum;
        } else if ($jum >= 10 && $jum < 100) {
            $id = "PEN000" . $jum;
        } else if ($jum >= 100 && $jum < 1000) {
            $id = "PEN00" . $jum;
        } else {
            $id = "PEN0" . $jum;
        }
        return $id;
    }
    public function tampil_barang_penjualan($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM data_stok INNER JOIN tb_barang ON data_stok.id_brg = tb_barang.id_brg WHERE data_stok.stok > 0 ORDER BY data_stok.id_brg ASC");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[] = $pecah;
        }
        return $data;
    }
    public function tampil_penjualan($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM penjualan a INNER JOIN tb_pelanggan b ON a.id_pelanggan=b.id_pelanggan ORDER BY a.kode_penjualan DESC");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        } else {
            error_reporting(0);
        }
    }
    public function cek_data_barangp($koneksi, $kode)
    {
        $qry = $koneksi->query("SELECT * FROM penjualan_sementara WHERE kode_penjualan = '$kode'");
        $hitung = $qry->num_rows;
        if ($hitung >= 1) {
            return true;
        } else {
            return false;
        }
    }
    public function tampil_barang_sementara($koneksi, $kode)
    {
        $qry = $koneksi->query("SELECT * FROM penjualan_sementara WHERE kode_penjualan = '$kode'");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        } else {
            error_reporting(0);
        }
    }
    public function tambah_penjualan_sementara($koneksi, $kdpen, $kdbarang, $item)
    {
        $bar = $this->ambil_barang_stok($koneksi, $kdbarang);
        $namabr = $bar['nama_barang'];
        $satuan = $bar['satuan'];
        $harga = $bar['harga_jual'];
        $total = $harga * $item;
        $koneksi->query("INSERT INTO penjualan_sementara(kode_penjualan, id_brg, nama_barang, satuan, harga, item, total) 
            VALUES('$kdpen', '$kdbarang','$namabr','$satuan','$harga','$item','$total')");
        // update barang
        $kurang = $bar['stok'] - $item;
        $koneksi->query("UPDATE data_stok SET stok = '$kurang' WHERE id_brg = '$kdbarang'");
    }
    public function cek_item($koneksi, $kdbarang, $item)
    {
        $data = $this->ambil_barang_stok($koneksi, $kdbarang);
        $jumitem = $data['stok'];
        if ($item < $jumitem + 1) {
            return true;
        } else {
            echo "<script>bootbox.alert('Item tidak cukup, $jumitem tersisa di gudang!', function(){
                window.location='?page=penjualan';
            });</script>";
        }
    }
    public function hitung_total_sementara($koneksi, $kode)
    {
        $qry = $koneksi->query("SELECT sum(total) as jumlah FROM penjualan_sementara WHERE kode_penjualan = '$kode'");
        $pecah = mysqli_fetch_array($qry);
        $cek = $this->cek_data_barangp($koneksi, $kode);
        if ($cek === true) {
            $subtotal = $pecah['jumlah'];
        } else {
            $subtotal = 0;
        }
        return $subtotal;
    }
    public function hitung_item_penjualan($koneksi, $kdpenjualan)
    {
        $qry = $koneksi->query("SELECT count(*) as jumlah FROM d_penjualan WHERE kode_penjualan = '$kdpenjualan'");
        $pecah = mysqli_fetch_array($qry);

        return $pecah;
    }
    public function simpan_penjualan($koneksi, $kdpenjualan, $tglpen, $ttlbayar, $pelanggan, $subtotal)
    {
        //insert penjualan
        $kdadmin = $_SESSION['adm']['id_users'];
        $koneksi->query("INSERT INTO penjualan(kode_penjualan,tgl_penjualan,id_pelanggan,id_users,dibayar,total_penjualan) 
        VALUES('$kdpenjualan','$tglpen',$pelanggan,'$kdadmin','$ttlbayar','$subtotal')");

        //insert d penjualan
        $koneksi->query("INSERT INTO d_penjualan(kode_penjualan,id_brg,jumlah,subtotal) 
            SELECT kode_penjualan, id_brg, item, total FROM penjualan_sementara WHERE kode_penjualan='$kdpenjualan'");
        //hapus semua penjualan sementera
        $koneksi->query("DELETE FROM penjualan_sementara WHERE kode_penjualan = '$kdpenjualan'");
    }
    public function ambil_kdpen($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM penjualan ORDER BY kode_penjualan DESC LIMIT 1");
        $pecah = mysqli_fetch_array($qry);
        return $pecah;
    }
    public function hapus_penjualan_sementara($koneksi, $kd)
    {
        //update barang, di kembalikan ke setok semula
        $datpen = $this->ambil_penjualan_sementara($koneksi, $kd);
        $datbar = $this->ambil_barang_stok($koneksi, $datpen['id_brg']);
        $stok = $datbar['stok'] + $datpen['item'];
        $kdbar = $datpen['id_brg'];
        $koneksi->query("UPDATE data_stok SET stok ='$stok' WHERE id_brg = '$kdbar'");
        //hapus
        $koneksi->query("DELETE FROM penjualan_sementara WHERE id_penjualan_sementara = '$kd'");
    }
    public function ambil_penjualan_sementara($koneksi, $kd)
    {
        $qry = $koneksi->query("SELECT * FROM penjualan_sementara WHERE id_penjualan_sementara = '$kd'");
        $pecah = mysqli_fetch_assoc($qry);
        return $pecah;
    }
}

class Laporan
{
    public function tampil_penjualan_bulan($koneksi, $bln1, $bln2)
    {
        $qry = $koneksi->query("SELECT * FROM penjualan pen
            JOIN d_penjualan dpen ON pen.kode_penjualan = dpen.kode_penjualan
            JOIN tb_barang bar ON dpen.id_brg = bar.id_brg 
            WHERE pen.tgl_penjualan BETWEEN '$bln1' AND '$bln2'");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        } else {
            error_reporting(0);
        }
    }
    public function cek_penjualan_bulan($koneksi, $bln1, $bln2)
    {
        $qry = $koneksi->query("SELECT * FROM penjualan pen
            JOIN d_penjualan dpen ON pen.kode_penjualan = dpen.kode_penjualan
            JOIN tb_barang bar ON dpen.id_brg = bar.id_brg
            WHERE pen.tgl_penjualan BETWEEN '$bln1' AND '$bln2'");
        $hitung = $qry->num_rows;
        if ($hitung >= 1) {
            return true;
        } else {
            return false;
        }
    }
    public function hitung_total_penjualan($koneksi)
    {
        $qry = $koneksi->query("SELECT sum(dpen.subtotal) as jumlah FROM penjualan pen
            JOIN d_penjualan dpen ON pen.kode_penjualan = dpen.kode_penjualan
            JOIN tb_barang bar ON dpen.id_brg = bar.id_brg");
        $pecah = mysqli_fetch_array($qry);
        $subtotal = $pecah['jumlah'];
        return $subtotal;
    }
    public function tampil_penjualan($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM penjualan pen
            JOIN d_penjualan dpen ON pen.kode_penjualan = dpen.kode_penjualan
            JOIN tb_barang bar ON dpen.id_brg = bar.id_brg ");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        } else {
            error_reporting(0);
        }
    }
    public function cek_penjualan($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM penjualan pen
            JOIN d_penjualan dpen ON pen.kode_penjualan = dpen.kode_penjualan
            JOIN tb_barang bar ON dpen.id_brg = bar.id_brg");
        $hitung = $qry->num_rows;
        if ($hitung >= 1) {
            return true;
        } else {
            return false;
        }
    }
    public function hitung_total_penjualan_bulan($koneksi, $bln1, $bln2)
    {
        $qry = $koneksi->query("SELECT sum(dpen.subtotal) as jumlah FROM penjualan pen
            JOIN d_penjualan dpen ON pen.kode_penjualan = dpen.kode_penjualan
            JOIN tb_barang bar ON dpen.id_brg = bar.id_brg
            WHERE pen.tgl_penjualan BETWEEN '$bln1' AND '$bln2'");
        $pecah = mysqli_fetch_array($qry);
        $subtotal = $pecah['jumlah'];
        return $subtotal;
    }
    //end penjualan

    public function tampil_pembelian_bulan($koneksi, $bln1, $bln2)
    {
        $qry = $koneksi->query("SELECT * FROM tb_supplier sup
            JOIN pembelian pem ON sup.id_supplier = pem.id_supplier
            JOIN d_pembelian dpem ON pem.kode_pembelian = dpem.kode_pembelian
            JOIN barang_pembelian barpem ON dpem.id_barang_pembelian = barpem.id_barang_pembelian 
            WHERE pem.tgl_pembelian BETWEEN '$bln1' AND '$bln2'");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        } else {
            error_reporting(0);
        }
    }
    public function cek_pembelian_bulan($koneksi, $bln1, $bln2)
    {
        $qry = $koneksi->query("SELECT * FROM tb_supplier sup
            JOIN pembelian pem ON sup.id_supplier = pem.id_supplier
            JOIN d_pembelian dpem ON pem.kode_pembelian = dpem.kode_pembelian
            JOIN barang_pembelian barpem ON dpem.id_barang_pembelian = barpem.id_barang_pembelian 
            WHERE pem.tgl_pembelian BETWEEN '$bln1' AND '$bln2'");
        $hitung = $qry->num_rows;
        if ($hitung >= 1) {
            return true;
        } else {
            return false;
        }
    }
    public function hitung_total_pembelian_bulan($koneksi, $bln1, $bln2)
    {
        $qry = $koneksi->query("SELECT sum(dpem.subtotal) as jumlah FROM tb_supplier sup
            JOIN pembelian pem ON sup.id_supplier = pem.id_supplier
            JOIN d_pembelian dpem ON pem.kode_pembelian = dpem.kode_pembelian
            JOIN barang_pembelian barpem ON dpem.id_barang_pembelian = barpem.id_barang_pembelian 
            WHERE pem.tgl_pembelian BETWEEN '$bln1' AND '$bln2'");
        $pecah = mysqli_fetch_array($qry);
        $subtotal = $pecah['jumlah'];
        return $subtotal;
    }
    public function hitung_total_pembelian($koneksi)
    {
        $qry = $koneksi->query("SELECT sum(dpem.subtotal) as jumlah FROM tb_supplier sup
            JOIN pembelian pem ON sup.id_supplier = pem.id_supplier
            JOIN d_pembelian dpem ON pem.kode_pembelian = dpem.kode_pembelian
            JOIN barang_pembelian barpem ON dpem.id_barang_pembelian = barpem.id_barang_pembelian");
        $pecah = mysqli_fetch_array($qry);
        $subtotal = $pecah['jumlah'];
        return $subtotal;
    }
    public function tampil_pembelian($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM tb_supplier sup
            JOIN pembelian pem ON sup.id_supplier = pem.id_supplier
            JOIN d_pembelian dpem ON pem.kode_pembelian = dpem.kode_pembelian
            JOIN barang_pembelian barpem ON dpem.id_barang_pembelian = barpem.id_barang_pembelian");
        while ($pecah = mysqli_fetch_array($qry)) {
            $data[] = $pecah;
        }
        $hitung = $qry->num_rows;
        if ($hitung > 0) {
            return $data;
        } else {
            error_reporting(0);
        }
    }
    public function cek_pembelian($koneksi)
    {
        $qry = $koneksi->query("SELECT * FROM tb_supplier sup
            JOIN pembelian pem ON sup.id_supplier = pem.id_supplier
            JOIN d_pembelian dpem ON pem.kode_pembelian = dpem.kode_pembelian
            JOIN barang_pembelian barpem ON dpem.id_barang_pembelian = barpem.id_barang_pembelian");
        $hitung = $qry->num_rows;
        if ($hitung >= 1) {
            return true;
        } else {
            return false;
        }
    }
    //end pembelian
    public function hitung_profit_bulan()
    { }
    public function hitung_profit_semua()
    { }
}
class Dashboard
{
    public function penjualan_hariini($koneksi)
    {
        $hari = date("Y-m-d");
        $qry = $koneksi->query("SELECT * FROM penjualan WHERE tgl_penjualan = '$hari'");
        $hitung = mysqli_num_rows($qry);
        return $hitung;
    }
    public function pembelian_hariini($koneksi)
    {
        $hari = date("Y-m-d");
        $qry = $koneksi->query("SELECT * FROM pembelian WHERE tgl_pembelian = '$hari'");
        $hitung = mysqli_num_rows($qry);
        return $hitung;
    }
    public function barang_yang_kurang($koneksi)
    {
        // $hari = date("Y-m-d");
        $qry = $koneksi->query("SELECT * FROM data_stok INNER JOIN tb_barang ON data_stok.id_brg = tb_barang.id_brg WHERE stok <= 15");
        $hitung = mysqli_num_rows($qry);
        return $hitung;
    }
    public function semua_pembelian($koneksi)
    {
        // $hari = date("Y-m-d");
        $qry = $koneksi->query("SELECT * FROM pembelian ORDER BY kode_pembelian DESC");
        $hitung = mysqli_num_rows($qry);
        return $hitung;
    }
    public function semua_penjualan($koneksi)
    {
        // $hari = date("Y-m-d");
        $qry = $koneksi->query("SELECT * FROM penjualan ORDER BY kode_penjualan DESC");
        $hitung = mysqli_num_rows($qry);
        return $hitung;
    }
}


// $Database = new Database();
// $konek = $Database->sambungkan();
$dashboard = new Dashboard();
$barang = new Barang();
$users = new Users();
$supp = new Supplier();
$pelanggan = new Pelanggan();
$pembelian = new Pembelian();
$historystok = new Historystok();
$datastok = new Datastok();
$penjualan = new Penjualan();
$laporan = new Laporan();




?> 