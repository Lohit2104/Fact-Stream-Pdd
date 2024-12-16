<?php
session_start(); // Start session at the very beginning before any output

include('conn.php');

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id']; // Get logged-in user's ID

// Fetch user's submissions only
$sql = "SELECT id, category, picture, title, created_at FROM submissions WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = $conn->query($sql);

$submissions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $submissions[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fact Stream</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap Ecommerce Template" name="keywords">
    <meta content="Bootstrap Ecommerce Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php include("header.php");?>

    <!-- Add Button Start -->
    <div class="container my-5 text-center">
        <h2 class="text-light">Submit News or Fact</h2>
        <a href="upload.php" class="btn btn-primary">Add +</a>

        <?php if (!empty($submissions)): ?>
            <?php foreach ($submissions as $row): ?>
                <div class="fact-item">
                    <div class="fact-image">
                        <img src="<?php echo htmlspecialchars($row['picture']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="img-fluid" style="width:200px;height:200px">
                    </div>
                    <div class="fact-title">
                        <a href="fact_detail.php?id=<?php echo $row['id']; ?>" class="fact-link">
                            <h3 class="text-center"><?php echo htmlspecialchars($row['title']); ?></h3>
                        </a>
                        <p class="text-muted text-center"><?php echo htmlspecialchars(date("F d, Y", strtotime($row['created_at']))); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No submissions found.</p>
        <?php endif; ?>
    </div>
    <!-- Add Button End -->

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
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
