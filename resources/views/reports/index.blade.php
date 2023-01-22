<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="stylesheet" href="{{asset('../assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/css/bootstrap.min.css')}}">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Режим ребенка</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('site.index')}}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('report.index')}}">Отчет</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container my-3">

</div>


<script src="{{asset('../assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>

