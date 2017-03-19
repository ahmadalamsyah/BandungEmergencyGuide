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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets/css/site.css">
    
   
   
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    

    <script>
        
        $(document).ready(function(){
                $('#simpan').click(function (){
               
               var nip = $('#nip').val();
               var nama = $('#nama').val();
               var noTlp = $('#noTlp').val();
               var password1 = $('#password1').val();
               var kategoriTempat = $('#kategoriTempat').val();
               var namaTempat = $('#namaTempat').val();
               
               
               if(nip==''||nama==''||noTlp==''|| password1==''||kategoriTempat==''|| namaTempat == ''){
                   alert("Form harus di isi");
                  
               }else{
            
                    $.ajax({
                       type:"POST",
                        url: "<?php echo base_url()?>RegistrasiUserController/simpanUser",
                        data: 'nip='+nip+'&nama='+nama+'&noTlp='+noTlp+'&password1='+password1+'&namaTempat='+namaTempat+'&kategoriTempat='+kategoriTempat,
                       
                        success: function (data) {
                            alert ("insert berhasil");
                                $('#nip').val(null);
                                $('#nama').val(null);
                                $('#noTlp').val(null);
                                $('#password1').val(null);
                                $('#kategoriTempat').val(null);
                                $('#namaTempat').val(null);
                               
                                
                                window.location = "<?php echo base_url() ?>RegistrasiUserController";
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
    
<!--    <script>
         $(document).ready(function(){
                $('#login').click(function (){
               
               var username = $('#username').val();
               var password = $('#password').val();
               alert(username);
               alert(password);
                    $.ajax({
                       type:"POST",
                        url: "VerifyLoginController/dataBase",
                        data: 'username='+username+'&password='+password,
                       
                        success: function (data) {
                            alert ("insert berhasil");
                                
                               
                               
                                
                        },
                              error: function (jqXHR, status, error){
                              
                              alert("insert gagal");
                    }
                   });
                 
               return false;
            });
         });
    </script>-->
    
</head>
   <body >
   <div class="navbar navbar-fixed-top navbar-default">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Bandung Tourism Emergency</a>
          <div class="btn-group pull-right">
              <a href="#formSignUp" role="button" class="btn btn-large btn-primary" data-toggle="modal">Sign Up</a>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
			
             
            </ul>
          </div>
        </div>
      </div>
    </div>
       
            
   <div class="container">
    <div class="row">
      <div class="col-xs-12"> 
      
      <div style="width: 30%; margin:100px auto;">

        <h3 class="row">Login Bandung Tourism Emergency</h3>
        
        <?php echo form_open('VerifyLoginController/dataBase')?>
        <form class="form-horizontal" >
        <div class="form-group">
           
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="true">
        </div>
        <div class="form-group">
           
            <input type="password" maxlength="20" name="password" id="password" class="form-control" placeholder="Password" required="true">
        </div>
         
        <div class="form-group" >
        <div align="right">
               
                   <input type="submit"  class="btn btn-info" class="form-control " id="login" value="Login">

           
          </div>  
          </div>
          
        </form>

      </div>

      </div>
    

    </div>

    </div>
    <div class="modal fade" id="formSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   </div>
                   <div class="modal-body">
                      <form>
                 
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input class="form-control" id="nip" type="text" maxlength="12" placeholder="NIP Harus di Input" required="true"/>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" id="nama" type="text"  maxlength="30" placeholder="Nama Harus di Input" required="true"/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <input class="form-control" id="noTlp" type="text"  maxlength="30" placeholder="No Telepon harus di input" required="true"/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" id="password1" type="password" maxlength="8" placeholder="Password Harus di Input" required="true"/>
                                          
                                        </div>
       
                                         <div class="form-group">
                                            <label>Kategori Lokasi</label>
                                           
                                                    <?php
                                                       echo form_dropdown("idKategoriTempat", $result_KategoriTempat,"class='form-control'","id=kategoriTempat");
							?>
                                          
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Nama Tempat</label>
                                            <input class="form-control" id="namaTempat" type="text" maxlength="30" placeholder="Nama Tempat Harus di Input" required="true"/>
                                          
                                        </div>
                        </form>      
                   </div>
                   <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                  </div>
               </div>
           </div>
           
       </div>






       

   
      
    
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    
   
</body>
</html>

