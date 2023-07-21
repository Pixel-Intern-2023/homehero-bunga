<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden shadow-lg">
                <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Data Admin</h5>
                    <div class="row align-items-center">
                        <div class="col-8 mb-3">

                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr class="text-dark fw-bold">
                                    <th>Profile</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data['admin'] as $admin) : ?>
                                    <tr>
                                        <td width="30"><img src="<?= BASEURL ?>/assets/images/profile/<?= empty($admin['img_profile']) ? 'nophoto.png' : $admin['img_profile'] ?>" width="100" class="rounded-circle shadow" style="aspect-ratio: 1/1;object-fit:cover;"></td>
                                        <td><?= $admin['username'] ?></td>
                                        <td><?= $admin['name'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>