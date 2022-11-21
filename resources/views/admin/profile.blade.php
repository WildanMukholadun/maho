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
                        <h1 class="h3 mb-0 text-gray-800"><b>Check Your Account!!</b></h1>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <!-- Account -->
                                <div class="card-body">
                                  <div class="d-flex align-items-center justify-content-center align-items-sm-center">
                                    <center>
                                        @if (Auth::user()->image  == NULL)
                                            <img
                                            src="upload/undraw_profile.svg"
                                            alt="user-avatar"
                                            class="d-block rounded"
                                            height="100"
                                            width="100"
                                            id="preview-image-before-upload"
                                        />
                                            @else
                                            <img
                                            src="/assets/img/{{ $admindata->image }}"
                                            alt="user-avatar"
                                            class="d-block rounded"
                                            height="100"
                                            width="100"
                                            id="preview-image-before-upload"
                                        />
                                            @endif
                                        {{-- <img src="{{ (!empty($admindata->profile_image))? url('upload/admin_images/', $admindata->profile_image):url('upload/undraw_profile.svg')}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id=""> --}}
                                    </center>
                                  </div>
                                </div>
                                <hr class="my-0">
                                <div class="card-body">
                                  <form id="formAccountSettings" method="POST" onsubmit="return false">
                                    <div class="row">
                                      <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}" autofocus="" disabled>
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control" type="text" name="username" id="username" value="{{ Auth::user()->username }}" disabled>
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control" type="text" id="email" name="email" value="{{ Auth::user()->email }}" disabled>
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                          <span class="input-group-text">ID (+62)</span>
                                          <input type="text" id="phoneNumber" name="phone" class="form-control" placeholder="{{ Auth::user()->phone }}" disabled>
                                        </div>
                                      </div>
                                      <div class="mb-3 col-md-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="textarea" class="form-control" id="address" name="address" placeholder="{{ Auth::user()->address }}" disabled>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <!-- /Account -->
                              </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

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
