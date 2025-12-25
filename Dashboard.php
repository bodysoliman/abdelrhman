<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="style/dashboard.css" />

<style>
    /* General Styles */
    
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: #121212;
        color: #f5eded;
    }
    /* Header */
    
    h1 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 3.5em;
        text-align: left;
        color: #4b01e9;
        text-shadow: 0 0 10px #171160, 0 0 20px #134657, 0 0 30px #00bfff;
        transition: all 0.5s ease;
    }
    
    h1:hover {
        color: #00bfff;
        text-shadow: 0 0 10px #00bfff, 0 0 20px #00bfff, 0 0 30px #00bfff;
    }
    
    .header {
        padding: relative;
        padding: 20px;
        margin-left: 100px;
        color: #121212;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }
    
    .header-h1 {
        position: absolute;
        padding: 7px;
        top: 5px;
        left: 180px;
        margin: 8;
        color: #358faa;
        font-size: 45px;
    }
    
    .dropdowns {
        margin-left: 120px;
    }
    
    .dropdown,
    .search-input {
        padding: 10px;
        margin: 0px 10px 10px 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: #fff;
        color: #333;
    }
    
    .dropdown {
        width: 160px;
    }
    
    .search-input {
        width: 200px;
    }
    
    .right-part {
        width: 35px;
        height: 35px;
        margin-top: -10px;
        padding: 10px;
    }
    /* Sidebar Navigation */
    
    .sidebar {
        position: fixed;
        top: 12%;
        left: 0;
        width: 65px;
        height: 80%;
        background: linear-gradient(135deg, #358faa, #007b8f);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 0 10px 10px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        font-size: 16px;
        transition: width 0.3s;
    }
    
    .sidebar:hover {
        width: 100px;
    }
    
    .nav a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        margin: 20px -10px;
        display: block;
        text-align: center;
        width: 100%;
        transition: background-color 0.3s, transform 0.3s;
        padding: 10px;
        border-radius: 10px;
    }
    
    .nav a:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: scale(1.1);
    }
    
    .nav a img {
        width: 50px;
        height: 50px;
        margin-top: 15px;
        transition: transform 0.3s;
    }
    
    .nav a:hover img {
        transform: scale(1.2);
    }
    /* Main Content */
    
    .main-content {
        margin-left: 120px;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: flex-start;
    }
    
    .card {
        background-color: #020202;
        border: 0px solid #15b8cd;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s;
        width: calc(25% - 15px);
        min-width: 250px;
    }
    
    .card.hidden {
        display: none;
    }
    
    .card:hover {
        transform: scale(1.05);
    }
    
    .card-image {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }
    
    .card-content {
        padding: 16px;
    }
    
    .details {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
    }
    
    .car-model {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
    }
    
    .left-side {
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
    }
    
    .car-price,
    .model-year {
        margin: 0;
    }
    
    .rent {
        background-color: #358faa;
        color: white;
        padding: 8px 16px;
        font-size: 18px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 200px;
        height: 50px;
        transition: background-color 0.3s;
    }
    
    .rent:hover {
        background-color: #007b8f;
    }
    
    @media (max-width: 1200px) {
        .card {
            width: calc(33.333% - 15px);
        }
    }
    
    @media (max-width: 900px) {
        .card {
            width: calc(50% - 15px);
        }
    }
    
    @media (max-width: 600px) {
        .card {
            width: 100%;
        }
    }

</style>
</head>

