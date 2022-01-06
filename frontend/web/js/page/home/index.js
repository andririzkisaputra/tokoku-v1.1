$(document).ready(function() {
    _getData();
    // _getDataKeranjang();
});

function _getData() {
    var keranjang = 1;
    $.ajax({
        type     : 'POST',
        url      : window.location+'/api/rekomendasi-produk',
        dataType : 'JSON',
        success: function(res){
            let html  = '';
            let array = [];
            res.data.map((item, index) => {
            let gambar_f = '/e-commerce/uploads/backend/produk/'+item.gambar;
            if (item.keranjang) {
            html = '<div style="text-align: center;">'
                        +'<a href="javascript:void(0)" class="col-sm-2 col-md-2 col-lg-2 option1 minKeranjang" data='+item.keranjang.keranjang_id+'>'
                        +'-'
                        +'</a>'
                        +'<b style="padding: 0px 10px 0px 10px">'+item.keranjang.qty+'</b>'
                        +'<a href="javascript:void(0)" class="col-sm-2 col-md-2 col-lg-2 option1 plusKeranjang" data='+item.keranjang.keranjang_id+'>'
                        +'+'
                        +'</a>'
                    +'</div>'
            } else {
            html = '<a href="javascript:void(0)" class="option1 keranjang" data='+item.produk_id+'>'
                    +'Keranjang'
                    +'</a>'
            }
            array.push('<div class="col-sm-6 col-md-4 col-lg-4">'
                +'<div class="box">'
                    +'<div class="option_container">'
                        +'<div class="options">'
                        +html
                        +'<div style="text-align: center">'
                            +'<a href="javascript:void(0)" class="option2 beli" data='+item.produk_id+' style="margin: 5px 5px 0px 10px">'
                            +'Beli'
                            +'</a>'
                            // +'<a href=".'"javascript:void(0)"'." class=".'"col-sm-4 option3 detail"'." data='+item.produk_id+' style=".'"margin: 5px 5px 0px 10px"'.">'
                            //  +'Detail'
                            // +'</a>'
                        +'</div>'
                        +'</div>'
                    +'</div>'
                    +'<div class="img-box">'
                        +'<img src='+gambar_f+'>'
                    +'</div>'
                    +'<div class="detail-box">'
                        +'<h5>'
                        +item.nama_produk
                        +'</h5>'
                        +'<h6>'
                        +item.harga_f
                        +'</h6>'
                    +'</div>'
                +'</div>'
            +'</div>');
            })
            array = array.join('');
            html  = array.toString();
            $('#rekomendasi-produk').html(html);
            return true;
        },
        error: function(e){
            alert('ERROR at PHP side!!');
            return false;
        }
    });
}


$(function(){
    $(document).on('click', '.beli', function() {
        var produk_id = $(this).attr('data');
        if (produk_id) {
            $.ajax({
                type     : 'POST',
                url      : window.location+'/api/select-keranjang',
                dataType : 'JSON',
                data     : {
                produk_id : produk_id
                },
                success: function(res){
                _getData();
                            location.href = "site/transaksi";
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
});

$(function(){
    $(document).on('click', '.keranjang', function() {
        var produk_id = $(this).attr('data');
        if (produk_id) {
            $.ajax({
                type     : 'POST',
                url      : window.location+'/api/select-keranjang',
                dataType : 'JSON',
                data     : {
                produk_id : produk_id
                },
                success: function(data){
                _getData();
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
});

$(function(){
    $(document).on('click', '.minKeranjang', function() {
        var keranjang_id = $(this).attr('data');
        if (keranjang_id) {
            $.ajax({
                type     : 'POST',
                url      : window.location+'/api/keranjang',
                dataType : 'JSON',
                data     : {
                keranjang_id : keranjang_id,
                is_keranjang : 0
                },
                success: function(data){
                _getData();
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
});


$(function(){
    $(document).on('click', '.plusKeranjang', function() {
        var keranjang_id = $(this).attr('data');
        if (keranjang_id) {
            $.ajax({
                type     : 'POST',
                url      : window.location+'/api/keranjang',
                dataType : 'JSON',
                data     : {
                keranjang_id : keranjang_id,
                is_keranjang : 1
                },
                success: function(data){
                _getData();
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
});