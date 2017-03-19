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
       
    
   
       
</head>
    <body>
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
              <h5><?php echo $session?></h5>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
			<li><a href="<?php echo base_url() ;?>HomeController">Home</a></li>
                        <li ><a href="<?php echo base_url();?>LokasiEmergencyController">Tambah Lokasi </a></li>
                        <li ><a href="<?php echo base_url();?>ViewIdentitasPetugasController">Data Petugas </a></li>  
                        
                        
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
          
          <div class="table-responsive">
              <div>
                  <h3>Data Petugas</h3>
              </div>
              <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Nama Petugas</th>
                        <th>No Telepon</th>
                        <th>Password</th>
                        <th>Kategori lokasi</th>
                        <th>Nama Tempat</th>
                        <th class="span2">
                            Action
                        </th>
                     </tr>
                     </thead>
                    <tbody>
                           <?php
                                $no=1;
                                if(isset($result_Identitas)){
                                foreach($result_Identitas as $row){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->nip; ?></td>
                                    <td><?php echo $row->nama; ?></td>
                                    <td><?php echo $row->noTlp; ?></td>
                                    <td><?php echo $row->password; ?></td>
                                    <td><?php echo $row->namaKategoriTempat?></td>
                                    <td><?php echo $row->namaTempat; ?></td>
                                    <td>
                                        <a class="btn btn-danger" class="hapus" id="<?php echo $row->nip;?>" name="nip" >Hapus</a>
                                        
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
