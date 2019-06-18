<html>  
      <head>  
           <title>Live Table Data Edit</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
        <script type="text/javascript">
        	function test(id_spbu){
        		   $.ajax({
                url:"realtime2/delete_transaksi_log.php",
                method:"POST",
                data:{id_spbu:id_spbu},
                success:function(data)
                {
                    console.log('sukses');
                }
               });
        	}
          function aktif(id_hadiah){
            // alert('aktif button' + id_hadiah)
                      $.ajax({
                url:"realtime2/update.php",
                method:"POST",
                data:{aktif:id_hadiah,id_hadiah:id_hadiah},
                success:function(data)
                {
                  // alert('sukses ACTIVE');
                        $.ajax({  
                              url:"realtime2/select2.php",  
                              method:"POST",  
                              success:function(data){  
                                   $('#live_data2').html(data);  
                              }  
                         });  
                    
                }
               }); 

          }
          function disAktif(id_hadiah){
            // alert('disAktif button' + id_hadiah)
             $.ajax({
                url:"realtime2/update.php",
                method:"POST",
                data:{disaktif:id_hadiah,id_hadiah:id_hadiah},
                success:function(data)
                {
                  // alert('sukses DISAKTIF');
                     $.ajax({  
                              url:"realtime2/select2.php",  
                              method:"POST",  
                              success:function(data){  
                                   $('#live_data2').html(data);  
                              }  
                         });  
                    
                }
               }); 


          }
        </script>
      <body>  
           <div class="container"> 

           <div class="row"> 
              <!-- <?php  
                $sql = mysql_query("SELECT * FROM tb_spbu WHERE status = '1' ");
                while($data = mysql_fetch_array($sql)){
              ?>
                <div class="col-md-4" style="border: 1px solid #BABABA; margin-top: 20px;">
                  <b style="font-size: 20px;">[<?php echo $data[1]; ?>]</b>
                  <p><?php echo $data[2]; ?> | <?php echo $data[5]; ?></p>
                  <hr>
                  <table style="width: 100%; text-align: center; margin-top: -20px;">
                    <tr style="font-size: 50px; font-weight: bold;">
                      <td>
                        <?php 
                            $hadiah_awal = mysql_fetch_array(mysql_query("SELECT SUM(total_awal) FROM tb_hadiah WHERE id_spbu = '$data[0]'"));
                            echo $hadiah_awal[0];
                         ?>
                      </td>
                      <td>
                        <?php 
                            $transaksi = mysql_fetch_array(mysql_query("SELECT COUNT(id_transaksi) FROM tb_transaksi WHERE id_spbu = '$data[0]'"));
                            echo $transaksi[0];
                         ?>
                      </td>
                      <td><?php echo $hadiah_awal[0] - $transaksi[0] ?></td> 
                    </tr>
                    <tr>
                      <td>Hadiah Awal</td>
                      <td>Transaksi</td>
                      <td>Sisa Seharusnya</td>
                    </tr>
                  </table><br>
                  <div id="live_data2"></div>
                </div>
              <?php } ?> -->
              <div class="row">
              <div id="live_data2"></div>
            </div>
            </div>
                <br />  
                <br />  
                <br />  
                     <!-- <div id="live_data"></div>                  -->
                <div class="table-responsive">  
                     <!-- <h3 align="center">Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</h3><br />   -->
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  


 	$('#new_transaksi').click(function(){
 		alert('test');
 	})


  
                     // setInterval(fetch_data,1000);
                     setInterval(fetch_data2,1000);
      function fetch_data()  
      {  
           $.ajax({  
                url:"realtime2/select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data(); 

      function fetch_data2()  
      {  
           $.ajax({  
                url:"realtime2/select2.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data2').html(data);  
                }  
           });  
      }  

      fetch_data2();
      $(document).on('click', '#btn_add', function(){  
           var first_name = $('#first_name').text();  
           var last_name = $('#last_name').text();  
           if(first_name == '')  
           {  
                alert("Enter First Name");  
                return false;  
           }  
           if(last_name == '')  
           {  
                alert("Enter Last Name");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{first_name:first_name, last_name:last_name},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.first_name', function(){  
           var id = $(this).data("id1");  
           var first_name = $(this).text();  
           edit_data(id, first_name, "first_name");  
      });  
      $(document).on('blur', '.last_name', function(){  
           var id = $(this).data("id2");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "last_name");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>