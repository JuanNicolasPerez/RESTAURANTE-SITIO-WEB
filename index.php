<?php
    include("admin/bd.php");

    // MOSTRAR BANNERS
    $sentencia = $conexion->prepare("SELECT * FROM tbl_banners ORDER BY id DESC limit 1");
    $sentencia->execute();

    $lista_banners = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

    // MOSTRAR COLABORADORES
    $sentencia = $conexion->prepare("SELECT * FROM tbl_colaboradores ORDER BY id DESC limit 3");
    $sentencia->execute();

    $tbl_colaboradores = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

    // MOSTRAR TESTIMONIOS
    $sentencia = $conexion->prepare("SELECT * FROM tbl_testimonios ORDER BY id DESC limit 3");
    $sentencia->execute();

    $tbl_testimonios = $sentencia -> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Yunino</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

        <!-- Stylesheet
        ================================================== -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
        <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <!-- Navigation-->
        <section>
            <nav id="menu" class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand page-scroll" href="#page-top">Yunino</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#about" class="page-scroll">Testimonios</a></li>
                            <li><a href="#restaurant-menu" class="page-scroll">Menu</a></li>
                            <li><a href="#portfolio" class="page-scroll">Galeria</a></li>
                            <li><a href="#team" class="page-scroll">Chefs</a></li>
                            <li><a href="#call-reservation" class="page-scroll">Contacto</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </nav>
        </section>

        <!-- Banners -->
        <section>
            <header id="header">
                <div class="intro">
                    <div class="overlay">
                        <div class="container">
                            <div class="row">
                                <div class="intro-text">
                                    <?php 
                                        foreach ($lista_banners as $key => $banners) {
                                    ?>
                                            <h1><?php echo $banners['titulo'];?></h1>
                                            <p><?php echo $banners['descripcion'];?></p>
                                            <a href="<?php echo $banners['link'];?>" class="btn btn-custom btn-lg page-scroll">Nuestra historia</a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </section>

        <!-- Sobre nosotros Section -->
        <section>
            <div id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 ">
                            <div class="about-img"><img src="img/about.jpg" class="img-responsive" alt=""></div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="about-text">
                                <h2>Testimonios</h2>
                                <hr>
                                <?php 
                                    foreach($tbl_testimonios as $testimonio){
                                ?>
                                        <h3><?php echo $testimonio['nombrecompleto']; ?></h3>
                                        <div class="card-body">
                                            <p class="card-text"><?php echo $testimonio['opinion']; ?></p>
                                        </div>
                                <?php   
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Restaurant Menu Section -->
        <section>
            <div id="restaurant-menu">
                <div class="section-title text-center center">
                    <div class="overlay">
                        <h2>Menu</h2>
                        <hr>
                        <p>Elige el plato que mas te guste.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="menu-section">
                                <h2 class="menu-section-title">Breakfast & Starters</h2>
                                <hr>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $35 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="menu-section">
                                <h2 class="menu-section-title">Main Course</h2>
                                <hr>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $45 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="menu-section">
                                <h2 class="menu-section-title">Dinner</h2>
                                <hr>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $45 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $350 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="menu-section">
                                <h2 class="menu-section-title">Coffee & Drinks</h2>
                                <hr>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $35 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-item-name"> Delicious Dish </div>
                                    <div class="menu-item-price"> $30 </div>
                                    <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section>
            <div id="portfolio">
                <div class="section-title text-center center">
                    <div class="overlay">
                        <h2>Gallery</h2>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="categories">
                            <ul class="cat">
                                <li>
                                    <ol class="type">
                                        <li><a href="#" data-filter="*" class="active">All</a></li>
                                        <li><a href="#" data-filter=".breakfast">Breakfast</a></li>
                                        <li><a href="#" data-filter=".lunch">Lunch</a></li>
                                        <li><a href="#" data-filter=".dinner">Dinner</a></li>
                                    </ol>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="portfolio-items">
                            <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/01-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/01-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 dinner">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/02-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/02-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/03-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/03-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/04-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/04-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 dinner">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/05-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/05-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 lunch">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/06-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/06-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 lunch">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/07-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/07-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/08-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/08-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 dinner">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/09-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/09-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 lunch">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/10-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/10-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 lunch">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/11-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/11-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                                <div class="portfolio-item">
                                    <div class="hover-bg"> <a href="img/portfolio/12-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                                            <div class="hover-text">
                                                <h4>Dish Name</h4>
                                            </div>
                                            <img src="img/portfolio/12-small.jpg" class="img-responsive" alt="Project Title">
                                        </a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Chefs Section -->
        <section>
            <div id="team" class="text-center">
                <div class="overlay">
                    <div class="container">
                        <div class="col-md-10 col-md-offset-1 section-title">
                            <h2>Nuestros Chefs</h2>
                            <hr>
                            <p></p>
                        </div>
                        <div id="row">
                            <?php foreach ($tbl_colaboradores as $value) {?>
                                    <div class="col-md-4 team">
                                        <div class="thumbnail">
                                            <div class="team-img">
                                                <img src="img/team/<?php echo $value['foto'];?>" alt="...">
                                            </div>
                                            <div class="caption">
                                                <h3><?php echo $value['titulo'];?></h3>
                                                <p><?php echo $value['descripcion'];?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call Reservation Section -->
        <section>
            <div id="call-reservation" class="text-center">
                <div class="container">
                    <h2>YA REALIZASTE TU PEDIDO! Tel <strong>(+54) 0000-000000</strong></h2>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section>
            <div id="contact" class="text-center">
                <div class="container">
                    <div class="section-title text-center">
                        <h2>Contacto</h2>
                        <hr>
                        <p>Envianos tu consulta.</p>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <form action="?" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="name" class="form-control" placeholder="Nombre" required="required">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" id="email" class="form-control" placeholder="Email" required="required">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Mensaje" required></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div id="success"></div>
                            <button type="submit" class="btn btn-custom btn-lg">Enviar mensaje</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer -->
        <section>
            <div id="footer">
                <div class="container text-center">
                    <div class="col-md-4">
                        <h3>Direccion</h3>
                        <div class="contact-item">
                            <p>Hipolito Irigoyen,</p>
                            <p>Garupa, CP 3304</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3>Nuestros Horario</h3>
                        <div class="contact-item">
                            <p>Lun-Vie: 18:00 PM - 01:00 AM</p>
                            <p>Sab: 18:00 PM - 03:00 AM</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3>Contacto Info</h3>
                        <div class="contact-item">
                            <p>Phone: +54 000 0000000</p>
                            <p>Email: yunino@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="container-fluid text-center copyrights">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        <p>&copy; 2024 Yunino. Todos los derechos reservados <a href="#" rel="nofollow">Yunino</a></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- script -->
        <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        <script type="text/javascript" src="js/nivo-lightbox.js"></script>
        <script type="text/javascript" src="js/jquery.isotope.js"></script>
        <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
        <script type="text/javascript" src="js/contact_me.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>

</html>