<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="{{ route('post_register') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12 text-center">
                    สมัครสมาชิก
                </div>
                @if (session('success-register'))
                    <div class="alert alert-success">
                        {{ session('success-register') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-12">
                    <label for="name">ชื่อ</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-12">
                    <label for="email">อีเมล</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-12">
                    <label for="password">รหัสผ่าน</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-12">
                    <label for="password_confirm">ยืนยันรหัสผ่าน</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                </div>
                <div class="col-12">
                    <input type="submit" class="form-control btn btn-success mt-2">
                </div>
            </div>
        </form>
        <a href="{{ route('login') }}">เข้าสู่ระบบ</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.querySelector('.alert').style.display = 'none';
            }, 3000); // ล้าง session หลังจากผ่านไป 3 วินาที
        });
    </script>
</body>

</html>
