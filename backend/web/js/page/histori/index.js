$(document).ready(function(){
    var baseUrl = window.location+'/../../api/get-history';
    $('#tabel_histori').DataTable({
        dom: 'Blfrtip',
        buttons: [],
        'lengthMenu': [10, 20, 50, 100, 200, 500, 1000, 5000, 10000],
        'pageLength': 10,
        'lengthChange': false,
        'processing': false,
        'serverSide': false,
        ajax : {
            url  : baseUrl,
            type : 'POST',
            data : {},
        },
        columns: [
            { data: 'no'},
            { data: 'batchnumber', 'className' : 'text-left' },
            { data: 'balance', 'className' : 'text-left' },
            { data: 'remark', 'className' : 'text-left' },
            { data: 'status', 'className' : 'text-left' },
            { data: 'dateTime', 'className' : 'text-left' },
            { data: 'type', 'className' : 'text-left' },
            { data: 'aksi', 'className' : 'text-left' },
        ],
    });

});

$(document).on('click', '.hapus', function() {
    var produk_id = $(this).attr('data');
    if (produk_id) {
        var baseUrl = window.location+'/../../api/delete-pesanan'
        $.ajax({
            type     : 'POST',
            url      : baseUrl,
            dataType : 'JSON',
            data     : {
                produk_id : produk_id
            },
            success: function(data){
                $('#tabel_produk').DataTable().ajax.reload();
                return true;
            },
            error: function(){
                alert('ERROR at PHP side!!');
                return false;
            }
        });
    } else {
        return false;
    }
});