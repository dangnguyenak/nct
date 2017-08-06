<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Demo</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/audioplayerengine/initaudioplayer-1.css">
    

    
  </head>

  <body>

    <div class="container">
		
		<div class="panel panel-primary" style="margin-top: 20px;">
		  <div class="panel-heading">Demo Get Link NhacCuaTui.Com</div>
		  <div class="panel-body">
		    <form class="form-horizontal" action="" method="POST">
				<fieldset>
				<div class="form-group">
				  <div class="col-md-10">
				  <input id="url" name="url" placeholder="Nhập link Bài hát của NhacCuaTui" class="form-control input-md" value="http://www.nhaccuatui.com/bai-hat/yeu-la-tha-thu-em-chua-18-ost-onlyc.vmjlLAAxhof5.html" type="text">
				  </div>
				  <div class="col-md-2">
				    <button id="Submit" name="submit" value="submit" class="btn btn-primary">Get link</button>
				    <button id="reset" name="reset" class="btn btn-danger">Reset</button>
				  </div>
				</div>
				</fieldset>
				</form>
				<p id="img-loading" align="center"></p>
				

			
			<div class="row">
				<div class="col-md-12" style="text-align: center;" id="result">
					<!--  -->
				</div>
			</div>
			
			</div>
			
		  </div>

      <footer class="footer">
        
      </footer>

    </div> <!-- /container -->

<script src="assets/jquery.min.js"></script>
<script src="assets/audioplayerengine/amazingaudioplayer.js"></script>
<script src="assets/audioplayerengine/initaudioplayer-1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#reset').click(function(e){
			var link = $('#url').val();
			e.preventDefault();
			$('input[type=text]').val('');
			$('#result').empty();
			// alert("jaja");
			link = '';
		});
		$('#Submit').on('click',function(e){
			var link = $('#url').val();	
			e.preventDefault();
			$('#result').empty();
			// alert(link);
			$('#img-loading').html('<img src="load.gif">').show();
			$.ajax({
				url: 'get.php',
				type: 'POST',
				data: {
					url: link,
				},
				success:function(data){
					$('#img-loading').hide();
					$('#result').append(data);
				}
			});
		});
	});
</script>	
	


  </body>
</html>





