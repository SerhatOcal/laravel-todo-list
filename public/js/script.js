$(document).ready(function(){

    jQuery("#dataGetir").click(function (e) {
        e.preventDefault();
        if (jQuery('#provider').find('option:selected').val() == 0){
            alert("Lütfen Bir Değer Seçiniz!");
            return false;
        }
        jQuery("#dataGetir").hide();
        jQuery("#loading").show();

       $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $("meta[name='csrf-token']").attr('content')
            }
       });

       $.ajax({
           url: '/ajax',
           method: 'POST',
           data:{ provider: jQuery('#provider').find('option:selected').attr('data-url'), provider_id:jQuery('#provider').find('option:selected').val()},
           success : function (result) {
               if (result.success){
                   jQuery("#dataGetir").show();
                   jQuery("#loading").hide();
                   jQuery("#isPlaniHesapla").show();
                   $(".alert").show();
                   $(".alert").html(result.success);
               }
           }
       });

    });

    jQuery("#isPlaniHesapla").click(function (e) {
        e.preventDefault();
        jQuery("#isPlaniHesapla").hide();
        jQuery("#loading").show();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $("meta[name='csrf-token']").attr('content')
            }
        });

        $.ajax({
            url: '/ajaxList',
            method: 'POST',
            success: function (response) {
                if (response){
                    var trHTML = '';
                    $('#records_table tbody').html("");
                    $.each(response, function (i, item) {
                        var hafta = Math.floor(item.toplam_sure / 45);
                        var gunKalan = item.toplam_sure % 45;
                        var gun = Math.floor(gunKalan / 24);
                        var saat = gunKalan % 24;
                        trHTML += '<tr><td>' + item.id + '</td><td>' + item.name + '</td><td>' + item.difficulty + '</td><td>' + item.toplam_sure + '</td><td>' + hafta + ' Hafta ' + gun + ' Gün ' + saat + ' Saat '+ '</td></tr>';
                    });
                    $('#records_table').append(trHTML);
                    jQuery("#records_table").show();
                    jQuery("#loading").hide();
                }
            }
        });

    });
});