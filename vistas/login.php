<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso UDOP - HEP</title>
    <link rel="icon" type="image/x-icon" href="../public/img/icons/icon-48x48.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../public/css/stylelogin.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <div class="container-fluid  ">
                       <div class="row g-2 align-items-center vh-100">
                         <div class="col-md-6 animate__animated animate__fadeInLeft">
                          <div class="col-md text-center">
                            <div class="img-fluid " >
                              <img src="../public/img/imagen de login2.JPG" width="40% " height="40%" alt="...">
                            </div>
                            <h1 > Unos clics más para entrar a su cuenta</h1>
                            <h4> Gestione todos tus trabajos UDOP desde aquí</h4>
                          </div>
                        </div>
                         <div class="col-md-6 animate__animated animate__fadeInRight border-start  ">
                          <div class="col-md  text-center  ">
                              <h1 class="text-dark">Sistema Gestor de Videos de Capacitación UDOP</h1>
                              <br><br><br>
                               <div class="row justify-content-around align-items-center">
                               <div class="col-auto">

                                <form class="g-3 needs-validation " method="post" id="frmAccesos"  >
                                         
                                        <div  class=" col-md  ">
                                          <div class="input-group p-2">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                              <i class="bi bi-person-square "></i>
                                            </span>
                                            <input type="text" class="form-control" id="loginacc" name="loginacc" placeholder="Usuario@xxxxx.xx" autocomplete="off" required>
                                          </div>
                                        </div>

                                        <br>
                                         
                                        <div  class=" col-md  ">
                                          <div class="input-group p-2">
                                            <span class="input-group-text" id="inputGroupPrepend">
                                              <i class="bi bi-key-fill"></i>
                                            </span>
                                            <input type="password" class="form-control "  id="claveacc" name="claveacc" placeholder="Password" autocomplete="off" required>
                                          </div>
                                        </div>



                                        
                                                                               
                                        <br>
                                        <div >
                                          <input type="submit" class="btn btn-primary" value="Acceder" id="acceder" name = "acceder">
                                          
                                        </div>
                                  </form>
                                  
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
               
   
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="text/javascript" src="scripts/accionlogin.js"></script>
</body>
</html>