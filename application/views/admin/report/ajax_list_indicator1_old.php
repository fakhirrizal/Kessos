<label class="col-md-2 control-label" for="form_control_1"></label>
<?php
$list_indikator = explode(',',$data_master->indikator);
foreach ($indikator as $key => $i) {
?>
<div class="col-md-3">
	<h4><?= $i->master_indikator; ?></h4>
	<?php
		$data = $this->Main_model->getSelectedData('indikator a', 'a.*', array('a.id_master_indikator'=>$i->id_master_indikator))->result();
		echo'<div class="md-checkbox-list">';
			foreach ($data as $key => $value) {
				$checked = '';
				for ($l=0; $l < count($list_indikator); $l++) {
					if($list_indikator[$l]==$value->id_indikator){
						$checked = 'checked disabled';
					}else{
						echo'';
					}
				}
				echo'
				<div class="md-checkbox">
					<input type="checkbox" id="'.$value->id_indikator.'" value="'.$value->id_indikator.'" name="indikator_progres_fisik_'.$i->id_master_indikator.'[]" class="md-check" '.$checked.'>
					<label for="'.$value->id_indikator.'">
						<span class="inc"></span>
						<span class="check"></span>
						<span class="box"></span> '.$value->indikator.' </label>
				</div>
				';
			}
		echo'</div>';
	?>
</div>
<?php } ?>