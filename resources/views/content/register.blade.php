<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="{{ url('/storage/images/ico.png') }}">
  <title>Cadastro | {{ config('app.name') }}</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link id="pagestyle" href="{{ asset('css/styleLogin.css') }}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">

            <div class="col-xl-7 col-lg-6 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">

                <div class="card-header pb-0 text-center bg-transparent">

                  <div class="row mb-6">
                    <div class="col-12">
                      <img src="{{ url('/storage/images/logo.png') }}" class="img img-fluid" style="width: 500px;">
                    </div>
                  </div>

                  <h3 class="font-weight-bolder text-info text-gradient mb-2" style="background-image: linear-gradient(310deg, #21aeb5, #007177); font-size:25px">
                    Registre-se
                  </h3>
                  <p class="mb-0">Informe seus dados:</p>
                </div>

                <div class="card-body">

                  @if ($errors->any())
                  
                    <div class="content-wrapper container-xxl p-0">
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">Atenção</h4>
                            <div class="alert-body">
                                <ul style="list-style-type:none;margin-bottom: 0px;">
                                    @foreach ($errors->all() as $error)
                                        <li style="font-size: 12px;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                  @endif

                  <form action=" {{ route('registerApi') }}" method="post">
                    @csrf
                    <label>Nome</label>
                    <div class="mb-3">
                      <input type="name " name="name" class="form-control" placeholder="Insira o nome" :value="old('name')" aria-label="Nome" aria-describedby="name-addon">
                    </div>

                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" name="email" class="form-control" placeholder="Insira o email" :value="old('email')" aria-label="Email" aria-describedby="email-addon">
                    </div>

                    <div class="form-group">
                      <label>Senha</label>
                      <div class="input-group mb-3">
                        <input type="password" id="pass" name="password" class="form-control" placeholder="Insira sua senha" aria-label="Password" aria-describedby="password-addon" autocomplete="current-password" required>
                        <span class="input-group-text" onclick="viewpass()"><i class="far fa-eye text-secondary"></i></span>
                      </div>
                    </div>

                    {{-- 
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" checked="">
                      <label class="form-check-label" for="rememberMe">{{ __('auth.remember_me') }}</label>
                    </div>
                     --}}

                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Resgistrar</button>
                    </div>

                  </form>

                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6 back-login"></div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    function viewpass() {
      var x = document.getElementById("pass");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

  
</body>

</html>