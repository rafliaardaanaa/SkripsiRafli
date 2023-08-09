<body class="bg-gradient-primary login-page">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="card bg-primary text-white shadow mt-4">
                <div class="card-body">
                    <center>
                        <h4><?= $profil['nama_aplikasi']; ?></h4>
                    </center>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="p-5">
                            <div class="text-center">
                                <?= $this->session->flashdata('pesan_notifikasi'); ?>
                                <img src="assets/img/<?= $profil['logo']; ?>" width="120" /><br />
                                <h1 class="h4 text-gray-900 mb-4"><?= $judul; ?></h1>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>