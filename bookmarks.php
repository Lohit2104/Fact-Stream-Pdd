<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['id'];

// Fetch bookmarks for the user
$query = $conn->prepare("
    SELECT s.id, s.picture, s.title 
    FROM submissions s 
    JOIN bookmarks b ON s.id = b.submission_id 
    WHERE b.user_id = ?
");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fact Stream - Bookmarks</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Fact Stream Bookmarks" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .bookmarks-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .bookmark {
            display: flex;
            align-items: center;
            gap: 1rem;
            border: 1px solid #ddd;
            padding: 1rem;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .bookmark-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .bookmark-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin: 0;
        }
    </style>
</head>

<body>
<?php include("header.php");?>

    <div class="container bookmarks-container">
        <h2>Your Bookmarked Submissions</h2>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($bookmark = $result->fetch_assoc()): ?>
                <div class="bookmark">
                    <img src="<?php echo htmlspecialchars($bookmark['picture']); ?>" alt="Thumbnail" class="bookmark-image">
                    <a href="fact_detail.php?id=<?php echo $bookmark['id']; ?>" class="bookmark-title">
                        <?php echo htmlspecialchars($bookmark['title']); ?>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No bookmarks found.</p>
        <?php endif; ?>
    </div>

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

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
