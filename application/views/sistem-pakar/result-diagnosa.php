<a class="btn btn-success" href="<?= base_url('sistempakar') ?>">Back To Diagnosa</a>
<a class="btn btn-secondary" href="<?= base_url('') ?>">Back To Dashboard</a>
<div class="mt-3 mb-5 bg-blue">
    <?php if($this->session->flashdata('error')){ ?>
        <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error'); ?></div>
    <?php }else if($this->session->flashdata('msg')){ ?>
            <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('msg'); ?></div>
    <?php } ?>
    <?php if ($penyakit): ?>
        <h4>Berikut gejala-gejala yang dialami sang ibu : </h4>
        <ul>
        <?php foreach ($gejala as $value): ?>
            <?php echo "<li>".$value['Nama_Gejala']." (".$value['Kode_Gejala'].")"."</li>" ?>
        <?php endforeach ?>
        </ul>
        <h4>Dan ini adalah hasil diagnosa Penyakit sang ibu (: </h4>
        <?php foreach ($penyakit as $value): ?>
            <?php echo " Dengan Kode Penyakit : ".$value['Kode_Penyakit']."<br>".$value['Nama_Penyakit']."<br>";?>
        <?php endforeach ?>
        <hr>
    <?php else: ?>
         <h4>Berikut gejala-gejala yang dialami pasien: </h4>
        <?php foreach ($gejala as $value): ?>
             <?php echo "<li>".$value['Nama_Gejala']." (".$value['Kode_Gejala'].")"."</li>" ?>
        <?php endforeach ?>
    <?php endif ?>
<h4>.</h4>

</div>
