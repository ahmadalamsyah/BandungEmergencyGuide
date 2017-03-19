<script>
        $(document).ready(function(){
                $('#simpan').click(function (){
               
               var nip = $('#nip').val();
               var nama = $('#nama').val();
               var password1 = $('#password1').val();
               var kategoriTempat = $('#kategoriTempat').val();
               var namaTempat = $('#namaTempat').val();
               
               
              
            
                    $.ajax({
                       type:"POST",
                        url: "<?php echo base_url()?>RegistrasiUserController/simpanUser",
                        data: 'nip='+nip+'&nama='+nama+'&password1='+password1+'&namaTempat='+namaTempat+'&kategoriTempat='+kategoriTempat,
                       
                        success: function (data) {
                            alert ("insert berhasil");
                                $('#nip').val(null);
                                $('#nama').val(null);
                                $('#password1').val(null);
                                $('#kategoriTempat').val(null);
                                $('#namaTempat').val(null);
                               
                                
                                window.location = "<?php echo base_url() ?>RegistrasiUserController";
                        },
                              error: function (jqXHR, status, error){
                              
                              alert("insert gagal");
                    }
                   });
                 
               return false;
            });
         });
       
      
                   
    </script>
    
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
                                            <input class="form-control" id="nip" type="text" maxlength="8" placeholder="NIP Harus di Input" required="true"/>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" id="nama" type="text"  maxlength="30" placeholder="Nama Harus di Input" required="true"/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" id="password1" type="text" maxlength="8" placeholder="Password Harus di Input" required="true"/>
                                          
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


