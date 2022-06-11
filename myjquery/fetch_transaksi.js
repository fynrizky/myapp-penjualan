// Tambah Pembelian

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
    $("#formbtnpem").click(function () {
        if (!validateText('tglpembelian')) {
            $('#tglpembelian').focus();
            return false;
        } else if (!validateText('supplier')) {
            $('#supplier').focus();
            return false;
        }
        return true;
    });
});
$(document).ready(function () {
    $("#tambah").click(function () {
        if (!validateText('nama')) {
            $('#nama').focus();
            return false;
        } else if (!validateText('satuan')) {
            $('#satuan').focus();
            return false;
        } else if (!validateText('hargab')) {
            $('#hargab').focus();
            return false;
        } else if (!validateText('item')) {
            $('#item').focus();
            return false;
        }
        return true;
    });
});

// Penjualan

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
    $("#formbtn2").click(function () {
        if (!validateText('tglpenjualan')) {
            $('#tglpenjualan').focus();
            return false;
        } else if (!validateText('totalbayar')) {
            $('#totalbayar').focus();
            return false;
        }
        return true;
    });
});
$(document).ready(function () {
    $("#tambah2").click(function () {
        if (!validateText('item')) {
            $('#item').focus();
            return false;
        }
        return true;
    });
});