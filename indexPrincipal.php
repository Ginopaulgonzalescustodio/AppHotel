<?php
$label=$_GET['label']; 
if($label==null){ 
header('Location: /index.php');
}?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><?=$label?></li>
			</ol>
		</div>	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h3><?=$label?><a href="#" id="btn-Nuevo" onclick="nuevo('<?=$label?>')"><img src="img/add.png" alt="Nuevo" align="right" title="Nuevo" width="30px" height="30px"/></a></h3></div>
						<div class="col-lg-4">
							<span class="input-group-btn"></span>
						</div>
						<div class="panel-body">
							<table data-toggle="table" id="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							</table>
						</div>
				</div>
			</div>
		</div>
	</div>