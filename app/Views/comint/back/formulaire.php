<?php $this->layout('comint/layout', ['title' => $title, 'slider'=>false]) ?>


<?php $this->start('main_content') ?>
	
	<!-- row fluid slider --> 
		<div class="container" style="overflow: hidden;">
			<div class="row">

				<div class="col-xs-12   padTop">					
					<h1>Enoyer un fichier json</h1>
				</div>

				<div class="col-xs-12 containerForm contour">

					<form enctype="multipart/form-data" action="http://localhost/~joannesceyrat/www/temp/wf3/test-ceyrat/public/maintenance" method="post">
					<input type="hidden" name="MAX_FILE_SIZE" value="30000" />

					<div class="form-group">
					    <label for="exampleInputFile">Fichier jSon</label>
					    <input type="file" name="lejs">
					    <p class="help-block">Fichier au format Json</p>
					</div>
					  
					<button type="submit" class="btn btn-default">Submit</button>
					
					</form>

				</div>

			</div>
		</div>


	

<?php $this->stop('main_content') ?>
