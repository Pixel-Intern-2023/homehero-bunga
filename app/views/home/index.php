<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-4">
            <!-- Yearly Breakup -->
            <div class="card">
                <div class="card-body">
                    <div class="row alig n-items-start">
                        <div class="col-8">
                            <h5 class="card-title mb-9 fw-semibold">Total of Working employees</h5>
                            <h4 class="fw-semibold mb-3"><?= $data['countEmployee'] ?></h4>
                            <div class="d-flex align-items-center pb-1">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <div class="text-white bg-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-users-group" style="font-size: 40px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Yearly Breakup -->
            <div class="card">
                <div class="card-body">
                    <div class="row alig n-items-start">
                        <div class="col-8">
                            <h5 class="card-title mb-9 fw-semibold">Total of Fired employees</h5>
                            <h4 class="fw-semibold mb-3"><?= $data['countFiredEmployee'] ?></h4>
                            <div class="d-flex align-items-center pb-1">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <div class="text-white bg-danger rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user-off" style="font-size: 40px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>