<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2 class="mb-4">Daftar Kriteria</h2>

    <!-- Button to trigger the "Add Kriteria" modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addKriteriaModal">
        Tambah Kriteria
    </button>

    <!-- "Add Kriteria" Modal -->
    <div class="modal fade" id="addKriteriaModal" tabindex="-1" role="dialog" aria-labelledby="addKriteriaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKriteriaModalLabel">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('/kriteria/add') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Kriteria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Kriteria and Sub Kriteria Table -->
    <table id="kriteriaTable" class="table table-striped table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Sub Kriteria</th>
                <th>Action</th> <!-- Action Column -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kriterias as $index => $kriteria): ?>
                <tr>
                    <td><?= esc($index + 1) ?></td>
                    <td><?= esc($kriteria['nama_kriteria']) ?></td>
                    <td>
                        <!-- Displaying sub kriteria if exists -->
                        <?php if (!empty($kriteria['sub_kriterias'])): ?>
                            <ul>
                                <?php foreach ($kriteria['sub_kriterias'] as $sub): ?>
                                    <li><?= esc($sub['nama_sub_kriteria']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            Tidak ada sub kriteria
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- Button to trigger the "Add Sub Kriteria" modal -->
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addSubKriteriaModal<?= esc($kriteria['id']) ?>">
                            Tambah Sub Kriteria
                        </button>
                        
                        <!-- "Add Sub Kriteria" Modal -->
                        <div class="modal fade" id="addSubKriteriaModal<?= esc($kriteria['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="addSubKriteriaModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addSubKriteriaModalLabel">Tambah Sub Kriteria untuk <?= esc($kriteria['nama_kriteria']) ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= site_url('/kriteria/add-sub') ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" name="kriteria_id" value="<?= esc($kriteria['id']) ?>">
                                                <label for="nama_sub_kriteria">Nama Sub Kriteria</label>
                                                <input type="text" name="nama_sub_kriteria" id="nama_sub_kriteria" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tambah Sub Kriteria</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Button to delete Kriteria -->
                        <form action="<?= site_url('/kriteria/delete/' . esc($kriteria['id'])) ?>" method="post" style="display:inline;">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus kriteria ini beserta sub kriteria-nya?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#kriteriaTable').DataTable({
            responsive: true,
        });
    });
</script>

<?= $this->endSection() ?>
