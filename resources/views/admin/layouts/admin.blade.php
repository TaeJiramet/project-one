<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'แผงควบคุมผู้ดูแลระบบ')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
        .admin-header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 0;
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>แผงควบคุมผู้ดูแลระบบ</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-light me-2">กลับหน้าหลักผู้ดูแล</a>
                    <form id="admin-logout-form" method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                    </form>
                    <a href="#" class="btn btn-sm btn-outline-light" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        @if(session('success') || request()->query('logout'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                @if(session('success'))
                    {{ session('success') }}
                @elseif(request()->query('logout'))
                    ออกจากระบบเรียบร้อยแล้ว
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>