<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden shadow-lg">
                <div class="card-body p-4">
                    <a href="<?= BASEURL; ?>home/">
                        <h5 class="card-title mb-9 fw-semibold"><i class="ti ti-chevron-left"></i>Detail Profile</h5>
                    </a>
                    <div class="row align-items-center">
                        <div class="col-4 mb-3 text-center">
                            <img src="<?= BASEURL ?>/assets/images/profile/<?= empty($data['admin']['img_profile']) ? 'user-1.jpg' : $data['admin']['img_profile'] ?>" width="300" class="rounded-circle shadow-lg" style="aspect-ratio: 1/1;object-fit:cover; ">
                            <button type="button" class="btn btn-warning mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Edit Profile Image <i class="ti ti-edit"></i>
                            </button>
                        </div>
                        <div class="col-8" style="margin-bottom: px;">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-dark fw-bold" width="20%">Name</th>
                                    <td><?= $data['admin']['name'] ?></td>
                                </tr>
                                <tr>
                                    <th class="text-dark fw-bold" width="20%">Usename</th>
                                    <td><?= $data['admin']['username'] ?></td>
                                </tr>
                                <tr>
                                    <th class="text-dark fw-bold" width="20%">Position</th>
                                    <td>Admin</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>admin/editProfile/<?= $data['admin']['id_admin'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <label for="exampleFormControlInput1" class="form-label">Profile Image</label>
                                <img src="<?= BASEURL ?>/assets/images/profile/<?= empty($data['admin']['img_profile']) ? 'user-1.jpg' : $data['admin']['img_profile'] ?>" width="200" class="rounded-circle shadow-lg mb-2" style="aspect-ratio: 1/1;object-fit:cover; ">
                                <input class="form-control" type="file" id="formFile" id="input" name="img" value="<?= $data['admin']['img_profile'] ?>">
                                <input type="hidden" value="<?= $data['admin']['img_profile'] ?>" name="old_img">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>