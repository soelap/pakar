<a class="btn btn-secondary" href="<?= base_url('') ?>">Back</a>
<div class="mt-3 mb-5 bg-blue">
    <?php if($this->session->flashdata('error')){ ?>
        <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error'); ?></div>
    <?php }else if($this->session->flashdata('msg')){ ?>
            <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('msg'); ?></div>
        <?php } ?>
<h4>Silahkan Pilih gejala yang sesuai dengan gejala pasien.</h4>
<form action="<?= base_url('sistempakar/diagnosa_submit') ?>" method="POST">

<div class="row mt-4">
<div class="col-sm">
<?php foreach ($kiri as $value): ?>
 <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" name="fakta[]" value="<?php echo $value['Kode_Gejala'] ?>">
        <label class="form-check-label" for="gridCheck1">
             <!-- production version -->
          <!-- <?php echo $value['Nama_Gejala'] ?> -->
            <!-- testing version -->
          <?php echo $value['Kode_Gejala']." ".$value['Nama_Gejala'] ?>
        </label>
      </div>
<?php endforeach ?>    
</div>

<div class="col-sm">
<?php foreach ($kanan as $value): ?>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" name="fakta[]" value="<?php echo $value['Kode_Gejala'] ?>">
        <label class="form-check-label" for="gridCheck1">
            <!-- production version -->
          <!-- <?php echo $value['Nama_Gejala'] ?> -->
            <!-- testing version -->
          <?php echo $value['Kode_Gejala']." ".$value['Nama_Gejala'] ?>
        </label>
      </div>
<?php endforeach ?>    
<button class="btn btn-success btn-lg mt-5 margin" type="submit">Diagnostic !</button>
</div>
</div>
</form>
</div>

<style>
    label{
        font-size:16px;
        font-weight: bold;
    }
    .margin{
        margin-right: 0;
        margin-left: 0;
        /*padding-left: auto;*/
    }
</style>