<?php
    include "class.crudnota.php";
    $nota = new Nota();
    $perusahaan = new Perusahaan();
    $tam = $nota->ambil_nota_penjualan($koneksi,$_GET['kodepenjualan']);
    $per = $perusahaan->tampil_perusahaan($koneksi);
?>

<style type="text/css">
.st_total {
	font-size: 10pt;
	font-weight: bold;
	font-family:Verdana, Arial, Helvetica, sans-serif;
}
.style6 {
	color: #000000;
	font-size: 10pt;
	font-weight: bold;
	font-family: Arial;
}
.style9 {
	color: #000000;
	font-size: 10pt;
	font-weight: normal;
	font-family: Arial;
}
.style9b {
	color: #000000;
	font-size: 10pt;
	font-weight: bold;
	font-family: Arial;
}
.style19b {
	color: #000000;
	font-size: 16pt;
	font-weight: bold;
  padding-top: -10px;
	font-family: "Times New Roman", Times, serif;
}
.style10b {
	color: #000000;
	font-size: 16pt;
	font-weight: bold;
	font-family: Arial;
}
.par{
  color: #000000;
  font-size: 12pt;
  font-weight: normal;
  font-family: Arial;
  margin-top: 3;
}
</style>
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="7">
      <div align="center">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            
            
            <td width="69%" rowspan="4" valign="top" class="style19b">
                <img src="../assets/img/elang.png" alt="" style="width: 85px; margin-top: -10px;">    
                <p style="margin-top: -70px; padding-left: 100px;"><?php echo $per['nama_perusahaan']; ?></p>
                <br/><p class="par" style="width: 400px; font-size: 12px; margin-top: -40px; margin-left: 100px; font-weight: italic;"><?php echo $per['alamat']; ?></p>
            </td>
            <td colspan="3"><div align="center" class="style9b">
              <div align="left" class="style19b"><strong><u>NOTA</u></strong></div>
            </div></td>
            </tr>
          <tr>
            <td width="11%" height="18" class="style9">Nomor </td>
            <td width="1%" class="style9"><div align="center">:</div></td>
            <td width="14%" class="style9"><?php echo $tam['kode_penjualan']; ?></td>
          </tr>
          <tr>
            <td width="11%" height="18" class="style9">Pelanggan </td>
            <td width="1%" class="style9"><div align="center">:</div></td>
            <td width="14%" class="style9"><?php echo ucwords($tam['nama_pelanggan']); ?></td>
          </tr>
          <tr>
            <td class="style9">Tanggal</td>
            <td><div align="center">:</div></td>
            <td><span class="style9">
              <?php echo date_format(date_create($tam['tgl_penjualan']),'d-m-Y');?>
            </span></td>
          </tr>
        </table>
          </div>
       </td>
    </tr>
  </table>
   </br>
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="7">
      <hr />      
      </td>
    </tr>
    <tr>
    	<td width="24" class="style6"><div align="center">No</div></td>
      <td width="150" class="style6"><div align="left">Kode Barang</div></td>
      <td width="203" class="style6"><div align="left">Nama Barang</div></td>
      <td width="60" class="style6"><div align="left">Satuan</div></td>
      <td width="94" class="style6"><div align="left">Jumlah</div></td>
      <td width="117" class="style6"><div align="left">Harga</div></td>
      <td width="117" class="style6"><div align="right">Total</div></td>
    </tr>
      <tr>
      <td colspan="7">
      <hr />      </td>
      </tr>
      <?php
      	$tampil = $nota->tampil_nota_penjualan($koneksi,$_GET['kodepenjualan']);
		foreach ($tampil as $index => $data){	
	  ?>
      <tr>
        <td class="style9" align="center"><?php echo $index + 1;?>.</td>
        <td class="style9"><?php echo $data['kode_barang'];?></td>
        <td class="style9"><?php echo ucwords($data['nama_barang']);?></td>
        <td class="style9" align="left"><?php echo $data['satuan'];?></td>
        <td class="style9" align="left"><?php echo $data['jumlah'];?></td>
        <td class="style9" align="left">Rp. <?php echo number_format($data['harga_jual']);?></td>
        <td class="style9" align="right">Rp. <?php echo number_format($data['subtotal']);?></td>
      </tr>
      <?php }?>
      <tr>
      <td colspan="7">
      <hr />      </td>
      </tr>
  </table>
 
  <table width="98%" align="center">
   
    <tr>
      <td colspan="6" align="right" class="st_total">TOTAL</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right">Rp. 
      <?php echo number_format($tam['total_penjualan']); ?>
      </div></td>
    </tr>
    <tr>
      <td colspan="6" align="right" class="st_total">DIBAYAR</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right">Rp. 
      <?php echo number_format($tam['dibayar']); ?>
      </div></td>
    </tr>
    <?php  
      $kembali = $tam['dibayar'] - $tam['total_penjualan'];
    ?>
    <tr>
      <td colspan="6" align="right" class="st_total">KEMBALI</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right">Rp. 
      <?php echo number_format($kembali); ?>
      </div></td>
    </tr>


  </table>
  
   <table width="98%" border="0" align="center">
   <tr>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
   </tr>
   <tr>
     <td colspan="3"><div align="center" class="style9"><?php echo ucwords($tam['nama_user']); ?></div></td>
     <td colspan="3">&nbsp;</td>
     <td colspan="3"></td>
   </tr>
   <tr>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
   </tr>
   <tr>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
   </tr>
   <tr>
     <td width="82"><div align="right">(</div></td>
     <td width="89">
     <div align="center" class="style9"></div></td>
     <td width="76">)</td>
   </tr>
 </table>
<script type="text/javascript">
//---yang load di awal
window.print();
</script>

