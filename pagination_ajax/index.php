<HTML>
<HEAD>
<TITLE>AJAX Pagination with PHP</TITLE>
	<style>
	.link {padding: 10px 15px;background: transparent;border:#ffc925 1px solid;border-left:0px;cursor:pointer;color:#ffc925; text-decoration: none;}
	.disabled {cursor:not-allowed;color: #ffc925;}
	.current {background: #ffc925; color: black;}
	.first{border-left:#ffc925 1px solid;}
	.question {font-weight:bold;}
	.answer{padding-top: 10px;}
	#pagination{margin-top: -20px; margin-bottom: 40px;}
	.dot {padding: 10px 15px;background: transparent;border-right: #ffc925 1px solid;}
	#overlay {background-color: rgba(0, 0, 0, 0.6);z-index: 999;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;}
	#overlay div {position:absolute;left:50%;top:50%;margin-top:-32px;margin-left:-32px;}
	.page-content {padding: 20px;margin: 0 auto;}
	.pagination-setting {padding:10px; margin:5px 0px 10px;border:#ffc925  1px solid;color:#ffc925;}
	</style>
<!-- <script src="http://code.jquery.com/jquery-2.1.1.js"></script> -->
<!-- <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script> -->
<script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()},
		beforeSend: function(){$("#overlay").show();},
		success: function(data){

		$("#pagination-result").html(data);
		setInterval(function() {$("#overlay").hide(); },500);
		},
		error: function() 
		{} 	        
   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("pagination_ajax/getresult.php");
	}
}
</script>
</HEAD>
<BODY>
<!-- <div id="overlay"><div><img src="loading.gif" width="64px" height="64px"/></div></div> -->
<!-- <div class="page-content">
 -->	

	<div id="pagination-result">
	<input type="hidden" name="rowcount" id="rowcount" />
	</div>
<!-- </div> -->
<script>
getresult("pagination_ajax/getresult.php");
</script>
</BODY>
</HTML>
