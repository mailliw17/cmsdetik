</body>

</html>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="<?= base_url() ?>vendor/bootstrap/jquery-3.6.0.min.js"></script>
<script src="<?= base_url() ?>vendor/bootstrap/bootstrap.bundle.min.js"></script>

<!-- Fontawesome Script -->
<script src="<?= base_url() ?>vendor/fontawesome/js/all.min.js"></script>

<!-- Sweetalert -->
<script src="<?= base_url() ?>vendor/sweetalert2.all.min.js"></script>

<?php if ($this->session->flashdata('delete')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Berita Berhasil Dihapus',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berita-baru')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Berita Berhasil Dibuat',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berita-edit-berhasil')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Berita Berhasil Diedit',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>