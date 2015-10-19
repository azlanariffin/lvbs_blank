<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugin/polygot/css/polyglot-language-switcher.css')}}" rel="stylesheet" type="text/css">

    <script src="{{asset('bower_components/jquery/dist/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugin/polygot/js/jquery.polyglot.language.switcher.js')}}" type="text/javascript"></script>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
                effect: 'fade',
                testMode: true,
                onChange: function(evt){
                    $(location).attr('href','{{URL::route('set-locale')}}'+'?lang='+evt.selectedItem)
                }
            });
        });
    </script>
</head>