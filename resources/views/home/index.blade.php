<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1680">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
    <div class="d-flex flex-column justify-content-between min-vh-100">
        <v-header>

        </v-header>
        <div class="flex-grow-1 mt-3">
            <div class="container">
                <router-view>

                </router-view>
            </div>
        </div>
        <v-footer>

        </v-footer>
    </div>


</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="/js/app.js"></script>
</body>
</html>
