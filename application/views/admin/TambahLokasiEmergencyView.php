<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bandung Emergency Guide</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets/css/bootstrap2.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets/css/site.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets/css/bootstrap-responsive.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
//       
       
        
        function peta_awal(){
           var koorAwal = new google.maps.LatLng(-6.915239, 107.612409);
            var settingpeta = {
                zoom: 14,
                center: koorAwal,
                mapTypeId: google.maps.MapTypeId.ROADMAP 
                };
            var peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
            
                

         getMarker();
            
           
        }

        function tandai(lokasi){
            $("#latitude").val(lokasi.lat());
            $("#longitude").val(lokasi.lng());
            
        }
//       var latitude = new array();
//       var logitude = new array();
       function getMarker(){
          var idKategoriTempat= 'PL1000';
           var koorAwal = new google.maps.LatLng(-6.915239, 107.612409);
            var settingpeta = {
                zoom: 17,
                center: koorAwal,
                mapTypeId: google.maps.MapTypeId.ROADMAP 
                };
            var peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
            url = "<?php echo base_url();?>LokasiEmergencyController/getInformationLocation";
                $.getJSON(url,function(data){
                    $.each(data.marker,function(key,marker){
                        if(marker.idKategoriTempat == idKategoriTempat){
                            var image = '<?php echo base_url();?>assets/img/police3.png';
                        }else{
                            var image = '<?php echo base_url();?>assets/img/hospital.png';
                        }  
                       var Marker = new google.maps.LatLng(marker.latitude,marker.longitude);
                        var tanda = new google.maps.Marker({
                            position: Marker,
                            map: peta,
                            icon:image
                        });
                    });
                    
                });
                
              google.maps.event.addListener(peta,'click',function(event){
              tandai(event.latLng);
                
            });
                
        }
        
  
    </script>
    <script>
        
        $(document).ready(function(){
                $('#simpan').click(function (){
               
               var namaLokasi = $('#namaLokasi').val();
               var alamatLokasi = $('#alamatLokasi').val();
               var noTlp = $('#noTlp').val();
               var latitude = $('#latitude').val();
               var longitude = $('#longitude').val();
               var kategoriTempat = $('#kategoriTempat').val();
               
              if(namaLokasi == '' ||  alamatLokasi == '' || noTlp == '' || latitude == '' || longitude == '' || kategoriTempat == ''){
                   alert("form harus di isi")
                }else{
            
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>LokasiEmergencyController/simpanLokasiEmergency",
                        data: 'namaLokasi='+namaLokasi+'&alamatLokasi='+alamatLokasi+'&noTlp='+noTlp+'&latitude='+latitude+'&longitude='+longitude+'&kategoriTempat='+kategoriTempat,
                        success: function (data) {
                            alert ("insert berhasil");
                                $('#namaLokasi').val(null);
                                $('#alamatLokasi').val(null);
                                $('#noTlp').val(null);
                                $('#latitude').val(null);
                                $('#longitude').val(null);
                                $('#kategoriTempat').val(null);
                                
                                window.location = "<?php echo base_url() ?>LokasiEmergencyController";
                        },
                              error: function (jqXHR, status, error){
                              
                              alert("insert gagal");
                    }
                   });
                 }
               return false;
            });
         });
       
       
                   
    </script>
       
</head>
    <body onload="peta_awal()" style="width: auto; height: 700px;" >
   <div class="navbar navbar-fixed-top navbar-default">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Administrator</a>
          <div class="btn-group pull-right">
			<h5><?php echo $session?></h5>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
			<li><a href="<?php echo base_url() ;?>HomeController">Home</a></li>
                        <li ><a href="<?php echo base_url();?>LokasiEmergencyController">Tambah Lokasi <b class="caret"></b></a></li>
                        <li ><a href="<?php echo base_url();?>ViewIdentitasPetugasController">Data Petugas </a></li>  
			  
             
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        
          <div class="span9">
            <div  id="kanvaspeta" style=" width: auto; height: 700px;"></div>
            
            
          </div>
          <div class="span3">
          <form class="form-horizontal">
                 
                                        <div class="form-group">
                                            <label>Nama Lokasi</label>
                                            <input class="form-control" id="namaLokasi" type="text" placeholder="Nama Lokasi Harus di Input" required="true"/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Lokasi</label>
                                            <input class="form-control" id="alamatLokasi" type="text" placeholder="Alamat Lokasi Harus di Input" required="true"/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>No Telephone</label>
                                            <input class="form-control" id="noTlp" type="text" placeholder="No Telephone Harus di Input" required="true"/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input class="form-control" id="latitude" type="text" />
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input class="form-control" id="longitude" type="text" />
                                          
                                        </div>
                                         <div class="form-group">
                                            <label>Kategori Lokasi</label>
                                           
                                                    <?php
                                                       echo form_dropdown("idKategoriTempat", $result_KategoriTempat,"class='form-control'","id=kategoriTempat");
							?>
                                          
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-success" id="simpan">Submit</button>
 
            </form>
          </div>
                  
        
    

     

    </div>
    </div>
    
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    
   
</body>
</html>

