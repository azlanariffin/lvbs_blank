<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <script src="{{asset('bower_components/jquery/dist/jquery.js')}}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top"  role="navigation" style="margin-bottom: 0">
        <div id="topnavi" class="navbar-header">
            <div class="topmenuicon" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="fa fa-navicon"></span>
            </div>
            <div class="topmenuicon" data-toggle="collapse" data-target=".chatbar-collapse">
                <span class="fa fa-comments-o"></span>
            </div>
            <a class="navbar-brand" href="index.html">LARAVEL</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">40% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">20% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">80% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>

        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="morris.html">Morris.js Charts</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="panels-wells.html">Panels and Wells</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="icons.html"> Icons</a>
                            </li>
                            <li>
                                <a href="grid.html">Grid</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="active" href="blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="login.html">Login Page</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="onlineuser">
        <div class="oluserlist chatbar-collapse collapse">
            <ul id="onlineUsers">
                

            </ul>
        </div>
    </div>

<script>
    $("#onlineuser li").click(function() {
        $("#chatbox_cont ul").append('<li class="panel panel-default"><div class="panel-heading">Chat Box</div></li>');
    });


    var conn;

    var userName = "{{ Auth::user()->name }}";
    var userId = "{{ Auth::user()->id }}";
    var token = $("meta[name='csrf-token']").attr("content");
    var port = "9090";
    var uri = "{{ explode(':', str_replace('http://', '', str_replace('https://', '', App::make('url')->to('/'))))[0] }}";
    port = port.length == 0 ? '9090' : port;

    function setUserOnline(userid) {
        $.ajax({
            type: "GET",
            url: "{{ url('setUserOnline') }}",
            data: {user_id: userid, _token: token},
            dataType: "json",
            success: function (data) {
            }
        });
    }

    function setUserChatId(userid, chatid) {
        $.ajax({
            type: "GET",
            url: "{{ url('setUserChatId') }}",
            data: {user_id: userid, chat_id: chatid, _token: token},
            dataType: "json",
            success: function (data) {
            }
        });
    }       

    function getUsersOnline() {
        $.ajax({
            type: "GET",
            url: "{{ url('getUsersOnline') }}",
            data: {_token: token},
            dataType: "json",
            success: function (data) {
                var validation_failed = data.validation_failed;
                var rtnVal = data.return_value;

                if (validation_failed == 0) {
                    if (rtnVal != "") {
                        var arrValues = rtnVal.split(";");

                        for (i = 0; i < arrValues.length; i++) {

                            if (userId != arrValues[i].split("|")[1]) {
                                console.log("find users online");

                                var elemUsersOnline = $("#onlineUsers").find("#userid-" + arrValues[i].split("|")[1]);

                                if (elemUsersOnline.html() == undefined) {
                                    console.log("executed");
                                    $("#onlineUsers").append("<li id=\"userid- " + arrValues[i].split("|")[1] + "\"><img class=\"img-rounded\" src=\"{{asset('profiles/no_img.jpg')}}\"/><div class=\"olname\">" + ((arrValues[i].split("|")[1] == 1) ? "Admin" : arrValues[i].split("|")[0]) + "</div><div class=\"olindicator\"><span class=\"fa fa-circle\"></span></div><div style=\"clear:both;\"></div></li>");
                                    
                                    
                                }
                            }
                        }
                    }
                    refreshUsersOnline();
                }
            }
        });
    }

    function removeUsersOffline(chatid) {
        $.ajax({
            type: "GET",
            url: "{{ url('removeUsersOffline') }}",
            data: {chat_id: chatid, _token: token},
            dataType: "json",
            success: function (data) {
                var validation_failed = data.validation_failed;
                var rtnVal = data.return_value;

                if (validation_failed == 0) {
                    console.log("users offline");
                            
                    var elemUsersOffline = $("#onlineUsers").find("#userid-" + rtnVal);

                    if (elemUsersOffline.html() != undefined) {
                        $("#userid-" + rtnVal).remove();
                    }
                }

                refreshUsersOnline();
            }
        });
    }

    function refreshUsersOnline() {
        $("#onlineUsers").scrollTop($("#onlineUsers")[0].scrollHeight);
    }

    function createChatTab(id, uname) 
    {
        var elemChatTabs = $("#chatTabs").find("#usertab" + id);

        if (elemChatTabs.html() == undefined)
        {
            $("#chatTabs").append("<li id=\"usertab" + id + "\"><a href='#tab" + id + "default' data-toggle='tab'>" + ((id == 1) ? "Admin" : uname) + "</a></li>");

            var elemToCreate = "<div class=\"tab-pane fade\" id=\"tab" + id + "default\">";
            elemToCreate += "<ul id=\"chatMessages" + id + "\" class=\"chatMessages\">";
            elemToCreate += "</ul>";
            elemToCreate += "<div>";
            elemToCreate += "<span id=\"typestatus" + id + "\"></span>";
            elemToCreate += "</div>";
            elemToCreate += "<div style=\"display:table; width: 100%;\">";
            elemToCreate += "<span style=\"display:table-cell; width: 65px;\">Write here</span>";
            elemToCreate += "<input style=\"display:table-cell; width: 100%;\" type=\"text\" name=\"chatText\" id=\"chatText" + id + "\" onkeyup=\"keypress(event, " + id + ")\" />";
            elemToCreate += "</div>";
            elemToCreate += "</div>";

            $("#chatContents").append(elemToCreate);
        }

    }

    function addMessageToChatBox(usrid, tabid, message)
    {
        if (message.indexOf("typing") > -1)
        {
            if (tabid == 0)
            {
                $("#typestatus" + tabid).html(message);
            }
            else
            {
                if (tabid == userId)
                {
                    $("#typestatus" + usrid).html(message);
                }
            }
        }

        else if (message.indexOf("none") > -1)
        {
            if (tabid == 0)
            {
                $("#typestatus" + tabid).html("");
            }
            else
            {
                $("#typestatus" + usrid).html("");
            }
        }
        else if (message.indexOf("Connection established!") > -1)
        {
            getUsersOnline();

            //$("#chatMessages" + tabid).append("<li>" + message + "</li>");
            //$("#chatMessages" + tabid).scrollTop($("#chatMessages" + tabid)[0].scrollHeight);
        }
        else if (message.indexOf("is online") > -1)
        {
            getUsersOnline();

            /*if (usrid == 1 && userId != usrid)
            {
                $("#chatMessages" + tabid).append("<li>Admin is online</li>");
                $("#chatMessages" + tabid).scrollTop($("#chatMessages" + tabid)[0].scrollHeight);
            }
            else
            {
                getUsersOnline();
                $("#chatMessages" + tabid).append("<li>" + ((usrid == 1) ? "Admin is online" : message) + "</li>");
                $("#chatMessages" + tabid).scrollTop($("#chatMessages" + tabid)[0].scrollHeight);
            }*/
        }
        else
        {
            if (message.indexOf("Me:") > -1)
            {
                $("#chatMessages" + tabid).append("<li>" + message + "</li>");
                $("#chatMessages" + tabid).scrollTop($("#chatMessages" + tabid)[0].scrollHeight);
            }
            else
            {
                if (tabid == 0)
                {
                    // If from public room
                    if (usrid == 1)
                    {
                        $("#chatMessages" + tabid).append("<li>Admin:" + message.split(":")[1] + "</li>");
                        $("#chatMessages" + tabid).scrollTop($("#chatMessages" + tabid)[0].scrollHeight);
                    }
                    else
                    {
                        $("#chatMessages" + tabid).append("<li>" + message + "</li>");
                        $("#chatMessages" + tabid).scrollTop($("#chatMessages" + tabid)[0].scrollHeight);
                    }
                }
                else
                {
                    // If from user to user
                    if (userId == tabid)
                    {
                        createChatTab(usrid, message.split(":")[0]);
                        $("#chatMessages" + usrid).append("<li>" + ((usrid == 1) ? "Admin:" + message.split(":")[1] : message) + "</li>");
                        $("#chatMessages" + usrid).scrollTop($("#chatMessages" + usrid)[0].scrollHeight);
                    }
                    
                }
            }
        }
    }

    function keypress(e, id)
    {
        if (e.keyCode == 13)
        {
            var message = $("#chatText" + id).val();

            if (id == 0)
            {
                conn.send(userId + ";" + id + ";" + userName + ": " + message);
                addMessageToChatBox(userId, id, "Me: " + message);
            }
            else
            {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getUserName') }}",
                    data: {user_id: id, _token: token},
                    dataType: "json",
                    success: function (data) {
                        var validation_failed = data.validation_failed;
                        var rtnVal = data.return_value;
                        var is_active = data.is_active;

                        if (validation_failed == 0) 
                        {
                            if (is_active == 1)
                            {
                                // If user is online then do below
                                conn.send(userId + ";" + id + ";" + userName + ": " + message);
                                addMessageToChatBox(userId, id, "Me: " + message);
                            }
                            else
                            {
                                //If user is offline then do below
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('postMessageToUser') }}",
                                    data: {from_id: userId, to_id: id, message: message, _token: token},
                                    dataType: "json",
                                    success: function (data) {
                                    }
                                });

                                addMessageToChatBox(userId, id, "Me: " + message);
                            }
                        }
                    }
                });
            }

            $("#chatText" + id).val("");
            conn.send(userId + ";" + id + ";none");
        }
        else
        {
            conn.send(userId + ";" + id + ";" + ((userId == 1) ? "Admin is typing ..." : userName + " is typing ..."));
        }
    }    



    $(document).ready(function() {
        conn = new WebSocket('ws://' + uri + ':' + port);

        conn.onerror = function (event) {
        }

        conn.onclose = function (event)
        {
            var reason;

            if (event.code == 1000)
                reason = "Normal closure, meaning that the purpose for which the connection was established has been fulfilled.";
            else if (event.code == 1001)
                reason = "An endpoint is \"going away\", such as a server going down or a browser having navigated away from a page.";
            else if (event.code == 1002)
                reason = "An endpoint is terminating the connection due to a protocol error";
            else if (event.code == 1003)
                reason = "An endpoint is terminating the connection because it has received a type of data it cannot accept (e.g., an endpoint that understands only text data MAY send this if it receives a binary message).";
            else if (event.code == 1004)
                reason = "Reserved. The specific meaning might be defined in the future.";
            else if (event.code == 1005)
                reason = "No status code was actually present.";
            else if (event.code == 1006)
                reason = "Abnormal error, e.g., without sending or receiving a Close control frame";
            else if (event.code == 1007)
                reason = "An endpoint is terminating the connection because it has received data within a message that was not consistent with the type of the message (e.g., non-UTF-8 [http://tools.ietf.org/html/rfc3629] data within a text message).";
            else if (event.code == 1008)
                reason = "An endpoint is terminating the connection because it has received a message that \"violates its policy\". This reason is given either if there is no other sutible reason, or if there is a need to hide specific details about the policy.";
            else if (event.code == 1009)
                reason = "An endpoint is terminating the connection because it has received a message that is too big for it to process.";
            else if (event.code == 1010) // Note that this status code is not used by the server, because it can fail the WebSocket handshake instead.
                reason = "An endpoint (client) is terminating the connection because it has expected the server to negotiate one or more extension, but the server didn't return them in the response message of the WebSocket handshake. <br /> Specifically, the extensions that are needed are: " + event.reason;
            else if (event.code == 1011)
                reason = "A server is terminating the connection because it encountered an unexpected condition that prevented it from fulfilling the request.";
            else if (event.code == 1015)
                reason = "The connection was closed due to a failure to perform a TLS handshake (e.g., the server certificate can't be verified).";
            else
                reason = "Unknown reason";
        };

        conn.onopen = function (e)
        {
            setUserOnline(userId);
            addMessageToChatBox(userId, 0, "Connection established!");
            conn.send(userId + ";" + "0;" + userName + " is online");
        };

        conn.onmessage = function (e)
        {
            if (e.data.indexOf("user_connected") > -1) {
                var r_conn_chatid = e.data.split(";")[0];
                var r_userid = e.data.split(";")[2];

                if (r_conn_chatid == r_userid) {
                    setUserChatId(userId, r_conn_chatid);
                }
            }
            else if (e.data.indexOf("user_disconnected") > -1) {
                var r_disconn_chatid = e.data.split(";")[0];
                var r_userid = e.data.split(";")[2];

                removeUsersOffline(r_disconn_chatid);
            }
            else {
                var uid = e.data.split(";")[0];
                var tabid = e.data.split(";")[1];
                var themsg = e.data.split(";")[2];

                addMessageToChatBox(uid, tabid, themsg);
            }
        };
    });    
</script>