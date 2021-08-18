<div class="container">
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary mt-3">
        <a class="navbar-brand mb-0 h1" href="https://www.news.detik.com">CMS news.detik.com</a>
    </nav>

    <h1 class="text-center">Data XML dari news.detik.com</h1>

    <a class="btn btn-success btn-block" href="<?= base_url() ?>dashboard/getDataXML"><i class="fas fa-sync"></i> Ambil Data XML</a>

    <div class="d-flex justify-content-center my-3">
        <a href="<?= base_url() ?>dashboard/addForm" class="btn btn-success">Tambah Data Manual</a>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Waktu</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tautan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($xml as $x) :
            ?>
                <tr>
                    <th scope="row"> <?php echo $no; ?> </th>
                    <td><?php echo $x['judul']; ?></td>
                    <td>
                        <?php
                        echo date("d/M/Y H:i", strtotime($x['waktu'])); ?></td>
                    <td><?php echo $x['deskripsi']; ?></td>
                    <td><?php echo $x['tautan']; ?></td>
                    <td>
                        <a class="btn btn-success my-1" href="<?php echo $x['tautan']; ?>" target="_blank"><i class="far fa-eye"></i></a>

                        <a class="btn btn-warning my-1" href="<?php echo base_url('dashboard/editForm/') . $x['id_xml']; ?>"><i class="far fa-edit"></i></a>

                        <a class="btn btn-danger my-1" href="<?php echo base_url('dashboard/delete/') . $x['id_xml']; ?>" onclick="javacript:return confirm('Anda yakin menghapus berita ini?')"><i class="fas fa-trash"></i></a>

                    </td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</div>