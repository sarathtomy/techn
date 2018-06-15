<?php
	if($_POST){// file uploading is handled in same file you can put this in seperate file
		
		sleep(2);//simulate 2 seconds delay to show progressbar for atleast 2 soconds+
		
		//minimum file upload and extension validation
		if(isset($_FILES) && !empty($_FILES['file']['name'])){
			$allowed_ext = array('jpg','mov');
			$filename = $_FILES['file']['name'];
			$ext = explode('.',$filename);
			$ext = end($ext);
			if(in_array($ext,$allowed_ext)|| 1==1){
				move_uploaded_file($_FILES['file']['tmp_name'],'uploaded.'.$ext);
				echo 'uploaded.'.$ext;
			}else{
				echo 'ERROR: Only jpg and png files are supported';
			}
		}else{
			echo 'ERROR: file not provided';
		}
		exit;
	}//end if post
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ajax file upload with progres bar</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>
        <script type="text/javascript" src="script.js"></script>
		<style>
			
			.thumbnail{
				display:inline-block;
				margin:10px auto;
				width:300px;
			}
			.thumbnail,.progress,#error{
				display:none;
			}
		</style>
    </head>
    <body>
        <div class="container">	
			<h1>Pure Jquery and ajax Image upload with progressbar</h1>
			<p class="text-center">Find more such handy snippets at <a href="http://www.codingsips.com">www.CodingSips.com</a></p>
			<div class="jumbotron">
				<a class="btn btn-info btn-xs pull-right" href="http://demo.alampk.com/jquery-ajax-file-upload-progressbar/jquery-ajax-file-upload-progressbar.zip">Download source code</a>
				<br>
				<form id="frm" action="index.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" id="txtTitle" name="txtTitle" placeholder="optional text field to show posting data along with image" />
					</div>
					<div class="form-group">
						<label>Select Image to upload</label>
						<input type="file" class="form-control" id="txtFile" name="txtFile"  multiple="multiple"/>
					</div>
					
					<div class="preview text-center">
						<div class="thumbnail">
							<img alt="image preview" id="img-preview" />
						</div>
						
						<div class="progress">
						  <div class="progress-bar" id="progressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:40%">
							70%
						  </div>
						</div>
						
						<div class="alert alert-danger" id="error"></div>
					</div>
					
					<div class="form-group">
						<label>&nbsp;</label>
						<input type="submit" class="btn btn-success" id="btnUpload" value="Upload Image" />
					</div>
					
				</form>
				
			</div>
		</div>
    </body>
</html>