<body>
  <!-- Header with Search and Dropdowns -->
  <header class="header">
    <a href="about_us.html" title="car-rental">
      <h1 class="header-h1">Impact Makers</h1>
    </a>
    <!-- Dropdowns for filtering -->
    <div class="dropdowns">
      <select class="dropdown">
        <option value="Type">Type</option>
        <option value="Sports">Sports</option>
        <option value="Sedan">Sedan</option>
        <option value="Suv">SUV</option>
        <option value="Hatchback">Hatchback</option>
      </select>
      <select class="dropdown">
        <option value="">All</option>
        <?php
        // Connect to database
      $conn = new mysqli("localhost", "root", "", "carrentalsystem");

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }



        // Get distinct years from database
        $sql = "SELECT DISTINCT Year FROM cars ORDER BY Year DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['Year'] . "'>" . $row['Year'] . "</option>";
          }
        }
        ?>
      </select>
      <select class="dropdown">
        <option value="">All</option>
        <?php
        // Get distinct brands from model names
        $sql = "SELECT Model FROM cars";
        $result = $conn->query($sql);
        $brands = array();

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $brand = explode(" ", $row['Model'])[0];
            if (!in_array($brand, $brands)) {
              $brands[] = $brand;
              echo "<option value='" . $brand . "'>" . $brand . "</option>";
            }
          }
        }
        ?>
      </select>
      <select class="dropdown">
        <option value="">Price</option>
        <option value="Above $2000">Above $2000</option>
        <option value="$1500~$2000">$1500~$2000</option>
        <option value="$1000~$1500">$1000~$1500</option>
        <option value="$500~$1000">$500~$1000</option>
        <option value="Below $500">Below $500</option>
      </select>
      <!-- Search bar -->
      <input type="text" placeholder="Search for a car..." class="search-input" />
    </div>
  </header>

  <!-- Sidebar Navigation -->
  <div class="sidebar">
    <nav class="nav">
      <a href="./profile.php" title="My Profile">
        <img src="Photos/account.png" alt="My Account" />
      </a>
      <a href="./Dashboard.php" title="Cars">
        <img src="Photos/car.png" alt="Cars" />
      </a>
      <a href="./contacts.html" title="Contacts">
        <img src="Photos/mail.png" alt="Contact Us" />
      </a>
      <a href="./about_us.html" title="About Us">
        <img src="Photos/about.png" alt="About Us" />
      </a>
      <a href="./index.html" title="Log Out">
        <img src="Photos/logout.png" alt="Log Out" />
      </a>
    </nav>
  </div>

  <!-- Main Section with Cards -->
  <main class="main-content">
    <?php
    // Fetch available cars
    $sql = "SELECT * FROM cars WHERE Status = 'active'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0):
      while ($car = $result->fetch_assoc()):
        ?>
        <div class="card">
          <img src="<?php echo $car['image_url']; ?>" alt="<?php echo $car['Model']; ?>" id="image_url" class="card-image" />
          <div class="card-content">
            <h3 class="car-model"><?php echo $car['Model']; ?></h3>
            <div class="details">
              <div class="left-side">
                <span class="car-price">Price: $<?php echo number_format($car['PricePerDay']); ?></span><br>
                <span class="model-year">Model Year: <?php echo $car['Year']; ?></span>
              </div>
              <button class="rent">
                <span><a href="details.php?CarID=<?php echo $car['CarID']; ?>">Rent</a></span>
              </button>
            </div>
          </div>
        </div>
        <?php
      endwhile;
    else:
      echo "<p>No cars available at the moment.</p>";
    endif;
    ?>
  </main>


  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Get all elements we need
      const searchInput = document.querySelector(".search-input");
      const dropdowns = document.querySelectorAll(".dropdown");
      const cards = document.querySelectorAll(".card");

      // Function to filter cards based on search and dropdown selections
      function filterCards() {
        const searchTerm = searchInput.value.toLowerCase();
        const typeValue = document.querySelectorAll(".dropdown")[0].value;
        const yearValue = document.querySelectorAll(".dropdown")[1].value;
        const brandValue = document.querySelectorAll(".dropdown")[2].value;
        const priceValue = document.querySelectorAll(".dropdown")[3].value;

        cards.forEach((card) => {
          const carModel = card.querySelector(".car-model").textContent.toLowerCase();
          const modelYear = card.querySelector(".model-year").textContent.split(": ")[1];
          const carPrice = parseInt(
            card.querySelector(".car-price").textContent.split("$")[1].replace(",", "")
          );

          // Check if the car matches all filter criteria
          const matchesSearch = carModel.includes(searchTerm);
          const matchesType =
            typeValue === "Type" ||
            (typeValue === "Sports" && isSportsCar(carModel)) ||
            (typeValue === "Sedan" && isSedan(carModel)) ||
            (typeValue === "Suv" && isSUV(carModel)) ||
            (typeValue === "Hatchback" && isHatchback(carModel));
          const matchesYear = !yearValue || modelYear === yearValue;
          const matchesBrand =
            brandValue === "All" || carModel.startsWith(brandValue.toLowerCase());

          const matchesPrice =
            !priceValue || checkPriceRange(priceValue, carPrice);

          if (matchesSearch && matchesType && matchesYear && matchesBrand && matchesPrice) {
            card.classList.remove('hidden');
          } else {
            card.classList.add('hidden');
          }
        });
      }

      // Helper functions to determine car types
      function isSportsCar(model) {
        const sportsModels = [
          "bugatti",
          "koeingsegg",
          "pagani",
          "ferrari",
          "lamborghini",
          "porsche 918",
          "mclaren",
        ];
        return sportsModels.some((sportModel) => model.includes(sportModel));
      }

      function isSedan(model) {
        const sedanModels = [
          "mercedes c180",
          "bmw m3",
          "aston martin",
          "rollsroyce",
        ];
        return sedanModels.some((sedanModel) => model.includes(sedanModel));
      }

      function isSUV(model) {
        const suvModels = [
          "dodge durango",
          "mercedes g class",
          "lamborghini urus",
          "bmw x7",
        ];
        return suvModels.some((suvModel) => model.includes(suvModel));
      }

      function isHatchback(model) {
        const hatchbackModels = ["opel corsa", "brilliance"];
        return hatchbackModels.some((hatchbackModel) =>
          model.includes(hatchbackModel)
        );
      }

      // Helper function to check price ranges
      function checkPriceRange(priceRange, price) {
        switch (priceRange) {
          case "Above $2000":
            return price > 2000;
          case "$1500~$2000":
            return price >= 1500 && price <= 2000;
          case "$1000~$1500":
            return price >= 1000 && price < 1500;
          case "$500~$1000":
            return price >= 500 && price < 1000;
          case "Below $500":
            return price < 500;
          default:
            return true;
        }
      }

      // Add event listeners
      searchInput.addEventListener("input", filterCards);
      dropdowns.forEach((dropdown) => {
        dropdown.addEventListener("change", filterCards);
      });
    });
  </script>
</body>

</html>