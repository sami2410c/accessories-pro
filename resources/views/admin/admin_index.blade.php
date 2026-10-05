@include('admin.admin_navbar')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background: #f5f6fa;
      font-family: "Inter", sans-serif;
      margin: 0;
      padding-top: 80px; /* Navbar ke liye space */
    }

    .content-wrapper {
      margin-left: 100px; /* Sidebar ke liye space */
      padding: 20px 30px;
    }

    /* Simple card styling */
    .card {
      width: 220px; /* fixed width */
      border: none;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      text-align: center;
      padding: 20px;
      margin-bottom: 20px; /* vertical spacing */
      float: left; /* left align */
      margin-right: 20px; /* horizontal spacing between cards */
    }

    .cards-wrapper .card:last-child {
      margin-right: 0; /* Last card ka extra gap remove */
    }

    /* Icon on top of card */
    .card i {
      font-size: 35px;
      color: #0d6efd;
      margin-bottom: 15px;
    }

    .card h5 {
      margin-bottom: 10px;
      font-weight: 500;
    }

    /* Clear floats after cards */
    .cards-wrapper::after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
</head>
<body>

  <div class="content-wrapper">
    <h2 class="mb-4">Dashboard Overview</h2>

    <div class="cards-wrapper">
      <div class="card">
        <i class="bi bi-people-fill"></i>
        <h5>Total Patients</h5>
        
      </div>
      <div class="card">
        <i class="bi bi-hospital-fill"></i>
        <h5>Total Hospitals</h5>
        {{-- <h2>{{APP\Models\User::where('user_role','2')->count()}}</h2> --}}
      </div>
      <div class="card">
        <i class="bi bi-calendar-check-fill"></i>
        <h5>Approve Appointments</h5>
        {{-- <h2>{{APP\Models\User::where('status','approved')->count()}}</h2> --}}
      </div>
      <div class="card">
        <i class="bi bi-syringe"></i>
        <h5>Vaccinations Done</h5>
     
        <h2></h2>
        <h2></h2>

      </div>
    </div>
  </div>

</body>
</html>
