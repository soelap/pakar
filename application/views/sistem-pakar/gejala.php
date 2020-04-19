<a class="btn btn-secondary" href="<?= base_url('') ?>">Back</a>
<div class="mt-3 mb-5 bg-blue">
<table id="table_id" class="display ">
    <thead>
        <tr>
            <th scope="row" width="2">No</th>
            <th scope="row">Kode Penyakit</th>
            <th scope="row">Penyakit</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach ($gejala as $value) : ?>
        <tr>
            <td><?= $i ?>.</td>
            <td><?= $value['Kode_Gejala'] ?></td>
            <td><?= $value['Nama_Gejala'] ?></td>
        </tr>
       <?php $i++; endforeach; ?>
    </tbody>
</table>
</div>