<!doctype html>
<html lang="ru" class="has-navbar-fixed-top">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title ?? 'Админцентр' }} — {{ env('APP_NAME') }}</title>
	<link rel="shortcut icon" href="{{ asset('a/i/logo_sign.svg') }}">
	@vite('resources/sass/admin/app.scss')
	@livewireStyles
</head>
<body class="vstack">
<x-admin.template.header/>
<x-admin.template.content>{{ $slot }}</x-admin.template.content>
<x-admin.template.footer/>
@vite('resources/js/admin/app.js')
@livewireScriptConfig
</body>
</html>
