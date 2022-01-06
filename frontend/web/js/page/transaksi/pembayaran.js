$(document).ready(function(){
_getData();
});

function _getData() {
    var baseUrl = window.location+'/../../api/pembayaran';
    $.ajax({
        type     : 'POST',
        url      : baseUrl,
        dataType : 'JSON',
        success: function(res){
            let html  = '';
            let array = [];
            res.data.map((item, index) => {
            let id       = item.pembayaran_id
            let gambar_f = '/e-commerce/uploads/backend/other/'+item.gambar;
            array.push('<div class="form-check" style="margin: 0px 0px 20px 0px">'
                +'<input class="form-check-input" style="margin-top: 1.3rem" type="radio" id="dataPembayaran" value='+id+' name="pembayaran"/>'
                    +'<img width="50" src='+gambar_f+' style="margin: 0px 20px 0px 0px">'
                +'<label class="form-check-label" for="flexCheckDefault">'
                    +item.pembayaran
                +'</label>'
            +'</div>');
            })
            array = array.join('');
            html  = array.toString();
            $('#list-pembayaran').html(html);
            return true;
        },
        error: function(e){
            alert('ERROR at PHP side!!');
            return false;
        }
    });
}

$(document).on('click', '.pembayaran', function() {
    var baseUrl = window.location+'/../../api/select-pembayaran';
    var pembayaran   = $('input[name=pembayaran]:checked').val();
    if (pembayaran) {
        $.ajax({
            type     : 'POST',
            url      : baseUrl,
            dataType : 'JSON',
            data     : {
            pembayaran   : pembayaran,
            },
            success: function(data){
                document.location.reload();
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