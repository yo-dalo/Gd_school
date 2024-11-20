<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Improved UI/UX</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./css/model.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/post/post.css">
  <style>
    :root {
      --main-color: #007BFF;
      --secondary-color: #6C757D;
      --background-color: #F8F9FA;
      --font-family: 'Arial', sans-serif;
      --font-size-base: 16px;
      --font-size-lg: 18px;
      --font-size-sm: 14px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: var(--font-family);
      background-color: var(--background-color);
      line-height: 1.6;
      color: #333;
      padding: 20px;
    }

    header {
      background: var(--main-color);
      color: #fff;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header nav ul {
      list-style: none;
      display: flex;
      gap: 15px;
    }

    header nav ul li {
      margin: 0;
    }

    header nav ul li a {
      color: #fff;
      text-decoration: none;
      font-size: var(--font-size-base);
    }

    .main {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table-container {
      overflow-x: auto;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background: #f4f4f4;
    }

    tbody tr:hover {
      background: #f1f1f1;
    }

    .footer {
      background: var(--main-color);
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .footer .footer-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .footer .footer-col {
      flex: 1;
      margin: 10px;
      min-width: 200px;
    }

    .footer .footer-col h4 {
      margin-bottom: 15px;
      font-size: var(--font-size-lg);
    }

    .footer .footer-col ul {
      list-style: none;
      padding: 0;
    }

    .footer .footer-col ul li {
      margin-bottom: 10px;
    }

    .footer .footer-col ul li a {
      color: #fff;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer .footer-col ul li a:hover {
      color: var(--secondary-color);
    }

    .footer .newsletter p {
      margin-bottom: 10px;
      font-size: var(--font-size-sm);
    }

    .footer .newsletter form {
      display: flex;
      gap: 10px;
    }

    .footer .newsletter input[type="email"] {
      flex: 1;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: var(--font-size-base);
    }

    .footer .newsletter button {
      padding: 10px 20px;
      background: var(--secondary-color);
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .footer .newsletter button:hover {
      background: var(--main-color);
    }

    .footer .icons {
      margin-top: 20px;
    }

    .footer .icons i {
      margin: 0 5px;
      font-size: 24px;
      cursor: pointer;
      transition: color 0.3s;
    }

    .footer .icons i:hover {
      color: var(--secondary-color);
    }
  </style>
</head>

<body>
  <header>
    <div class="logo">
      <a href="#" style="color: #fff; text-decoration: none; font-size: 24px;">Logo</a>
    </div>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
  </header>

  <div class="main">
    <div class="page_1">
      <?php
      require("./conn.php");
      require("./header.php");
      ?>

      <div class="table-container">
        <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM post WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $get_post_img_query = "SELECT * FROM Post_img WHERE post_id = '{$row['id']}'";
            $result_img = mysqli_query($conn, $get_post_img_query);
            if (mysqli_num_rows($result_img) > 0) {
              while ($img_row = mysqli_fetch_assoc($result_img)) {
                echo "<img src='http://0.0.0.0:8080/GSSS/Gsss_admin/uploads/post_img/{$img_row['img']}' alt='{$img_row['img']}'>";
              }
            }
            echo "
            <table>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>{$row['name']}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Date</td>
                  <td>{$row['date']}</td>
                </tr>
                <tr>
                  <td>Title</td>
                  <td>{$row['title']}</td>
                </tr>
                <tr>
                  <td>Post info</td>
                  <td>{$row['post_info']}</td>
                </tr>
              </tbody>
            </table>";
          }
        }
        ?>
      </div>
    </div>

    <section class="footer">
      <div class="footer-row">
        <div class="footer-col">
          <h4>Info</h4>
          <ul class="links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Compressions</a></li>
            <li><a href="#">Customers</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Collection</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Explore</h4>
          <ul class="links">
            <li><a href="#">Free Designs</a></li>
            <li><a href="#">Latest Designs</a></li>
            <li><a href="#">Themes</a></li>
            <li><a href="#">Popular Designs</a></li>
            <li><a href="#">Art Skills</a></li>
            <li><a href="#">New Uploads</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Legal</h4>
          <ul class="links">
            <li><a href="#">Customer Agreement</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">GDPR</a></li>
            <li><a href="#">Security</a></li>
            <li><a href="#">Testimonials</a></li>
            <li><a href="#">Media Kit</a></li>
          </ul>
        </div>

        <div class="footer-col newsletter">
          <h4>Newsletter</h4>
          <p>Subscribe to our newsletter for a weekly dose of news, updates, helpful tips, and exclusive offers.</p>
          <form action="#">
            <input type="email" placeholder="Your email" required>
            <button type="submit">SUBSCRIBE</button>
          </form>
          <div class="icons">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin"></i>
            <i class="fa-brands fa-github"></i>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <script src="main.js"></script>
  <script src="./post.js"></script>
</body>

</html>
