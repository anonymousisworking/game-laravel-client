<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/main.css">
    <title>Fightworld</title>
</head>
<body>
    <div id="game">
        <game></game>
    </div>

    <script src="js/common.js"></script>
	<script src="{{ mix('/js/app.js') }}"></script>
{{--<script src="js/less.min.js"></script>--}}
{{--<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--<script src='js/common.js'></script>--}}
{{--<script src="js/WSocket.js"></script>--}}
{{--<script src="js/Application.js"></script>--}}
{{--<script src="js/User.js"></script>--}}
{{--<script>--}}
{{--    let user = {--}}
{{--        name: '<?=s('name')?>',--}}
{{--        loc: <?=s('loc') ?: "''"?>,--}}
{{--        transitionTimeout: <?=s('transitionTimeout') ?: "''"?>,--}}
{{--    };--}}
{{--</script>--}}
{{--<script src="js/app.js"></script>--}}
{{--<script src="{{ mix('/js/main.js') }}"></script>--}}
</body>
</html>
