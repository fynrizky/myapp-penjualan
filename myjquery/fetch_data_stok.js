// popover using JQuery Data Kartu keluarga
$(document).ready(function () { //jquery carikan dokumen ketika siap jalankan fungsi berikut
    $('.data-stok').popover({ //jquery carikan class data-warga ketika di popover
        title: 'Detail Stok Barang', //kasih title
        content: fetchData, //set content //dr function fetchData
        html: true, //set html
        // trigger: 'focus',
        container: 'body',
        placement: 'right' //tampilan popovernya
    }).on("show.bs.popover", function () {
        $($(this).data("bs.popover").getTipElement()).css("max-width", "500px"); //bootstrap 4 pakai getTipElement akalau bootstrap 3 pakai tip()
        $($(this).data("bs.popover").getTipElement()).css("max-height", "200px"); //bootstrap 4 pakai getTipElement akalau bootstrap 3 pakai tip()
        $($(this).data("bs.popover").getTipElement()).css("overflow-y", "auto");
    });
    //.mouseover(function () { //ketika event mouseover diarahkan atau digunakan jalankan fungsi berikut
    //$(this).popover('show'); //jquery this=class data-warga, ketika di popover tampilkan
    //}).mouseout(function () { //ketika event mouseout tidak diarahkan jalankan fungsi berikut

    // $(this).popover('hide'); //jquery this=class data-warga, ketika mouseout hilangkan popovernya
    //});

    function fetchData() { //membuat method function fetchData
        var fetch_data = ''; //membuat var fetch_data yang kosong
        var element = $(this); //membuat var element yaitu isinya JQuery(this)=>class data-warga
        var id = element.attr("id"); //membuat var id yang isinya element atribut id
        $.ajax({ //jquery jalankan fungsi ajax
            url: "ajax/fetch_data.php", //sumber data yang akan diambil
            method: "POST", //methodnya POST
            async: false, //asyncronus mengambil sebagian data = Tidak
            data: { //datanya yaitu var id yang isinya attr id
                id: id //yang akan di tangkap yaitu propertynya
            },
            success: function (data) { //jika sukses jalankan fungsi berikut berikan dan dapatkan parameter
                fetch_data = data; //var fetch_data yang kososng diisi dgn data yang diambil dari sumber data menggunakan ajax
            }
        });
        return fetch_data; // kembalikan ke fetch_data
    }
});