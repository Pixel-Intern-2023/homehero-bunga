<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden shadow-lg">
                <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Data Employee</h5>
                    <div class="row align-items-center">
                        <div class="col-8 mb-3">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add Employee <i class="ti ti-plus"></i>
                            </button>
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
                                    <th>Name</th>
                                    <th>Occupation</th>
                                    <th>Employee Status</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data['employee'] as $employee) : ?>
                                    <tr class="<?= ($employee['status'] === 'Working') ? 'text-dark fw-bold' : ''; ?> ?> ">
                                        <td class="text-center"><img src="<?= BASEURL ?>/assets/images/profile/<?= empty($employee['img_profile']) ? 'nophoto.png' : $employee['img_profile'] ?>" width="100" class="rounded-circle shadow" style="aspect-ratio: 1/1;object-fit:cover; <?= ($employee['status'] === 'Fired') ? 'filter: grayscale(1)' : '';  ?> " loading="lazy"></td>
                                        <td><?= $employee['name'] ?></td>
                                        <td><?= $employee['occupation'] ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-<?= ($employee['status'] === 'Working') ? 'primary' : 'dark'; ?> rounded-pill" data-bs-toggle="button"><?= $employee['status'] ?></button>
                                        </td>
                                        <td>
                                            <a href="<?= BASEURL; ?>employee/detail/<?= $employee['id_employee'] ?>" class="btn btn-primary"><i class="ti ti-eye"></i></a>
                                            <a href="<?= BASEURL; ?>employee/delete/<?= $employee['id_employee'] ?>" id="btn-delete" class="btn btn-danger"><i class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>employee/add" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Occupation</label>
                                            <select class="form-select" aria-label="Default select example" name="occupation" required>
                                                <option value="" selected>Select Occupation</option>
                                                <?php
                                                foreach ($data['occupation'] as $occupation) :
                                                ?>
                                                    <option value="<?= $occupation['id_Occupation'] ?>" required><?= $occupation['occupation'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1" class="form-label">Salary</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" name="salary">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                                    <textarea class="form-control" placeholder="Add Description" id="floatingTextarea" name="desc"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Profile Image</label>
                                <input class="form-control" type="file" id="formFile" id="input" name="img">
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