<html>
    <head>
        @include('ui.asset.css')
    </head>
    <body>
        <div id="wrapper">
        
        <!-- Navbar -->
        @yield ('navbar')  
         
        <!-- Sidebar -->
        @yield ('chat-sidebar')
        
        <!-- Sidebar-left -->
        @yield ('sidebar-left')        

        <!-- Sidebar -->
        @yield ('sidebar-right')
        
        
        
            <!-- Page content -->
            <div id="page-content-wrapper">
                <div class="content-header">
                    <h1 id="home">                    
                        @yield ('page-title')
                    </h1>
                </div>

                <div class="page-content inset pad-50">
                     @yield ('content')                
                </div>           

            </div>
        </div>    
        
        @include('ui.asset.js')     
    </body>
</html>