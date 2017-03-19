<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bandung Emergency Guide</title>
   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets/css/bootstrap2.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets/css/site.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets/css/bootstrap-responsive.css">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
//       
       
        
        function peta_awal(){
           var koorAwal = new google.maps.LatLng(-6.915239, 107.612409);
            var settingpeta = {
                zoom: 17,
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
                zoom: 14,
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
    
   
       
</head>
    <body onload="peta_awal()" style="width: auto; height: 700px;" >
   <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Administrator</a>
          <div class="btn-group pull-right">
              <h5><?php echo $session;?></h5>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
			<li><a href="<?php echo base_url() ;?>HomeUserController">Home</a></li>
                        <li ><a href="<?php echo base_url();?>LokasiEmergencyUserController">Tambah Lokasi </a></li>
                        
                        
                        
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        
        
            <div  id="kanvaspeta" style=" width: auto; height: 700px;">
            
            </div>
          <br>
          
          <div class="table-responsive">
              <div>
                  <h3>Data Lokasi Emergency</h3>
              </div>
              <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lokasi</th>
                        <th>Alamat Lokasi</th>
                        <th>No Telepon</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Kategori Lokasi</th>
                        <th class="span2">
                            Options
                        </th>
                     </tr>
                     </thead>
                    <tbody>
                           <?php
                                $no=1;
                                if(isset($result_data)){
                                foreach($result_data as $row){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->namaLokasi; ?></td>
                                    <td><?php echo $row->alamatLokasi; ?></td>
                                    <td><?php echo $row->noTlp; ?></td>
                                    <td><?php echo $row->latitude; ?></td>
                                    <td><?php echo $row->longitude?></td>
                                    <td><?php echo $row->namaKategoriTempat?></td>
                                    <td>
                                        <a class="btn btn-info" href="<?php echo base_url()?>LokasiEmergencyUserController/getOpenEdit/<?php echo $row->idLokasiEmergency?>" >Edit</a>
                                        
                                    </td>
                                </tr>

                                <?php }
                                }
                                ?>

                    </tbody>
                </table>
               
              
          </div>
         


    </div>
    </div>
    
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    
   
</body>
</html>

