<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Account - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb2/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb2/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('sb2/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sb2/js/demo/chart-pie-demo.js') }}"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.body.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.body.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1><b>Edit Your Account!!</b></h1>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <!-- Account -->
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center">
                                        <img
                                          src="{{ (!empty($admindata->profile_image))? url('upload/admin_images/', $admindata->profile_image):url('upload/undraw_profile.svg')}}"
                                          alt="user-avatar"
                                          class="d-block rounded"
                                          height="100"
                                          width="100"
                                          id="uploadedAvatar"
                                        />
                                        <form method="POST" action="{{ route('upload', $admindata->id) }}" id="formAccountSettings" enctype="multipart/form-data"  >
                                            @csrf
                                        <div class="button-wrapper  ">
                                          <label for="upload" class="btn btn-primary ml-5 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input
                                              type="file"
                                              id="upload"
                                              class="account-file-input"
                                              hidden
                                              name="image"
                                              accept="image/png, image/jpeg"
                                            />
                                          </label>
                                          {{-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                          </button> --}}

                                          <p class="text-muted mb-0 ml-5 ">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        </div>
                            </div>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body">

                                    <div class="row">
                                      <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}" autofocus="">
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control" type="text" name="username" id="username" value="{{ Auth::user()->username }}">
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control" type="email" id="email" name="email" value="{{ Auth::user()->email }}">
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                          <span class="input-group-text">ID (+62)</span>
                                          <input type="text" id="phoneNumber" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                                        </div>
                                      </div>
                                      <div class="mb-3 col-md-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="textarea" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}">
                                      </div>
                                    </div>
                                    <div class="mt-2">
                                      <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                      <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                  </form>
                                </div>
                                <!-- /Account -->
                              </div>
                        </div>
                    </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.body.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
