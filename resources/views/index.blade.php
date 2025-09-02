<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบประชาสัมพันธ์หลักสูตรวิศวกรรมซอฟต์แวร์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
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

        .hero-section {
            background: linear-gradient(135deg, #6c5ce7 0%, #5f3dc4 100%);
            color: white;
            padding: 80px 0;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            margin: 40px;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 2rem;
            font-weight: 300;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .btn-guide {
            background-color: white;
            color: #6c5ce7;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-guide:hover {
            background-color: #f8f9fa;
            color: #5f3dc4;
            transform: translateY(-2px);
        }

        .content-section {
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
            border: 1px solid #e9ecef;
        }

        .info-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1.5rem;
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
    </style>
</head>

<body>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <span>ระบบประชาสัมพันธ์หลักสูตรวิศวกรรมซอฟต์แวร์</span>
                </div>
                <div class="col-md-4 text-end">
                    <span>หน้าแรก</span>
                </div>
            </div>
        </div>
    </div>

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="hero-title">{{ $program->program_name_th }}</h1>
                    <h2 class="hero-subtitle">{{ $program->program_name_en }}</h2>
                    <p class="hero-description">
                        หลักสูตรวิศวกรรมซอฟต์แวร์ สาขาวิชาวิศวกรรมซอฟต์แวร์
                    </p>
                    <button class="btn btn-guide">คู่มือหลักสูตร</button>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <h2 class="section-title">ภาพรวมหลักสูตร</h2>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">ข้อมูลหลักสูตร</h3>

                        <div class="info-item">
                            <span class="info-label">ชื่อปริญญา (ไทย):</span>
                            <span class="info-value">{{ $program->degree_th }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">ชื่อปริญญา (อังกฤษ):</span>
                            <span class="info-value">{{ $program->degree_en }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">จำนวนหน่วยกิตที่ต้องเรียน:</span>
                            <span class="info-value">{{ $program->credits_required }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">รายละเอียดการศึกษา</h3>

                        <div class="info-item">
                            <span class="info-label">ภาษาที่ใช้ในการสอน:</span>
                            <span class="info-value">{{ $program->language_th }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">ค่าลงทะเบียนต่อปี:</span>
                            <span class="info-value">{{ $program->tuition_fee }} บาท</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">หลักสูตรปี:</span>
                            <span class="info-value">{{ $program->curriculum_year }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>