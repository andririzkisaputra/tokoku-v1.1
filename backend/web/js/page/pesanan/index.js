$(document).ready(function(){
    var baseUrl = window.location+'/../../api/get-pesanan'
    $('#tabel_produk').DataTable({
        dom: 'Blfrtip',
        buttons: [],
        'lengthMenu': [10, 20, 50, 100, 200, 500, 1000, 5000, 10000],
        'pageLength': 10,
        'lengthChange': true,
        'processing': true,
        'serverSide': true,
        ajax : {
            url  : baseUrl,
            type : 'POST',
            data : {},
        },
        columns: [
            { data: 'no'},
            { data: 'kode_transaksi', 'className' : 'text-left' },
            { data: 'status_tagihan_f', 'className' : 'text-left' },
            { data: 'jumlah', 'className' : 'text-left' },
            { data: 'total_bayar', 'className' : 'text-left',
                render: $.fn.dataTable.render.number( '.', '', 0, 'Rp ' )
            },
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