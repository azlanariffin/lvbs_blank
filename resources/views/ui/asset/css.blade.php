<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="apple-touch-icon" href="{{ asset('default/plugins/pages/ico/60.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('default/plugins/pages/ico/76.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('default/plugins/pages/ico/120.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('default/plugins/pages/ico/152.png')}}">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="CHAT UI" />
<meta content="" name="Radzi JS" />

<!-- BEGIN CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('ui/plugins/bootstrap3/css/bootstrap.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('ui/plugins/fontawesome4/css/font-awesome.min.css')}}"/>
@yield ('extend-css')
<link rel="stylesheet" type="text/css" href="{{ asset('ui/css/style.css')}}" class="main-stylesheet" />

<!--[if lte IE 9]>
    <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript">
window.onload = function()
{
  // fix for windows 8
  if (navigator.appVersion.indexOf("Windows NT 6.2") !== -1)
    document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />';
};
</script>
