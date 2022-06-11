/* Tambah Barang */


//upper
$(function () {
    $('#kdbarang').focusout(function () {
        // Uppercase-ize contents
        this.value = this.value.toLocaleUpperCase();
    });
    $('#satuan').focusout(function () {
        // Uppercase-ize contents
        this.value = this.value.toLocaleUpperCase();
    });
});
//fungsi hide div //hilangkan id divAlert
$(function () {
    setTimeout(function () {
        $("#divAlert").fadeOut(900)
    }, 500);
});
//ajax
$(document).ready(function () {
    $('#kdbarang').blur(function () {
        var kdbarang = $(this).val();
        if (kdbarang == "") {
            $('#showresult').html("");
        } else {
            $.ajax({
                url: "validasi/cek-kdbarang.php?kdbarang=" + kdbarang
            }).done(function (data) {
                $('#showresult').html(data);
            });
        }
    });
});
//validasi form
function validateText(id) {
    if ($('#' + id).val() == null || $('#' + id).val() == "") {
        var div = $('#' + id).closest('div');
        div.addClass("has-error has-feedback");
        return false;
    } else {
        var div = $('#' + id).closest('div');
        div.removeClass("has-error has-feedback");
        return true;
    }
}
$(document).ready(function () {
    $("#formbtn").click(function () {
        var input = kdbarang.value;
        if (!validateText('kdbarang')) {
            $('#kdbarang').focus();
            return false;
        } else if (!(/^\S{0,}$/.test(input))) { //reguler expresion
            $('#kdbarang').focus();
            alert('Tidak Boleh Menggunakan Space');
            // bootbox.alert('Tidak Boleh Menggunakan Spasi');
            return false;
        }

        if (!validateText('nama_barang')) {
            $('#nama_barang').focus();
            return false;
        }
        if (!validateText('satuan')) {
            $('#satuan').focus();
            return false;
        }
        if (!validateText('harga_jual')) {
            $('#harga_jual').focus();
            return false;
        }
        if (!validateText('harga_beli')) {
            $('#harga_beli').focus();
            return false;
        }
        return true;
    });
});



/* Ubah Barang */

//upper
$(function () {
    $('#satuan').focusout(function () {
        // Uppercase-ize contents
        this.value = this.value.toLocaleUpperCase();
    });
});
//fungsi hide div
$(function () {
    setTimeout(function () {
        $("#divAlert").fadeOut(900)
    }, 500);
});

function validateText(id) {
    if ($('#' + id).val() == null || $('#' + id).val() == "") {
        var div = $('#' + id).closest('div');
        div.addClass("has-error has-feedback");
        return false;
    } else {
        var div = $('#' + id).closest('div');
        div.removeClass("has-error has-feedback");
        return true;
    }
}
$(document).ready(function () {
    $("#formbtn").click(function () {
        if (!validateText('nama_barang')) {
            $('#nama_barang').focus();
            return false;
        }
        if (!validateText('satuan')) {
            $('#satuan').focus();
            return false;
        }
        if (!validateText('harga_jual')) {
            $('#harga_jual').focus();
            return false;
        }
        if (!validateText('harga_beli')) {
            $('#harga_beli').focus();
            return false;
        }
        return true;
    });
});