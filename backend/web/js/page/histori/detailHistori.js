function _getDataDetailPesanan(id) {
    var baseUrl = window.location+'/../../api/detail-histori';
    $.ajax({
        type     : 'POST',
        url      : baseUrl,
        dataType : 'JSON',
        data     : {
            id : id
        },
        success: function(res){
            let total          = 0;
            let html           = '';
            let array          = [];
            let arrayIndicator = [];
            let gambar_f       = '';
            res.data.map((item, index) => {
                gambar_f = '/e-commerce/uploads/backend/produk/'+item.gambar;
                if (index == 0) {
                    array.push(
                        '<div class="carousel-item active">'
                            +'<img class="d-block w-100" src='+gambar_f+'>'
                        +'</div>'
                    );
                    arrayIndicator.push('<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>');
                } else {
                    array.push(
                        '<div class="carousel-item">'
                            +'<img class="d-block w-100" src='+gambar_f+'>'
                        +'</div>'
                    );
                    arrayIndicator.push('<li data-target="#carouselExampleIndicators" data-slide-to='+index+'></li>');
                }
            });
            array = array.join('');
            html  = array.toString();
            $('.carousel-inner').html(html);
            arrayIndicator = arrayIndicator.join('');
            html           = arrayIndicator.toString();
            $('.carousel-indicators').html(html);
            return true;
        },
        error: function(e){
            alert('ERROR at PHP side!!');
            return false;
        }
    });
}