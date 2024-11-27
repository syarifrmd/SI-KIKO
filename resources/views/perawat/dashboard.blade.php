<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pasien</title>
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css"  />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div class="wrapper"> 
        <!--NAVBAR-->
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt" ></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">RUMAH SAKIT KIKO</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Perawat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Pasien</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Pasien</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Informasi Pasien
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Input Data Pasien</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Input Rekam Medis Pasien</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
              <!--  <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>-->
            </ul>
            <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </aside>
        <!--navbar-->
        <!--MAIN-->
        <div class="main p-3">
              <div class="text-center">
                <h1>
                    Input Data Pasien
                </h1>
              </div>
            
              <div class="mb-3">
                <form>
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" placeholder="Nama Pasien">
              </div>
              <div class="mb-3">
                <label for="dob" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" id="dob" placeholder="DD-MM-YYYY">
              </div>
              <div class="mb-3">
                <label for="sex" class="form-label">Kelamin</label>
                <select class="form-select" aria-label="Default select example">
                <option selected>None</option>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
              </select>
              </div>
              <div class="mb-3">
                <label for="location" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="location" placeholder="Ds. Ketanggi RT02/RW01">
              </div>
              <div class="mb-3">
                <label for="number" class="form-label">Nomor Rekam Medis</label>
                <input type="text" class="form-control" id="number" placeholder="69">
              </div>
              <div class="mb-3">
                <label for="bio" class="form-label">Diagnosis</label>
                <textarea class="form-control" id="bio" rows="3" placeholder="Diagnosis pasien..."></textarea>
              </div>
              <button type="submit" class="form-control">Simpan Data</button>
            </form>
        </div>
        <!--main-->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{asset('js/navbar.js')}}" type="text/javascript" ></script>
</body>

</html>