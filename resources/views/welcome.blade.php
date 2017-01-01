@extends('master')

@section('title')
ShVaD
@endsection

@section('body')
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">ShVaD</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#platform">Platform</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="signin">Sign In</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="images/logo.png" alt="">
                    <div class="intro-text">
                        <span class="name">ShVaD@ECNU</span>
                        <hr class="star-light">
                        <span class="skills"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="platform">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Platforms</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-6 platform-item">
                    <a href="#platformModal1" class="platform-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="images/rstudio.jpg" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-6 platform-item">
                    <a href="#platformModal2" class="platform-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="images/jupyter.jpg" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <p align="justify">As a leading promoter of R and statistical analysis at the age of big data, ShVaD established a training platform to foster data engineers, data analysts and data scientists in the future. It not only provides a unified learning and teaching environment of R and Python, Rstudio server and Hadoop/Cloudera, but also provide well-maintained supplementary slides, videos and data sets. Registered VIP trainees have the priority of using ShVaD training videos and slides, and obtaining hands-on instructions from the  ShVaD lecturer team.</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-6">
                        <h3>Location</h3>
                        <p>500 Dongchuan Rd
                            <br>Minhang, Shanghai, China</p>
                    </div>
                    <div class="footer-col col-md-6">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; ShVaD 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- platform Modals -->
    <div class="platform-modal modal fade" id="platformModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>RStudio</h2>
                            <hr class="star-primary">
                            <img src="images/rstudio-web.png" class="img-responsive img-centered" alt="">
                            <p align="justify">From RStudio, you can establish R, markdown, RMarkdown and RSweave files to do data analysis as usual or do literate statistical data programming to produce reproducible documents and reports with the help of R, markdown and TeX.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="platform-modal modal fade" id="platformModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Jupyter Notebook</h2>
                            <hr class="star-primary">
                            <img src="images/jupyter-web.png" class="img-responsive img-centered" alt="">
                            <p align="justify">The Jupyteer Notebook is a web application that allows you to create and share documents that contain live code, equations, visualizations and explanatory text. Uses include: data cleaning and transformation, numerical simulation, statistical modeling, machine learning and much more. With the help of Jupyter Notebook, we provide you a combined interactive data science environment either in R or Python.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
