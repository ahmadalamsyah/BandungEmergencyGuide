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
            url = "<?php echo base_url();?>LokasiEmergencyUserControllerr/getInformationLocation";
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
        
       
 
    
  
        $(document).ready(function(){
                $('#simpan').click(function (){
               var idLokasiEmergency = $('#idLokasiEmergency').val();
               var namaLokasi = $('#namaLokasi').val();
               var alamatLokasi = $('#alamatLokasi').val();
               var noTlp = $('#noTlp').val();
               var latitude = $('#latitude').val();
               var longitude = $('#longitude').val();
               var kategoriTempat = $('#kategoriTempat').val();
               
                   $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>LokasiEmergencyUserController/updateLokasiEmergency",
                        data: 'idLokasiEmergency='+idLokasiEmergency+'&namaLokasi='+namaLokasi+'&alamatLokasi='+alamatLokasi+'&noTlp='+noTlp+'&latitude='+latitude+'&longitude='+longitude+'&kategoriTempat='+kategoriTempat,
                        success: function (data) {
                            alert ("insert berhasil");
                                $('#namaLokasi').val(null);
                                $('#alamatLokasi').val(null);
                                $('#noTlp').val(null);
                                $('#latitude').val(null);
                                $('#longitude').val(null);
                                $('#kategoriTempat').val(null);
                                
                                window.location = "<?php echo base_url() ?>HomeUserController";
                        },
                              error: function (jqXHR, status, error){
                              
                              alert("insert gagal");
                    }
                   });
               
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
			<li><a href="<?php echo base_url() ;?>HomeUserController">Home</a></li>
                        <li ><a href="<?php echo base_url();?>LokasiEmergencyUserController">Tambah Lokasi <b class="caret"></b></a>
                           
			  </li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Roles <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="new-role.html">New Role</a></li>
					<li class="divider"></li>
					<li><a href="roles.html">Manage Roles</a></li>
				</ul>
			  </li>
			  <li><a href="stats.html">Stats</a></li>
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
              
              <?php
               foreach ($result as $row){
              echo form_open('LokasiEmergencyController/getOpenEdit/'.$row->idLokasiEmergency);
             
              ?>
                                         <input id="idLokasiEmergency" type="text" name="idLokasiEmergency" class="text" value="<?php echo $row->idLokasiEmergency?>" required maxlength=20 style="display:none"/>
                 
                                        <div class="form-group">
                                            <label>Nama Lokasi</label>
                                            <input class="form-control" id="namaLokasi" type="text" value="<?php echo $row->namaLokasi?>"/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Lokasi</label>
                                            <input class="form-control" id="alamatLokasi" type="text" value="<?php echo $row->alamatLokasi?>"/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>No Telephone</label>
                                            <input class="form-control" id="noTlp" type="text" value="<?php echo $row->noTlp?>"/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input class="form-control" id="latitude" type="text" disabled="true" value="<?php echo $row->latitude?>"/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input class="form-control" id="longitude" type="text"  disabled="true" value="<?php echo $row->longitude?>"/>
                                          
                                        </div>
                                         <div class="form-group">
                                            <label>Kategori Lokasi</label>
                                           
                                                   <?php 
                            			if($result_KategoriTempat){
                                                    echo"<select name='kategoriTempat' id='kategoriTempat' style=width:205px>";
                                                   	echo"<option value='".null."'>---Kategori Tempat---</option>";
                                                   	foreach ($result_KategoriTempat as $row) {
                                                   		if ($row->idKategoriTempat == $idKategoriTempat) {
                                                   		    echo"<option value='".$row->idKategoriTempat."' selected>".$row->namaKategoriTempat."</option>";
                                                   		} else {
                                                                    if($row->namaKategoriTempat!=$namaKategoriTempat){
		                                                    echo"<option value='".$row->idKategoriTempat."'>".$row->namaKategoriTempat."</option>";
		                                                   	}
                                                                }
                                                           }
                                                            echo"</select>";


                            			}else{
                                                        echo "Data Tidsk Ada";
                            			}
                       				?>   
						
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-success" id="simpan">Submit</button>
 
            </form>
              <?php
              }
              ?>
          </div>
                  
        
    

     

    </div>
    </div>
    
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    
   
</body>
</html>


