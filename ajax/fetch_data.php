<?php

if (isset($_POST["id"])) {
   include_once "../config/koneksi.php";

   $output = '';
   $idstok = $_POST['id'];
   $query = $koneksi->query("SELECT * FROM tb_barang INNER JOIN data_stok ON tb_barang.id_brg = data_stok.id_brg WHERE tb_barang.id_brg =" . $idstok);
   while ($row = $query->fetch_object()) {



      $output = '<h3 class="h3 mb-0 text-gray-800">
              Detail Stok Barang
          </h3>
          <p>' . strtoupper($row->kode_barang) . '/' . ucwords($row->nama_barang) . '</p>
          
          ';


      $output2 = '
      
      <div class="row">
      <div class="col-lg-12">
      <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped" id="datatables">
      <thead>
             <tr>
                 <th>
                    <center>Nama Braang</center>
                 </th>
                 <th>
                    <center>Satuan</center>
                   </th>
                 <th>
                    <center>Stok</center>
                 </th>
                 <th>
                    <center>Harga Beli</center>
                 </th>
                 <th>
                    <center>Harga Jual</center>
                 </th>
                 <th>
                    <center>Keuntungan</center>
                 </th>
                
              </tr>       
      </thead>
      <tbody>';


      $query = $koneksi->query("SELECT * FROM tb_barang INNER JOIN data_stok ON tb_barang.id_brg = data_stok.id_brg WHERE tb_barang.id_brg =" . $idstok);
      while ($row = $query->fetch_object()) {


         $output3 = '<tr>
              
                   <td >' . ucwords($row->nama_barang) . '</td>
                   <td >' . ucwords($row->satuan) . '</td>';

         if ($row->stok <= 10) {
            // $output4 = '<td ><span class="badge badge-pill badge-danger" style="border-radius: 100px; font-size: 16px;"><i class="fa fa-frown fa-fw"></i>' . ucwords($row->stok) . '</span></td>';
            $output4 = '<td ><span class="badge badge-pill badge-danger" style="border-radius: 100px; font-size: 16px;">' . ucwords($row->stok) . '</span></td>';
         } else {
            // $output4 = '<td ><span class="badge badge-pill badge-success" style="border-radius: 100px; font-size: 16px;"><i class="fa fa-smile fa-fw"></i> ' . ucwords($row->stok) . '</span></td>';
            $output4 = '<td ><span class="badge badge-pill badge-success" style="border-radius: 100px; font-size: 16px;"> ' . ucwords($row->stok) . '</span></td>';
         }

         $output5 = '<td >Rp.' . number_format($row->harga_beli) . ',-</td>
                   <td >Rp.' . number_format($row->harga_jual) . ',-</td>
                   <td >Rp.' . number_format($row->harga_jual - $row->harga_beli) . ',-</td>
                   
               </tr>';
      }


      $output6 = '</tbody>
              
              </table>
     
              
               </div>
               </div>
           </div>
           
           <div class="card-footer">
           Footer
           </div>
             
           ';
   }

   echo $output .= $output2 .= $output3 .= $output4 .= $output5 .= $output6;
}

?>
<!-- Page level plugins -->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
      $('#datatables').DataTable({
         lengthMenu: [
            [5, 25, 50, -1],
            [5, 25, 50, "All"]
         ],

      });
   });