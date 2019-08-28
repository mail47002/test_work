$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#product_id').change(function(e){
        e.preventDefault();
        var url = $(this).val();
        console.log(url);
        if(url){
            $.ajax({
                type: 'GET',
                url: url
            }).done(function (data) {
                var attr_2 = '';
                $('#attr_1').html('<div class="row"><span>Назва : </span><span>'+data.name+'</span></div><div class="row"><span>Артикул : </span><span>'+data.article+'</span></div><div class="row"><span>Ціна : </span><span>'+data.price+'</span></div>');
                $.each( data.attridutes, function( i, val ) {
                    attr_2 +=  '<div class="row"><span>'+val.name+' : </span><span> '+val.text+'</span></div>';
                });
                $('#attr_2').html(attr_2);
                console.log(data);
            });
        }
    });
});