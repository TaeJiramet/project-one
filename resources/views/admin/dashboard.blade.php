<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูล - ระบบประชาสัมพันธ์หลักสูตรวิศวกรรมซอฟต์แวร์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            margin: 0;
            padding: 0;
        }

        .top-header {
            background-color: #2c3e50;
            color: white;
            padding: 8px 0;
            font-size: 14px;
        }

        .admin-hero-section {
            background: linear-gradient(135deg, #6c5ce7 0%, #5f3dc4 100%);
            color: white;
            padding: 60px 0;
        }

        .admin-hero-section::before {
            content: '⚙️';
            position: absolute;
            top: 24px;
            right: 24px;
            width: 96px;
            height: 96px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            color: rgba(255,255,255,0.95);
            box-shadow: 0 8px 20px rgba(15,23,42,0.12);
        }

        .admin-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .admin-hero-subtitle {
            font-size: 2rem;
            font-weight: 300;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .admin-hero-description {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .btn-admin {
            background-color: white;
            color: #6c5ce7;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-admin:hover {
            background-color: #f8f9fa;
            color: #5f3dc4;
            transform: translateY(-2px);
        }

        .admin-content-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 2rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #ffd32a 0%, #6c5ce7 100%);
            border-radius: 2px;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            height: 100%;
;
            border: 1px solid #e9ecef;
        }

        .info-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
            font-family: 'Sarabun', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        
        footer a:hover {
            color: #6c5ce7;
            text-decoration: none;
        }
        
        footer ul li {
            line-height: 1.6;
            font-size: 0.9rem;
        }

        .info-item {
            margin-bottom: 1rem;
            font-size: 1rem;
            line-height: 1.6;
        }

        .info-label {
            font-weight: 600;
            color: #2c3e50;
        }

        .info-value {
            color: #6c757d;
        }
        
        .section-content {
            padding: 20px 0;
        }
        
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        
        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            flex: 1 1 calc(33% - 20px);
            min-width: 250px;
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .card-content {
            color: #6c757d;
            line-height: 1.6;
        }
        
        .btn-center {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .no-data {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
        }
        
        .section-alt {
            background-color: #f8f9fa;
        }
        
        .faculty-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .faculty-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .faculty-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        
        .faculty-position {
            min-height: 40px;
            display: flex;
            align-items: center;
        }
        
        .info-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            height: 100%;
            border: 1px solid #e9ecef;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        @media (max-width: 768px) {
            .card {
                flex: 1 1 100%;
            }
        }
    </style>
</head>

<body>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>ระบบจัดการข้อมูล - ระบบประชาสัมพันธ์หลักสูตรวิศวกรรมซอฟต์แวร์</span>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('home') }}" class="btn btn-sm btn-outline-light me-2">กลับหน้าหลัก</a>
                    <form id="admin-logout-form" method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                    </form>
                    <a href="#" class="btn btn-sm btn-outline-light" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </div>

    <section class="admin-hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="admin-hero-title">แผงควบคุมผู้ดูแลระบบ</h1>
                    <h2 class="admin-hero-subtitle">จัดการข้อมูลเว็บไซต์</h2>
                    <p class="admin-hero-description">
                        ยินดีต้อนรับสู่ระบบจัดการข้อมูล คุณสามารถจัดการเนื้อหาทั้งหมดของเว็บไซต์ได้จากที่นี่
                    </p>
                    <div style="display:flex;gap:10px;flex-wrap:wrap">
                        <a href="{{ route('home') }}" class="btn-admin">ดูหน้าเว็บไซต์</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-content-section">
        <div class="container">
            <h2 class="section-title">จัดการข้อมูล</h2>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">ข้อมูลหลักสูตร</h3>
                        <div class="info-item">
                            <span class="info-label">จำนวนข้อมูล:</span>
                            <span class="info-value">{{ $stats['programs'] }}</span>
                        </div>
                        <div class="d-grid gap-2" style="margin-top: 20px;">
                            <a href="{{ route('admin.programs.edit') }}" class="btn btn-primary">จัดการข้อมูลหลักสูตร</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">ข้อมูลอาจารย์</h3>
                        <div class="info-item">
                            <span class="info-label">จำนวนข้อมูล:</span>
                            <span class="info-value">{{ $stats['faculty'] }}</span>
                        </div>
                        <div class="d-grid gap-2" style="margin-top: 20px;">
                            <a href="{{ route('admin.faculty.index') }}" class="btn btn-primary">จัดการข้อมูลอาจารย์</a>
                            <a href="{{ route('admin.faculty.create') }}" class="btn btn-outline-primary">เพิ่มข้อมูลอาจารย์</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">กิจกรรม</h3>
                        <div class="info-item">
                            <span class="info-label">จำนวนข้อมูล:</span>
                            <span class="info-value">{{ $stats['activities'] }}</span>
                        </div>
                        <div class="d-grid gap-2" style="margin-top: 20px;">
                            <a href="{{ route('admin.activities.index') }}" class="btn btn-primary">จัดการกิจกรรม</a>
                            <a href="{{ route('admin.activities.create') }}" class="btn btn-outline-primary">เพิ่มกิจกรรม</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">อาชีพหลังสำเร็จการศึกษา</h3>
                        <div class="info-item">
                            <span class="info-label">จำนวนข้อมูล:</span>
                            <span class="info-value">{{ $stats['careers'] }}</span>
                        </div>
                        <div class="d-grid gap-2" style="margin-top: 20px;">
                            <a href="{{ route('admin.careers.index') }}" class="btn btn-primary">จัดการข้อมูลอาชีพ</a>
                            <a href="{{ route('admin.careers.create') }}" class="btn btn-outline-primary">เพิ่มข้อมูลอาชีพ</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">ห้องปฏิบัติการ</h3>
                        <div class="info-item">
                            <span class="info-label">จำนวนข้อมูล:</span>
                            <span class="info-value">{{ $stats['laboratories'] }}</span>
                        </div>
                        <div class="d-grid gap-2" style="margin-top: 20px;">
                            <a href="{{ route('admin.laboratories.index') }}" class="btn btn-primary">จัดการห้องปฏิบัติการ</a>
                            <a href="{{ route('admin.laboratories.create') }}" class="btn btn-outline-primary">เพิ่มห้องปฏิบัติการ</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">ผลงานนักศึกษา</h3>
                        <div class="info-item">
                            <span class="info-label">จำนวนข้อมูล:</span>
                            <span class="info-value">{{ $stats['studentWorks'] }}</span>
                        </div>
                        <div class="d-grid gap-2" style="margin-top: 20px;">
                            <a href="{{ route('admin.student-works.index') }}" class="btn btn-primary">จัดการผลงานนักศึกษา</a>
                            <a href="{{ route('admin.student-works.create') }}" class="btn btn-outline-primary">เพิ่มผลงานนักศึกษา</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">วิดีโอ</h3>
                        <div class="info-item">
                            <span class="info-label">จำนวนข้อมูล:</span>
                            <span class="info-value">{{ $stats['videos'] }}</span>
                        </div>
                        <div class="d-grid gap-2" style="margin-top: 20px;">
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-primary">จัดการวิดีโอ</a>
                            <a href="{{ route('admin.videos.create') }}" class="btn btn-outline-primary">เพิ่มวิดีโอ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>