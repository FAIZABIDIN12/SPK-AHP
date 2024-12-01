<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1>Data Kos</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <button class="btn btn-primary" data-toggle="modal" data-target="#addKosModal">Tambah Kos</button>

    <table class="table table-bordered mt-3" id="kosTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Description</th>
                <th>Kriteria</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kosList as $kos): ?>
                <tr>
                    <td><?= $kos['id']; ?></td>
                    <td><?= $kos['name']; ?></td>
                    <td><?= $kos['address']; ?></td>
                    <td><?= $kos['description']; ?></td>
                    <td><?= implode(', ', array_column($kos['sub_kriteria'], 'nama_sub_kriteria')); ?></td>
                    <td>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="modal fade" id="addKosModal" tabindex="-1" role="dialog" aria-labelledby="addKosModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKosModalLabel">Tambah Kos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/kos/store" method="POST" id="addKosForm">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="kriteria">Select Kriteria:</label>
                            <select name="kriteria" class="form-control" id="kriteriaSelect" onchange="loadSubKriteria(this.value)" required>
                                <option value="">Select Kriteria</option>
                                <?php foreach ($kriteriaList as $kriteria): ?>
                                    <option value="<?= $kriteria['id']; ?>"><?= $kriteria['nama_kriteria']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sub_kriteria">Select Sub-Kriteria:</label>
                            <select name="sub_kriteria[]" class="form-control" id="subKriteriaSelect" multiple required>
                                <!-- Options will be populated based on selected kriteria -->
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Kos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('change', '#kriteriaSelect', function() {
        let kriteriaId = $(this).val();
        $.ajax({
            url: '/kriteria/getSubKriteria/' + kriteriaId,
            method: 'GET',
            success: function(data) {
                let subKriteriaSelect = $('#subKriteriaSelect');
                subKriteriaSelect.empty(); // Clear existing options
                data.forEach(function(subKriteria) {
                    subKriteriaSelect.append(new Option(subKriteria.nama_sub_kriteria, subKriteria.id));
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching sub-kriteria:', textStatus, errorThrown);
            }
        });
    });
</script>

<?= $this->endSection() ?>
