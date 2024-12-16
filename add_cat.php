<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Upload Category - Fact Stream</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Fact Stream - Upload Category" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php include("header.php");?>

    <!-- Upload Category Form Start -->
    <div class="container my-5">
        <h1 class="text-center text-primary mb-4">Upload Category</h1>
        <form class="upload-category-form" action="cat_back.php" method="POST">
            <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
    <!-- Upload Category Form End -->

    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Useful Links</h3>
                        <ul>
                            <li><a href="#">Pellentesque</a></li>
                            <li><a href="#">Aliquam</a></li>
                            <li><a href="#">Fusce placerat</a></li>
                            <li><a href="#">Nulla hendrerit</a></li>
                            <li><a href="#">Maecenas</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Quick Links</h3>
                        <ul>
                            <li><a href="#">Posuere egestas</a></li>
                            <li><a href="#">Sollicitudin</a></li>
                            <li><a href="#">Luctus non</a></li>
                            <li><a href="#">Duis tincidunt</a></li>
                            <li><a href="#">Elementum</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Get in Touch</h3>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>123 Terry Lane, New York, USA</p>
                            <p><i class="fa fa-envelope"></i>email@example.com</p>
                            <p><i class="fa fa-phone"></i>+123-456-7890</p>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href=""><i class="fab fa-linkedin"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Newsletter</h3>
                        <div class="newsletter">
                            <p>
                                Stay updated with the latest facts and insights from Fact Stream. Subscribe to our newsletter!
                            </p>
                            <form>
                                <input class="form-control" type="email" placeholder="Your email here">
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
