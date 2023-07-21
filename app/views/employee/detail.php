<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden shadow-lg">
                <div class="card-body p-4">
                    <a href="<?= BASEURL; ?>employee/">
                        <h5 class="card-title mb-9 fw-semibold"><i class="ti ti-chevron-left"></i>Detail Profile</h5>
                    </a>
                    <div class="row align-items-center">
                        <div class="col-4 mb-3 text-center">
                            <img src="<?= BASEURL ?>/assets/images/profile/<?= empty($data['employee']['img_profile']) ? 'nophoto.png' : $data['employee']['img_profile'] ?>" width="300" class="rounded-circle shadow-lg" style="aspect-ratio: 1/1;object-fit:cover;<?= ($data['employee']['status'] === 'Fired') ? 'filter: grayscale(1)' : '';  ?> ">
                            <button type="button" class="btn btn-warning mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Edit Profile Employee <i class="ti ti-edit"></i>
                            </button>
                        </div>
                        <div class=" col-8">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-dark fw-bold" width="20%">Name</th>
                                    <td><?= $data['employee']['name'] ?></td>
                                </tr>
                                <tr>
                                    <th class="text-dark fw-bold">Occupation</th>
                                    <td><?= $data['employee']['occupation'] ?></td>
                                </tr>
                                <tr>
                                    <th class="text-dark fw-bold">Salary</th>
                                    <td>Rp.<?= number_format($data['employee']['salary']) ?></td>
                                </tr>
                                <tr>
                                    <th class="text-dark fw-bold">Description</th>
                                    <td><?= $data['employee']['description'] ?></td>
                                </tr>
                                <tr>
                                    <th class="text-dark fw-bold">Status</th>
                                    <td>
                                        <button type="button" class="btn btn-<?= ($data['employee']['status'] === 'Working') ? 'primary' : 'dark'; ?> rounded-pill" data-bs-toggle="button"><?= $data['employee']['status'] ?></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-dark fw-bold">Action</th>
                                    <td>
                                        <form id="form-status" action="<?= BASEURL; ?>employee/status/<?= $data['employee']['id_employee'] ?>" method="POST">
                                            <input type="hidden" name="id_status" value="<?= ($data['employee']['status'] === 'Working') ? '2' : '1';  ?>">
                                            <button type="submit" class="btn btn-<?= ($data['employee']['status'] === 'Working') ? 'dark' : 'success';  ?> rounded-pill" id="btn-status" data-status=<?= ($data['employee']['status'] === 'Working') ? 'Fire' : 'Hire'; ?>><?= ($data['employee']['status'] === 'Working') ? 'Fire' : 'Hire'; ?></button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-edit" action="<?= BASEURL; ?>employee/edit/<?= $data['employee']['id_employee'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?= $data['employee']['name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Occupation</label>
                                            <select class="form-select" aria-label="Default select example" name="occupation">
                                                <option value="<?= $data['employee']['id_Occupation'] ?>"><?= $data['employee']['occupation'] ?></option>
                                                <?php
                                                foreach ($data['occupation'] as $occupation) :
                                                ?>
                                                    <option value="<?= $occupation['id_Occupation'] ?>"><?= $occupation['occupation'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Salary</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" name="salary" value="<?= $data['employee']['salary'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Add Description" id="floatingTextarea" name="desc"><?= $data['employee']['description'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Profile Image</label>
                                <img src="<?= BASEURL ?>/assets/images/profile/<?= empty($data['employee']['img_profile']) ? 'nophoto.png' : $data['employee']['img_profile'] ?>" width="200" class="rounded-circle shadow-lg mb-2" style="aspect-ratio: 1/1;object-fit:cover;<?= ($data['employee']['status'] === 'Fired') ? 'filter: grayscale(1)' : '';  ?> ">
                                <input class="form-control" type="file" id="formFile" id="input" name="img" value="<?= $data['employee']['img_profile'] ?>">
                                <input type="hidden" value="<?= $data['employee']['img_profile'] ?>" name="old_img">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-update">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>