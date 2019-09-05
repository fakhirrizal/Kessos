<?php
$list_indikator = explode(',',$data_master->indikator);
foreach ($indikator as $key => $in) {
?>
<table class='table table-striped table-bordered'>
    <thead>
        <tr>
            <th>Indikator Progres Fisik - <?= $in->master_indikator; ?></th>
            <th>Penjelasan Progres Fisik - <?= $in->master_indikator; ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="md-checkbox-list">
                    <?php
                    $get_indikator = $this->Main_model->getSelectedData('indikator a', 'a.*',array('a.id_master_indikator'=>$in->id_master_indikator))->result();
                    foreach ($get_indikator as $key => $value) {
                        $checked = '';
                        for ($l=0; $l < count($list_indikator); $l++) {
                            if($list_indikator[$l]==$value->id_indikator){
                                $checked = 'checked disabled';
                            }else{
                                echo'';
                            }
                        }
                    ?>
                    <div class="md-checkbox">
                        <input type="checkbox" id="<?= $value->id_indikator; ?>" value="<?= $value->id_indikator; ?>" name="indikator_progres_fisik_<?= $value->id_indikator; ?>[]" class="md-check" <?= $checked; ?>>
                        <label for="<?= $value->id_indikator; ?>">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> <?= $value->indikator; ?> </label>
                    </div>
                    <?php } ?>
                </div>
            </td>
            <td>
                <div class="md-checkbox-list">
                    <?php
                    $get_indikator = $this->Main_model->getSelectedData('indikator a', 'a.*',array('a.id_master_indikator'=>$in->id_master_indikator))->result();
                    foreach ($get_indikator as $key => $value) {
                        $nilai = '';
                        for ($l=0; $l < count($list_indikator); $l++) {
                            if($list_indikator[$l]==$value->id_indikator){
                                $get_keterangan = $this->Main_model->getSelectedData('detail_laporan_sarling_aspek_fisik a', 'a.*',array('a.indikator_progres_fisik'=>$value->id_indikator,'b.id_sarling'=>$data_master->id_sarling,'b.deleted="0"'),'b.created_at DESC','1','','',array(
                                    'table' => 'laporan_sarling b',
                                    'on' => 'a.id_laporan_sarling=b.id_laporan_sarling',
                                    'pos' => 'LEFT'
                                ))->row();
                                $nilai = 'value="'.$get_keterangan->penjelasan_progres_fisik.'" disabled';
                            }else{
                                echo'';
                            }
                        }
                    ?>
                    <div class="md-checkbox">
                        <input type="text" class="form-control" name="penjelasan_progres_fisik_<?= $value->id_indikator; ?>" placeholder="Type something" <?= $nilai; ?>>
                    </div>
                    <?php } ?>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<?php } ?>