 
  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../public/img/icons/icon-48x48.png">
    <title>Admin - UDOP - HEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--Estilos Datatable bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <!--Estilos iconos font awesome 

	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!--css admintle-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  </head>

  <style>
    .fondo{
     background-color:#ffffe0 ; 
    }
  </style>

  <body>
  
    
  <main>
    <div class="container-fluid"  >
           
    
    
          <!-- Navbar -->
          <nav class="navbar navbar-expand bg-body-tertiary">
              <div class="container-fluid">
                <a class="navbar-brand" href="mantenedor.php">
                  <img src="../public/img/solo_pino.JPG" alt="Logo" width="40" height="45" class="d-inline-block align-text-top">
                  <span class="brand-text font-weight-dark text-justify text-primary">Admin-UDOP-HEP</span>
                </a>
              </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones
                      </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="videos.php">Modulo Videos  </a></li>
                      <li><a class="dropdown-item" href="curso.php">Modulo Cursos  </a></li>
                      <li><a class="dropdown-item" href="usuario.php">Modulo Usuarios</a></li> 
                    </ul>
                    </li>
                  
                  </ul>
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                       <i class="fas fa-expand-arrows-alt"></i>
                      </a>
                    </li>
                    <!-- Sidebar user panel (optional) -->
                    <div class="image">
                     <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>"  class="img-circle elevation-2" width="30px" height="30px" alt="User Image">
                     
                    </div>
                    <ul class="nav navbar-nav ms-auto">
                       <li class="nav-item dropdown">
                           <a href="#" class="nav-link active Primary " data-bs-toggle="dropdown">
                             <?php echo $_SESSION['nombre']; ?>
                           </a>
                           <div class="dropdown-menu dropdown-menu-end">
                               <a href="#" class="dropdown-item"><i class="bi bi-person"></i><small> Mi Perfil</small></a>
                               <a href="#" class="dropdown-item"><i class="bi bi-envelope"></i><small>  Inbox</small></a>
                               <a href="#" class="dropdown-item"><i class="bi bi-sliders2"></i><small>  Configuracion</small></a>
                               <a href="#" class="dropdown-item"><i class="bi bi-info"></i><small> Ayuda</small></a>
                               <a href="#" class="dropdown-item"> <small>Acerca de..</small></a>
                               <div class="dropdown-divider"></div>
                               <a href="../ajax/video.php?op=salir" class="dropdown-item">Cerrar Sesion <i class="bi bi-box-arrow-right"></i></a>
                           </div>
                       </li>
                   </ul>
                    <!-- fin Sidebar user panel (optional) -->
                  </ul>
                </div>
              </div>
            </nav>

          <!--  <nav class="main-header navbar navbar-expand navbar-white navbar-light fondo" >
               Left navbar links 
              <a href="mantenedor.php" class="brand-link">
                <img src="../public/img/solo_pino.JPG" alt=" " class="brand-image img-circle elevation-3"   style="opacity: .8">
                <span class="brand-text font-weight-dark text-justify text-primary">Admin-UDOP-HEP</span>
              </a>-->
               <!-- Right navbar links 
              <ul class="navbar-nav ml-auto">-->
                  <!-- Sidebar user panel (optional) 
                   <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link active Primary " data-bs-toggle="dropdown">
                          <?php //echo $_SESSION['nombre'] ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item"><i class="bi bi-person"></i><small> Mi Perfil</small></a>
                            <a href="#" class="dropdown-item"><i class="bi bi-envelope"></i><small>  Inbox</small></a>
                            <a href="#" class="dropdown-item"><i class="bi bi-sliders2"></i><small>  Configuracion</small></a>
                            <a href="#" class="dropdown-item"><i class="bi bi-info"></i><small> Ayuda</small></a>
                            <a href="#" class="dropdown-item"> <small>Acerca de..</small></a>
                            <div class="dropdown-divider"></div>
                            <a href="../ajax/video.php?op=salir" class="dropdown-item">Cerrar Sesion <i class="bi bi-box-arrow-right"></i></a>
                        </div>
                    </li>
                </ul>-->
                 <!-- fin Sidebar user panel (optional) 
               </ul>
            </nav>-->
            <!-- /.navbar -->
             <!-- Main Sidebar Container(barra Lateral) -->
             <!-- Content Wrapper. Contains page content -->
            <div class="container-fluid"  >


            <?php
 