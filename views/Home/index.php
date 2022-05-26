<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<<<<<<< HEAD
  <link rel="stylesheet" href="../Header/header.css" />
  <link rel="stylesheet" href="./index.css" />
  <link rel="stylesheet" href="../Footer/footer.css" />
=======
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="../Header/header.css" />
  <link rel="stylesheet" href="./home.css" />
  <link rel="stylesheet" href="../Footer/footer.css" />
  <script src="./home.js"></script>
>>>>>>> 7281576 (Implementação parcial da home)
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet" />
  <title>Masterer</title>
</head>

<body>
<<<<<<< HEAD
  <?php include "../Header/header.php" ?>
  <div class="content">
    <div class="banner"></div>
  </div>
=======
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <?php include "../Header/header.php" ?>
  <div class="banner1 img-fluid mx-auto d-block"></div>
  <div class="content container-fluid d-flex flex-wrap">
    <div class="row">
      <div class="lancamentos">
        <div class="linha">
          <div class="button"><strong>Lançamentos</strong></div>
        </div>
      </div>
      <div id="carousel-lancamentos" class="carousel" data-bs-ride="carousel">
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-lancamentos" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <div class="carousel-inner">
          <div class="carousel-item col-3 active">
            <div class="card ">
              <img src="../../images/camiseta.png" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h5 class="card-title">Camiseta Básica</h5>
                <p class="card-text">R$200,00 <br>(ou 2x de R$9,95)</p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-3">
            <div class="card ">
              <img src="../../images/camiseta.png" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h5 class="card-title">Camiseta Básica</h5>
                <p class="card-text">R$200,00 <br>(ou 2x de R$9,95)</p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-3">
            <div class="card ">
              <img src="../../images/camiseta.png" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h5 class="card-title">Camiseta Básica</h5>
                <p class="card-text">R$200,00 <br>(ou 2x de R$9,95)</p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-3">
            <div class="card ">
              <img src="../../images/camiseta.png" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h5 class="card-title">Camiseta Básica</h5>
                <p class="card-text">R$200,00 <br>(ou 2x de R$9,95)</p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-3">
            <div class="card ">
              <img src="../../images/camiseta.png" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h5 class="card-title">Camiseta Básica</h5>
                <p class="card-text">R$200,00 <br>(ou 2x de R$9,95)</p>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-lancamentos" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="row">
      <div class="banner2 col-12"></div>
    </div>

    <div class="row">
      <div class="maisVendidos">
        <div class="linha">
          <div class="button"><strong>Mais Vendidos</strong></div>
        </div>
      </div>
      <div id="carousel-lancamentos" class="carousel" data-bs-ride="carousel">
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-lancamentos" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <div class="carousel-inner">
          <div class="carousel-item col-3 active">
            <div class="card ">
              <img src="../../images/camiseta.png" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h5 class="card-title">Camiseta Básica</h5>
                <p class="card-text">R$200,00 <br>(ou 2x de R$9,95)</p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-3">
            <div class="card ">
              <img src="../../images/camiseta.png" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h5 class="card-title">Camiseta Básica</h5>
                <p class="card-text">R$200,00 <br>(ou 2x de R$9,95)</p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-3">
            <div class="card ">
              <img src="../../images/camiseta.png" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h5 class="card-title">Camiseta Básica</h5>
                <p class="card-text">R$200,00 <br>(ou 2x de R$9,95)</p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-3">
            <div class="card ">
              <img src="../../images/camiseta.png" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h5 class="card-title">Camiseta Básica</h5>
                <p class="card-text">R$200,00 <br>(ou 2x de R$9,95)</p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-3">
            <div class="card ">
              <img src="../../images/camiseta.png" class="img-fluid mx-auto d-block">
              <div class="card-body">
                <h5 class="card-title">Camiseta Básica</h5>
                <p class="card-text">R$200,00 <br>(ou 2x de R$9,95)</p>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-lancamentos" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

>>>>>>> 7281576 (Implementação parcial da home)
  <?php include "../Footer/footer.php" ?>

  </div>
</body>

</html>