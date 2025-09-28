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
            /* show a computer icon inside a rounded badge */
            content: '💻';
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
                <div class="col-md-12">
                    <span>ระบบประชาสัมพันธ์หลักสูตรวิศวกรรมซอฟต์แวร์</span>
                </div>
            </div>
        </div>
    </div>

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="hero-title">{{ $program->program_name_th ?? 'ยังไม่ได้ตั้งค่าหลักสูตร' }}</h1>
                    <h2 class="hero-subtitle">{{ $program->program_name_en ?? '' }}</h2>
                    <p class="hero-description">
                        หลักสูตรวิศวกรรมซอฟต์แวร์ สาขาวิชาวิศวกรรมซอฟต์แวร์
                    </p>
                    <div style="display:flex;gap:10px;flex-wrap:wrap">
                        <button class="btn btn-guide">คู่มือหลักสูตร</button>
                    </div>
                    @if(isset($updatedAt))
                        <div style="margin-top:12px;color:rgba(255,255,255,0.9)">อัปเดตล่าสุด: {{ $updatedAt->format('Y-m-d H:i') }}</div>
                    @endif
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
                            <span class="info-value">{{ $program->degree_th ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">ชื่อปริญญา (อังกฤษ):</span>
                            <span class="info-value">{{ $program->degree_en ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">จำนวนหน่วยกิตที่ต้องเรียน:</span>
                            <span class="info-value">{{ $program->credits_required ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-card">
                        <h3 class="info-title">รายละเอียดการศึกษา</h3>

                        <div class="info-item">
                            <span class="info-label">ภาษาที่ใช้ในการสอน:</span>
                            <span class="info-value">{{ $program->language_th ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">ค่าลงทะเบียนต่อปี:</span>
                            <span class="info-value">
                                @if(isset($program) && !is_null($program->tuition_fee))
                                {{ number_format($program->tuition_fee, 2) }} บาท
                                @else
                                -
                                @endif
                            </span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">หลักสูตรปี:</span>
                            <span class="info-value">{{ $program->curriculum_year ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Faculty Members Section -->
    <section class="content-section" style="background-color: #f8f9fa;">
        <div class="container">
            <h2 class="section-title">อาจารย์ประจำหลักสูตร</h2>
            
            <div class="faculty-container" style="display: flex; flex-wrap: wrap; gap: 1.5rem; justify-content: center;">
            @forelse($facultyMembers as $member)
                <div style="flex: 1; min-width: 220px; max-width: 250px; flex-basis: 220px;">
                    <div class="info-card text-center faculty-card" style="height: 100%; display: flex; flex-direction: column; padding: 25px 15px;">
                        <!-- Profile Image -->
                        <div style="margin-bottom: 15px;">
                            @if($member->image_path)
                                <img src="{{ asset($member->image_path) }}" alt="{{ $member->name_th }}" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #6c5ce7; cursor: pointer;" class="faculty-image-clickable">
                            @else
                                <div style="width: 120px; height: 120px; border-radius: 50%; background: #6c5ce7; margin: 0 auto 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 1.2rem;">
                                    {{ mb_substr($member->name_th, 0, 1, 'UTF-8') }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="faculty-info" style="flex: 1; display: flex; flex-direction: column; justify-content: flex-start; text-align: center;">
                            <h3 class="info-title" style="font-size: 0.9rem; margin: 0 0 8px 0; flex: 1; display: flex; align-items: center; justify-content: center; word-break: break-word; overflow: hidden; max-height: 50px;">{{ $member->name_th }}</h3>
                            <p class="info-item faculty-position" style="font-size: 0.8rem; margin: 0 0 8px 0; color: #6c757d; height: auto; min-height: 45px; display: flex; align-items: center; justify-content: center; word-break: break-word; overflow: hidden; max-height: 60px;">{{ $member->position_th }}</p>
                            <p class="info-item faculty-email" style="font-size: 0.8rem; margin: 0 0 5px 0; color: #495057; word-break: break-all; text-align: center;">{{ $member->email }}</p>
                            <p class="info-item faculty-phone" style="font-size: 0.75rem; margin: 0; color: #6c757d; text-align: center;">{{ $member->phone }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">ยังไม่มีข้อมูลบุคลากร</p>
                </div>
            @endforelse
            </div>
            
        </div>
    </section>
    
    <!-- Activities Section -->
    <section class="content-section" style="background-color: #ffffff;">
        <div class="container">
            <h2 class="section-title">กิจกรรมเด่น</h2>
            
            <div class="row g-4 justify-content-center">
            @forelse($activities as $activity)
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="info-card text-center w-100" style="padding: 15px;">
                        @if($activity->image_path)
                            <div style="margin-bottom: 15px; overflow: hidden; border-radius: 8px; display: flex; justify-content: center; align-items: center;">
                                <img src="{{ $activity->image_path }}" alt="{{ $activity->title_th }}" style="width: 100%; height: 180px; object-fit: cover; cursor: pointer;" class="activity-image-clickable">
                            </div>
                        @endif
                        <h3 class="info-title">{{ $activity->title_th }}</h3>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">ยังไม่มีข้อมูลกิจกรรม</p>
                </div>
            @endforelse
            </div>
            
        </div>
    </section>
    
    <!-- Career Opportunities Section -->
    <section class="content-section" style="background-color: #ffffff;">
        <div class="container">
            <h2 class="section-title">อาชีพหลังสำเร็จการศึกษา</h2>
            
            <div class="row g-4">
            @forelse($careerOpportunities as $opportunity)
                <div class="col-md-6 col-lg-3">
                    <div class="info-card text-center">
                        <h3 class="info-title">{{ $opportunity->title_th }}</h3>
                        <p class="info-item">{{ $opportunity->description_th }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">ยังไม่มีข้อมูลโอกาสในการทำงาน</p>
                </div>
            @endforelse
            </div>
            
            
        </div>
    </section>
    
    <!-- Laboratories Section -->
    <section class="content-section" style="background-color: #f8f9fa;">
        <div class="container">
            <h2 class="section-title">ห้องปฏิบัติการ</h2>
            
            <div class="row g-4">
            @forelse($laboratories as $lab)
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="info-card text-center w-100">
                        @if($lab->image_path)
                            <div style="margin-bottom: 15px; overflow: hidden; border-radius: 8px; display: flex; justify-content: center; align-items: center;">
                                <img src="{{ $lab->image_path }}" alt="{{ $lab->name_th }}" style="width: 100%; height: 180px; object-fit: cover; cursor: pointer;" class="laboratory-image-clickable">
                            </div>
                        @endif
                        <h3 class="info-title">{{ $lab->name_th }}</h3>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">ยังไม่มีข้อมูลห้องปฏิบัติการ</p>
                </div>
            @endforelse
            </div>
            
            
        </div>
    </section>
    
    <!-- Student Works Section -->
    <section class="content-section" style="background-color: #ffffff;">
        <div class="container">
            <h2 class="section-title">ผลงานนักศึกษา</h2>
            
            <div class="row g-4">
            @forelse($studentWorks as $work)
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="info-card text-center w-100">
                        @if($work->image_path)
                            <div style="margin-bottom: 15px; overflow: hidden; border-radius: 8px; display: flex; justify-content: center; align-items: center;">
                                <img src="{{ $work->image_path }}" alt="{{ $work->title_th }}" style="width: 100%; height: 180px; object-fit: cover; cursor: pointer;" class="studentwork-image-clickable">
                            </div>
                        @endif
                        <h3 class="info-title">{{ $work->title_th }}</h3>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">ยังไม่มีข้อมูลผลงานนักศึกษา</p>
                </div>
            @endforelse
            </div>
            
            
        </div>
    </section>
    
    
    
    <!-- Videos Section -->
    <section class="content-section" style="background-color: #ffffff;">
        <div class="container">
            <h2 class="section-title">วิดีโอแนะนำสาขา</h2>
            
            <div class="row g-4 justify-content-center">
            @forelse($videos as $video)
                <div class="col-lg-8 col-md-10">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <h3 class="info-title" style="font-size: 0.9rem; margin: 10px 0 15px 0; font-family: 'Sarabun', sans-serif;">{{ $video->title_th }}</h3>
                        <div style="position: relative; padding-bottom: 56.25%; height: 0; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                            <iframe src="https://www.youtube.com/embed/jXyZb58_eMo" 
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;"
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div>
                        <p class="info-item" style="font-size: 0.85rem; margin-top: 15px; text-align: center;">{{ $video->description_th }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">ยังไม่มีวิดีโอแนะนำ</p>
                </div>
            @endforelse
            </div>
            
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Lightbox Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" class="img-fluid" id="expandedImage" alt="Expanded view">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background-color: #2c3e50; color: white; padding: 30px 0; margin-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 style="font-weight: 600; margin-bottom: 20px; position: relative; padding-bottom: 10px;">
                        หลักสูตรวิศวกรรมซอฟต์แวร์
                        <span style="position: absolute; bottom: 0; left: 0; width: 50px; height: 3px; background-color: #6c5ce7;"></span>
                    </h5>
                    <p style="line-height: 1.6; font-size: 0.9rem;">
                        หลักสูตรวิศวกรรมซอฟต์แวร์ สาขาวิชาวิศวกรรมซอฟต์แวร์<br>
                        คณะวิศวกรรมศาสตร์และอุตสาหกรรม<br>
                        มหาวิทยาลัยราชภัฏนครปฐม
                    </p>
                </div>
                
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 style="font-weight: 600; margin-bottom: 20px; position: relative; padding-bottom: 10px;">
                        ช่องทางการติดต่อ
                        <span style="position: absolute; bottom: 0; left: 0; width: 50px; height: 3px; background-color: #6c5ce7;"></span>
                    </h5>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 10px; display: flex; align-items: flex-start;">
                            <span style="margin-right: 10px;">📍</span>
                            <span>อาคาร 4 ชั้น 2 ภาควิชาวิศวกรรมซอฟต์แวร์ คณะวิศวกรรมศาสตร์และอุตสาหกรรม มหาวิทยาลัยราชภัฏนครปฐม ถนนสนามจันทร์ ตำบลสนามจันทร์ อำเภอเมือง จังหวัดนครปฐม 73000</span>
                        </li>
                        <li style="margin-bottom: 10px; display: flex; align-items: flex-start;">
                            <span style="margin-right: 10px;">📞</span>
                            <span>โทรศัพท์: 034-214-5XX</span>
                        </li>
                        <li style="margin-bottom: 10px; display: flex; align-items: flex-start;">
                            <span style="margin-right: 10px;">✉️</span>
                            <span>อีเมล: software@npru.ac.th</span>
                        </li>
                    </ul>
                </div>
                
                <div class="col-md-4">
                    <h5 style="font-weight: 600; margin-bottom: 20px; position: relative; padding-bottom: 10px;">
                        ติดตามเรา
                        <span style="position: absolute; bottom: 0; left: 0; width: 50px; height: 3px; background-color: #6c5ce7;"></span>
                    </h5>
                    <div style="display: flex; gap: 15px; margin-top: 15px;">
                        <a href="https://www.youtube.com/@senpru" target="_blank" style="display: inline-block; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease; background-color: #ff0000;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#ffffff" d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        </a>
                        <a href="https://www.facebook.com/softwarenpru" target="_blank" style="display: inline-block; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease; background-color: #1877f2;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#ffffff" d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                        <a href="https://pgm.npru.ac.th/se/" target="_blank" style="display: inline-block; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease; background-color: #2c3e50;">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnIaaOnMeRSglsuzM0B5qd00oMu3Q8b4OWPg&s" alt="Website" style="width: 24px; height: 24px; border-radius: 0;">
                        </a>
                    </div>
                </div>
            </div>
            
            <hr style="border-color: rgba(255,255,255,0.1); margin: 30px 0;">
            
            <div class="row">
                <div class="col-12 text-center">
                    <p style="margin: 0; font-size: 0.9rem; color: rgba(255,255,255,0.7);">
                        &copy; 2568 คณะวิศวกรรมศาสตร์และอุตสาหกรรม มหาวิทยาลัยราชภัฏนครปฐม. สงวนลิขสิทธิ์.
                    </p>
                    <p style="margin: 10px 0 0 0; font-size: 0.8rem; color: rgba(255,255,255,0.5);">
                        ออกแบบและพัฒนาโดย สาขาวิชาวิศวกรรมซอฟต์แวร์
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Function to open lightbox
        function openLightbox(imageSrc, title) {
            const modal = new bootstrap.Modal(document.getElementById('imageModal'));
            document.getElementById('expandedImage').src = imageSrc;
            document.getElementById('imageModalLabel').textContent = title || '';
            modal.show();
        }
        
        // Add click event to all activity images
        document.querySelectorAll('.activity-image-clickable').forEach(img => {
            img.addEventListener('click', function() {
                openLightbox(this.src, this.alt);
            });
        });
        
        // Add click event to all laboratory images
        document.querySelectorAll('.laboratory-image-clickable').forEach(img => {
            img.addEventListener('click', function() {
                openLightbox(this.src, this.alt);
            });
        });
        
        // Add click event to all faculty images
        document.querySelectorAll('.faculty-image-clickable').forEach(img => {
            img.addEventListener('click', function() {
                openLightbox(this.src, this.alt);
            });
        });
        
        // Add click event to all student work images
        document.querySelectorAll('.studentwork-image-clickable').forEach(img => {
            img.addEventListener('click', function() {
                openLightbox(this.src, this.alt);
            });
        });
    </script>
</body>

</html>