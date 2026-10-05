<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  <style>
    body {
      background: #f8f9fa;
      margin: 0;
      font-family: "Inter", sans-serif;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: -250px;
      width: 250px;
      height: 100%;
      background: #343a40;
      color: white;
      padding-top: 70px;
      transition: all 0.3s ease;
      z-index: 999;
      
    }

    .sidebar.active {
      left: 0;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar ul li {
      position: relative;
      padding: 15px 25px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      cursor: pointer;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: #fff;
      display: block;
    }

    .sidebar ul li:hover {
      background: rgba(255,255,255,0.1);
    }

    /* Dropdown menu inside sidebar */
    .sidebar .dropdown-menu {
      display: none;
      position: static;
      background: #2d2d44;
      list-style: none;
      padding: 0;
      margin: 0;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .sidebar .dropdown-menu li a {
      color: #d1d5db;
      padding: 10px 30px;
      text-decoration: none;
      display: block;
      font-size: 14px;
    }

    .sidebar .dropdown-menu li a:hover {
      background: #0d6efd;
      color: white;
    }

    /* 👇 Hover per dropdown open */
    .sidebar .dropdown:hover .dropdown-menu {
      display: block;
    }

    /* Navbar */
    .navbar-custom {
      background: white;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 900;
    }

    .navbar-left {
      display: flex;
      align-items: center;
    }

    .toggle-btn {
      font-size: 24px;
      background: none;
      border: none;
      cursor: pointer;
      color: #333;
    }

    .divider-line {
      width: 2px;
      height: 25px;
      background: #dee2e6;
      margin-left: 15px;
    }

    .navbar-right {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .navbar-right img {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
    }

    .logout-btn {
      background: #dc3545;
      color: white;
      border: none;
     
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 14px;
      transition: background 0.2s ease;
    }

    .logout-btn:hover {
      background: #c82333;
    }

    .content {
      margin-top: 80px;
      padding: 20px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <ul>
     <li><a href="/admin">admin</a></li>
      <li><a href="/products">Add products</a></li>

      <!-- Report Dropdown -->
      

      <!-- Vaccine Dropdown -->
      <li class="dropdown">
        <a href="#">💊 Vaccine ▼</a>
        <ul class="dropdown-menu">
          <li><a href="/vaccine">List of Vaccine</a></li>
        </ul>
      </li>

      <li><a href="/all_product">All Products</a></li>
      <li><a href="/list">🏥 Hospital List</a></li>
      
      
      <li><a href="/booking">📅 Booking</a></li>
     
    </ul>
  </div>

  <!-- Navbar -->
  <nav class="navbar-custom">
    <div class="navbar-left">
      <button class="toggle-btn" id="toggleBtn">☰</button>
      <div class="divider-line"></div>
    </div>
    <div class="navbar-right">
      <span class="fw-semibold text-dark">
        {{ auth()->user()->name }}
      </span>
    

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
      </form>
    </div>
  </nav>

  <!-- Page Content -->
  {{-- <div class="content">
    <h3>Welcome to Admin Dashboard</h3>
    <p>Hover over “Reports” or “Vaccine” to see dropdowns.</p>
  </div> --}}

 <script>
  const toggleBtn = document.getElementById("toggleBtn");
  const sidebar = document.getElementById("sidebar");

  // Toggle sidebar on button click
  toggleBtn.addEventListener("click", (e) => {
    sidebar.classList.toggle("active");
    e.stopPropagation(); // Button click ko document click se rokta hai
  });

  // Close sidebar on clicking outside
  document.addEventListener("click", (e) => {
    if (!sidebar.contains(e.target) && sidebar.classList.contains("active")) {
      sidebar.classList.remove("active");
    }
  });

  // Optional: click inside sidebar shouldn't close it
  sidebar.addEventListener("click", (e) => {
    e.stopPropagation();
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
