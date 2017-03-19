/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function(){
                $('#simpan').click(function (){
               
               var namaLokasi = $('#namaLokasi').val();
               var alamatLokasi = $('#alamatLokasi').val();
               var noTlp = $('#noTlp').val();
               var latitude = $('#latitude').val();
               var longitude = $('#longitude').val();

                   $.ajax({
                        type :"POST",
                        url : "<?php echo base_url()?>Map/insertLocation",
                        data : "namaLokasi="+namaLokasi+"$alamatLokasi="+alamatLokasi+"$noTlp"+noTlp+"$latitude"+latitude+"$longitude"+longitude,
                        success: function (data) {
                            alert ("insert berhasil");
                                $('#namaLokasi').val();
                                $('#alamatLokasi').val();
                                $('#noTlp').val();
                                $('#latitude').val();
                                $('#longitude').val();
    
                        },
                              error: function (jqXHR, status, error){
                              
                              alert("insert gagal");
                    }
                   });
               
               return false;
            });
         });