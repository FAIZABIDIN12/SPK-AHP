<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>


<h1>Perbandingan Fasilitas, Harga Range, dan Jarak Range</h1>

<div class="card">
    <div class="card-header">
        <h4>Fasilitas</h4>
    </div>
    <div class="card-body">
        <table id="kosTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Fasilitas</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($fasilitas as $f): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($f['name']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Harga Range</h4>
    </div>
    <div class="card-body">
        <table id="hargaRangeTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Range Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($harga_ranges as $hr): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($hr['range']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Jarak Range</h4>
    </div>
    <div class="card-body">
        <table id="jarakRangeTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Range Jarak</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($jarak_ranges as $jr): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($jr['range']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#kosTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true
    });
});
</script>
<?= $this->endSection() ?>
