<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? 'PR-SENPRU' }}</title>
    <style>
        :root{font-family:system-ui,-apple-system,Segoe UI,Roboto,'Helvetica Neue',Arial;}
        body{margin:0;background:#f5f7fb;color:#0f172a}
        .container{max-width:960px;margin:36px auto;padding:20px;background:#fff;border-radius:8px;box-shadow:0 6px 18px rgba(15,23,42,0.06)}
        header{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px}
        header h1{font-size:18px;margin:0}
        nav a{margin-left:12px;color:#0f172a;text-decoration:none}
        .btn{display:inline-block;padding:8px 12px;border-radius:6px;background:#0ea5a6;color:#fff;text-decoration:none;border:none;cursor:pointer}
        .btn.secondary{background:#64748b}
    /* small auth buttons (login/logout) */
    .auth-btn{padding:6px 8px;font-size:13px;border-radius:6px;background:#0ea5a6;color:#fff;text-decoration:none;border:none;cursor:pointer}
    .auth-btn.secondary{background:#64748b}
        table{width:100%;border-collapse:collapse;margin-top:12px}
        th,td{padding:10px;border-bottom:1px solid #e6eef8;text-align:left}
        th{background:#fbfdff}
        form.inline{display:inline}
        .form-row{margin-bottom:10px}
        label{display:block;font-size:13px;margin-bottom:6px;color:#0f172a}
        input[type=text],input[type=email],input[type=number],input[type=password],textarea{width:100%;padding:10px;border:1px solid #d1e3f3;border-radius:8px;box-sizing:border-box;background:#fbfdff}
        input:focus,textarea:focus{outline:none;border-color:#38bdf8;box-shadow:0 4px 12px rgba(56,189,248,0.08)}
        textarea{min-height:90px;resize:vertical}
        .responsive-table{width:100%;overflow-x:auto}

        /* responsive rules */
        @media (max-width: 720px){
            .container{margin:18px;padding:14px}
            header{flex-direction:column;align-items:flex-start;gap:10px}
            nav{display:flex;align-items:center;gap:8px}
            .btn{width:100%;text-align:center}
            .btn.secondary{width:100%}
            .responsive-table table{font-size:13px}
            /* stack form columns */
            .stack-2col{grid-template-columns:1fr}
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><a href="/" style="color:inherit;text-decoration:none">PR-SENPRU</a></h1>
            <nav>
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="auth-btn secondary" type="submit">Logout</button>
                    </form>
                @else
                    @if(Request::is('login'))
                        <a href="{{ url('/') }}" class="auth-btn">Back</a>
                    @else
                        <a href="{{ route('login') }}" class="auth-btn">Login</a>
                    @endif
                @endauth
            </nav>
        </header>

        <main>
            @if(session('success'))
                <div style="padding:10px;background:#ecfdf5;color:#065f46;border-radius:6px;margin-bottom:12px">{{ session('success') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
