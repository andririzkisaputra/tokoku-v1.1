$(document).ready(function(){
    var baseUrl = window.location+'/../../api/get-kategori';
    $('#tabel_kategori').DataTable({
        dom: 'Blfrtip',
        buttons: [],
        'lengthMenu'    : [10, 20, 50, 100, 200, 500, 1000, 5000, 10000],
        'pageLength'    : 10,
        'lengthChange'  : true,
        'processing'    : true,
        'serverSide'    : true,
        ajax : {
            url  : baseUrl,
            type : 'POST',
            data : {},
        },
        columns: [
            { data: 'no'},
            { data: 'nama_kategori', 'className' : 'text-left' },
            { data: 'updated_at_f', 'className' : 'text-left' },
            { data: 'aksi', 'className' : 'text-left' },
        ],
    });
});

$(document).on('click', '.hapus', function() {
    var kategori_id = $(this).attr('data');
    if (kategori_id) {
        var baseUrl = window.location+'/../../api/delete-kategori';
        $.ajax({
            type     : 'POST',
            url      : baseUrl,
            dataType : 'JSON',
            data     : {
                kategori_id : kategori_id
            },
            success: function(data){
                $('#tabel_kategori').DataTable().ajax.reload();
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