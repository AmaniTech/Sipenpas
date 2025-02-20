<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card with Background</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .id-card {
            width: 200px;
            height: 300px;
            border: 1px solid #000;
            padding: 10px;
            margin: 5px;
            display: inline-block;
            box-sizing: border-box;
            text-align: center;
            background-image: url('https://cdn.pixabay.com/photo/2020/02/24/18/05/background-4876988_640.jpg'); 
            background-size: cover;
            background-position: center;
            color: white; 
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .id-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 2px solid white;
        }
        .id-card h5 {
            margin: 5px 0;
            font-size: 18px;
        }
        .id-card p {
            margin: 2px 0;
            font-size: 12px;
        }
        @media print {
            .id-card {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- ID Card 1 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>John Doe</h5>
                <p>ID: 123456</p>
                <p>Departemen: IT</p>
                <p>Jabatan: Developer</p>
            </div>
            <!-- ID Card 2 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Jane Smith</h5>
                <p>ID: 654321</p>
                <p>Departemen: HR</p>
                <p>Jabatan: Manager</p>
            </div>
            <!-- ID Card 3 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Alice Johnson</h5>
                <p>ID: 789012</p>
                <p>Departemen: Finance</p>
                <p>Jabatan: Accountant</p>
            </div>
            <!-- ID Card 4 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Bob Brown</h5>
                <p>ID: 345678</p>
                <p>Departemen: Marketing</p>
                <p>Jabatan: Analyst</p>
            </div>
            <!-- ID Card 5 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Charlie Davis</h5>
                <p>ID: 901234</p>
                <p>Departemen: Sales</p>
                <p>Jabatan: Executive</p>
            </div>
            <!-- ID Card 6 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Eva Green</h5>
                <p>ID: 567890</p>
                <p>Departemen: Support</p>
                <p>Jabatan: Specialist</p>
            </div>
            <!-- ID Card 7 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Frank White</h5>
                <p>ID: 234567</p>
                <p>Departemen: Operations</p>
                <p>Jabatan: Coordinator</p>
            </div>
            <!-- ID Card 8 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Grace Lee</h5>
                <p>ID: 890123</p>
                <p>Departemen: R&D</p>
                <p>Jabatan: Engineer</p>
            </div>
            <!-- ID Card 9 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Henry Clark</h5>
                <p>ID: 456789</p>
                <p>Departemen: Legal</p>
                <p>Jabatan: Advisor</p>
            </div>
            <!-- ID Card 10 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Ivy Adams</h5>
                <p>ID: 012345</p>
                <p>Departemen: Admin</p>
                <p>Jabatan: Assistant</p>
            </div>
            <!-- ID Card 11 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Jack Wilson</h5>
                <p>ID: 678901</p>
                <p>Departemen: IT</p>
                <p>Jabatan: Technician</p>
            </div>
            <!-- ID Card 12 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Karen Hall</h5>
                <p>ID: 345012</p>
                <p>Departemen: HR</p>
                <p>Jabatan: Recruiter</p>
            </div>
            <!-- ID Card 13 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Leo Scott</h5>
                <p>ID: 901567</p>
                <p>Departemen: Finance</p>
                <p>Jabatan: Auditor</p>
            </div>
            <!-- ID Card 14 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Mia King</h5>
                <p>ID: 234890</p>
                <p>Departemen: Marketing</p>
                <p>Jabatan: Designer</p>
            </div>
            <!-- ID Card 15 -->
            <div class="col-2 id-card">
                <img src="https://hypesneakerid.com/wp-content/uploads/2024/07/Screenshot-2024-07-30-192423-600x600.png" alt="Foto Profil">
                <h5>Noah Wright</h5>
                <p>ID: 678234</p>
                <p>Departemen: Sales</p>
                <p>Jabatan: Representative</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>