<html>
      <head>
           <title>Live Table Data Edit</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      </head>
        <script type="text/javascript">
          function aktif(id_hadiah){
            // alert('aktif button' + id_hadiah)
                      $.ajax({
                url:"detail_information/update.php",
                method:"POST",
                data:{aktif:id_hadiah,id_hadiah:id_hadiah},
                success:function(data)
                {
                  // alert('sukses ACTIVE');
                        $.ajax({
                              url:"detail_information/select2.php",
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
                url:"detail_information/update.php",
                method:"POST",
                data:{disaktif:id_hadiah,id_hadiah:id_hadiah},
                success:function(data)
                {
                  // alert('sukses DISAKTIF');
                     $.ajax({
                              url:"detail_information/select2.php",
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
              <h3>Detail Live Tracking</h3>
              <div id="live_data2"></div>
              <div id="live_data" style="margin-top: 25px;"></div>
            </div>
                <br />
                <br />
                <br />
                <div class="table-responsive">
                     <!-- <h3 align="center">Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</h3><br />   -->
                </div>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){




                     // setInterval(fetch_data,2000);
                     // setInterval(fetch_data2,1000);
      function fetch_data()
      {
           $.ajax({
                url:"detail_information/select.php",
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
                url:"detail_information/select2.php",
                method:"POST",
                success:function(data){
                     $('#live_data2').html(data);
                }
           });
      }

      fetch_data2();




 });
 </script>
