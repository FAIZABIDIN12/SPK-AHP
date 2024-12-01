<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Daftar Kriteria</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#addKriteriaModal">Tambah Kriteria</button>
    
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kriteria</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kriterias as $kriteria): ?>
                <tr>
                    <td><?= $kriteria['id']; ?></td>
                    <td><?= $kriteria['nama_kriteria']; ?></td>
                    <td>
                        <button class="btn btn-secondary" data-toggle="modal" data-target="#addSubKriteriaModal<?= $kriteria['id']; ?>">Tambah Sub-Kriteria</button>
                    </td>
                </tr>

                <!-- Modal untuk menambah sub-kriteria -->
                <div class="modal fade" id="addSubKriteriaModal<?= $kriteria['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addSubKriteriaModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addSubKriteriaModalLabel">Tambah Sub-Kriteria untuk <?= $kriteria['nama_kriteria']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/kriteria/store-sub" method="post">
                                    <input type="hidden" name="kriteria_id" value="<?= $kriteria['id']; ?>">
                                    <div class="form-group">
                                        <label for="nama_sub_kriteria">Nama Sub-Kriteria:</label>
                                        <input type="text" class="form-control" name="nama_sub_kriteria" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal untuk menambah kriteria -->
    <div class="modal fade" id="addKriteriaModal" tabindex="-1" role="dialog" aria-labelledby="addKriteriaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKriteriaModalLabel">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/kriteria/store" method="post">
                        <div class="form-group">
                            <label for="nama_kriteria">Nama Kriteria:</label>
                            <input type="text" class="form-control" name="nama_kriteria" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
