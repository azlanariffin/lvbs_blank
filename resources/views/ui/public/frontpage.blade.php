@extends('ui.layout.master')
@extends('ui.layout.navbar')
@extends('ui.layout.chat-sidebar')
@extends('ui.layout.sidebar-left')
@extends('ui.layout.sidebar-right')


@section('page-title', 'MAIN CONTENT')

@section('content')
<div class="row">  
    <div class="jumbotron text-center">
        <h1>Hello Beautiful!</h1>
        <p>This is a sidebar navigation responsive template built off of Bootstrap 3.0 and simple sidebar template. It includes anchors, scroll spy, smooth scroll, and Awesome icon fonts.</p>
        <p><a class="btn btn-default">Click On Me!</a>
        <a class="btn btn-info">Tweet Me!</a></p>
    </div>    
</div>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-body pad-25">
        <legend id="anch1">Anchor 1</legend>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies, metus eget fringilla fermentum, sem justo pulvinar tellus, ac varius neque ante eget mi. Donec cursus nibh ultrices vulputate aliquet. Morbi nulla enim, molestie eu ullamcorper quis, placerat a mauris. Proin vel magna ullamcorper, vulputate leo eu, egestas odio. Vivamus erat leo, egestas in euismod sed, fermentum nec magna. Nunc nisi enim, euismod a tellus sit amet, fermentum adipiscing ipsum. Fusce rhoncus diam ac neque aliquam convallis. Etiam malesuada, nibh id rutrum euismod, enim augue gravida dolor, at vulputate felis mi at magna. Nulla luctus, libero eget luctus gravida, sapien enim varius massa, adipiscing aliquet lacus mi eu eros. Duis pretium laoreet ullamcorper. Aenean in mauris nec libero tincidunt pharetra non et dui. Sed tortor turpis, mollis et tempus eu, auctor laoreet neque. Etiam eu tortor rutrum, rutrum mauris sit amet, hendrerit augue. Sed ut tincidunt nisi. Nam consectetur velit ac pharetra venenatis.</p>
        <p>Donec pellentesque id quam vel iaculis. Phasellus commodo tempor metus, eget sollicitudin odio ultricies id. Proin sed ipsum quis turpis suscipit luctus vitae id urna. Fusce et rhoncus quam. Etiam vel justo ligula. Nullam euismod lacinia risus a pulvinar. Pellentesque sit amet nisl eget ante vulputate feugiat. Suspendisse venenatis magna nunc, mollis facilisis neque condimentum ac. Vivamus non semper dui. Aenean sed eleifend dui. Vivamus a massa aliquam nibh consectetur luctus id at ligula. Nunc ipsum dolor, mollis at sem et, auctor rhoncus ipsum. Nulla faucibus venenatis est sit amet facilisis. In vestibulum nisi at tellus egestas, in pharetra enim fringilla. In ac erat non magna accumsan aliquam.</p>
        </div>
    </div>       
</div>
@endsection