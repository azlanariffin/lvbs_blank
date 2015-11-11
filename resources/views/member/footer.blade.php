<div id="dialog-form" title="Create new group">
  <p class="validateTips">All form fields are required.</p>
 
  <form id="frmCreateGroup">
    <fieldset>
      <label for="name">Group name</label>
      <input type="text" name="group_name" id="groupname" value="" class="text ui-widget-content ui-corner-all">
      <label for="name">Users selection</label>
      <select id="selUsers" multiple="multiple" name="usersselect" size="5">
      </select>
      <input id="hdnIds" value="" type="hidden" />
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Custom jQuery Modal -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="{{ asset('css/jquery.multiselect.css') }}" />
<script src="{{ asset('js/jquery.multiselect.js') }}"></script>

<!-- Chat JavaScript -->
<script>
    var conn;

    var userName = "{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}";
    var userId = "{{ Auth::user()->id }}";
    var token = "{{ csrf_token() }}";
    var port = "9090";
    var uri = "{{ explode(':', str_replace('http://', '', str_replace('https://', '', App::make('url')->to('/'))))[0] }}";
    port = port.length == 0 ? '9090' : port;

    var dialog, form;

    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Create": createChatGroup,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        //allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "#frmCreateGroup" ).on( "submit", function( event ) {
      event.preventDefault();
      createChatGroup();
    });

    function setUserOnline(userid) {
        $.ajax({
            type: "GET",
            url: "{{ url('setUserOnline') }}",
            data: {
                user_id: userid,
                _token: token
            },
            dataType: "json",
            success: function (data) {}
        });
    }

    function setUserChatId(userid, chatid) {
        $.ajax({
            type: "GET",
            url: "{{ url('setUserChatId') }}",
            data: {
                user_id: userid,
                chat_id: chatid,
                _token: token
            },
            dataType: "json",
            success: function (data) {}
        });
    }

    function getUsersOnline() {
        $.ajax({
            type: "GET",
            url: "{{ url('getUsersOnline') }}",
            data: {
                _token: token
            },
            dataType: "json",
            success: function (data) {
                var validation_failed = data.validation_failed;
                var rtnVal = data.return_value;

                if (validation_failed == 0) {
                    if (rtnVal != "") {

                        if (rtnVal.indexOf(";") > -1) {
                            var arrValues = rtnVal.split(";");

                            for (i = 0; i < arrValues.length; i++) {

                                if (userId != arrValues[i].split("|")[1]) {
                                    var elemUsersOnline = $("#onlineUsers").find("#userid-" + arrValues[i].split("|")[1]);

                                    if (elemUsersOnline.html() == undefined) {
                                        //$("#onlineUsers").append("<li id=\"userid-" + arrValues[i].split("|")[1] + "\" onclick=\"createChatTab(" + arrValues[i].split("|")[1] + ", '" + ((arrValues[i].split("|")[1] == 1) ? "Admin" : arrValues[i].split("|")[0]) + "')\"><img class=\"img-rounded\" src=\"{{asset('profiles/no_img.jpg')}}\"/><div class=\"olname\">" + ((arrValues[i].split("|")[1] == 1) ? "Admin" : arrValues[i].split("|")[0]) + "</div><div class=\"olindicator\"><span class=\"fa fa-circle\"></span></div><div style=\"clear:both;\"></div></li>");
                                        var prof_pic = arrValues[i].split("|")[2];
                                        var renderHTML = "<li id=\"userid-" + arrValues[i].split("|")[1] + "\" class=\"chatuserlist\" chatbox-id=\"userid-" + arrValues[i].split("|")[1] + "\" onclick=\"createChatTab(" + arrValues[i].split("|")[1] + ", '" + ((arrValues[i].split("|")[1] == 0) ? "Admin" : arrValues[i].split("|")[0]) + "', '" + prof_pic + "', 0)\">";
                                        renderHTML += "<img class=\"img-rounded chatimg\" src=\"" + ((prof_pic) == "" ? "{{asset('profiles/no_img.jpg')}}" : "{{asset('profiles/')}}" + "/" + prof_pic) + "\"/>";
                                        //renderHTML += "<div class=\"newchatmsg btn btn-primary btn-circle btn-xs\">5</div>";
                                        renderHTML += "<div class=\"olindicator\"><span class=\"fa fa-circle\"></span></div>";
                                        renderHTML += "<div class=\"olname\">";
                                        renderHTML += "<strong class=\"text-primary\">" + arrValues[i].split("|")[0] + "</strong>";
                                        renderHTML += "<div class=\"oltitle\">Executive</div>";
                                        renderHTML += "</div>";
                                        renderHTML += "<div style=\"clear:both;\"></div>";
                                        renderHTML += "</li>";

                                        $("#onlineUsers").append(renderHTML);
                                    }
                                }
                            }
                        } else {
                            if (userId != rtnVal.split("|")[1]) {
                                var elemUsersOnline = $("#onlineUsers").find("#userid-" + rtnVal.split("|")[1]);

                                if (elemUsersOnline.html() == undefined) {
                                    //$("#onlineUsers").append("<li id=\"userid-" + rtnVal.split("|")[1] + "\" onclick=\"createChatTab(" + rtnVal.split("|")[1] + ", '" + ((rtnVal.split("|")[1] == 1) ? "Admin" : rtnVal.split("|")[0]) + "')\"><img class=\"img-rounded\" src=\"{{asset('profiles/no_img.jpg')}}\"/><div class=\"olname\">" + ((rtnVal.split("|")[1] == 1) ? "Admin" : rtnVal.split("|")[0]) + "</div><div class=\"olindicator\"><span class=\"fa fa-circle\"></span></div><div style=\"clear:both;\"></div></li>");
                                    var prof_pic = arrValues[i].split("|")[2];
                                    var renderHTML = "<li id=\"userid-" + arrValues[i].split("|")[1] + "\" class=\"chatuserlist\" chatbox-id=\"userid-" + arrValues[i].split("|")[1] + "\" onclick=\"createChatTab(" + rtnVal.split("|")[1] + ", '" + ((rtnVal.split("|")[1] == 0) ? "Admin" : rtnVal.split("|")[0]) + "', '" + prof_pic + "', 0)\">";
                                    renderHTML += "<img class=\"img-rounded chatimg\" src=\"" + ((prof_pic) == "" ? "{{asset('profiles/no_img.jpg')}}" : "{{asset('profiles/')}}" + "/" + prof_pic) + "\"/>";
                                    //renderHTML += "<div class=\"newchatmsg btn btn-primary btn-circle btn-xs\">5</div>";
                                    renderHTML += "<div class=\"olindicator\"><span class=\"fa fa-circle\"></span></div>";
                                    renderHTML += "<div class=\"olname\">";
                                    renderHTML += "<strong class=\"text-primary\">" + arrValues[i].split("|")[0] + "</strong>";
                                    renderHTML += "<div class=\"oltitle\">Executive</div>";
                                    renderHTML += "</div>";
                                    renderHTML += "<div style=\"clear:both;\"></div>";
                                    renderHTML += "</li>";

                                    $("#onlineUsers").append(renderHTML);
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
            data: {
                chat_id: chatid,
                _token: token
            },
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

    function createChatTab(id, uname, prof_pic, status) {
        var elemChatTabs = $("#chatarea_cont").find("#cb" + id);

        if (elemChatTabs.html() == undefined) {
            var elemToCreate = "<div id=\"cb" + id + "\" class=\"chatarea_body\">";
            elemToCreate += "<div class=\"cinfo_cont\">";
            elemToCreate += "<img class=\"img-rounded chatimg\" src=\"" + ((prof_pic) == "" ? "{{asset('profiles/no_img.jpg')}}" : "{{asset('profiles/')}}" + "/" + prof_pic) + "\"/>";
            elemToCreate += "<div class=\"closechat\" onclick=\"closeChatBox()\"><span class=\"glyphicon glyphicon-chevron-right\"></span></div>";
            elemToCreate += "<div class=\"olname\">";
            elemToCreate += "<strong>" + ((id == 0) ? "Admin" : uname) + "</strong>";
            elemToCreate += "<div class=\"oltitle\">Executive</div>";
            elemToCreate += "</div>";
            elemToCreate += "<div style=\"clear:both;\"></div>";
            elemToCreate += "</div>";
            elemToCreate += "<div class=\"buble_area_container\">";
            elemToCreate += "<div class=\"bubble_area\">";
            elemToCreate += "<ul>";
            //elemToCreate += "<li class=\"status\">is typing a message...</li>";
            elemToCreate += "</ul>";
            elemToCreate += "</div>";
            elemToCreate += "</div>"
            elemToCreate += "<div class=\"cinput_cont\">";
            elemToCreate += "<ul><li id=\"typeStat-" + id + "\" class=\"status\"></li></ul>";
            elemToCreate += "<textarea onclick=\"setReadMsg()\" id=\"chatInput" + id + "\" class=\"chatinput\" rows=\"2\" onkeyup=\"keypress(event, " + id + ")\" placeholder=\"Enter your text here...\"></textarea>";
            elemToCreate += "</div>";
            elemToCreate += "</div>";

            $("#chatarea_cont").append(elemToCreate);
        }

        /*var activeElem = $("#chatarea_cont > div");

        activeElem.each(function() {
            var aa = $(this).html();

            alert(aa);
        });*/

        if (status == 0) {
            $("#chatarea_cont").show();
            $(".chatarea_body").hide();
            $("#cb" + id).show();
        }
    }

    function createChatGroupTab(id, uname, prof_pic, status) {
        var elemChatTabs = $("#chatarea_cont").find("#cbg" + id);

        if (elemChatTabs.html() == undefined) {
            var elemToCreate = "<div id=\"cbg" + id + "\" class=\"chatarea_body\">";
            elemToCreate += "<div class=\"cinfo_cont\">";
            elemToCreate += "<img class=\"img-rounded chatimg\" src=\"" + ((prof_pic) == "" ? "{{asset('profiles/no_img.jpg')}}" : "{{asset('profiles/')}}" + "/" + prof_pic) + "\"/>";
            elemToCreate += "<div class=\"closechat\" onclick=\"closeChatBox()\"><span class=\"glyphicon glyphicon-chevron-right\"></span></div>";
            elemToCreate += "<div class=\"olname\">";
            elemToCreate += "<strong>" + ((id == 0) ? "Admin" : uname) + "</strong>";
            elemToCreate += "<div class=\"oltitle\">Group</div>";
            elemToCreate += "</div>";
            elemToCreate += "<div style=\"clear:both;\"></div>";
            elemToCreate += "</div>";
            elemToCreate += "<div class=\"buble_area_container\">";
            elemToCreate += "<div class=\"bubble_area\">";
            elemToCreate += "<ul>";
            //elemToCreate += "<li class=\"status\">is typing a message...</li>";
            elemToCreate += "</ul>";
            elemToCreate += "</div>";
            elemToCreate += "</div>"
            elemToCreate += "<div class=\"cinput_cont\">";
            elemToCreate += "<ul><li id=\"typeGroupStat-" + id + "\" class=\"status\"></li></ul>";
            elemToCreate += "<textarea onclick=\"setReadMsgGroup()\" id=\"chatGroupInput" + id + "\" class=\"chatinput\" rows=\"2\" onkeyup=\"keypressGroup(event, " + id + ")\" placeholder=\"Enter your text here...\"></textarea>";
            elemToCreate += "</div>";
            elemToCreate += "</div>";

            $("#chatarea_cont").append(elemToCreate);
        }

        /*var activeElem = $("#chatarea_cont > div");

        activeElem.each(function() {
            var aa = $(this).html();

            alert(aa);
        });*/

        if (status == 0) {
            $("#chatarea_cont").show();
            $(".chatarea_body").hide();
            $("#cbg" + id).show();
        }
    }

    function setReadMsg() {
        $("#chatarea_cont > div").each(function () {
            var chatBox = $(this);
            var from_id = "";

            if (chatBox.attr("style") == "display: block;") {
                from_id = chatBox.attr("id").replace("cb", "");

                $.ajax({
                    type: "POST",
                    url: "{{ url('setReadMsgs') }}",
                    data: {
                        from_id: from_id,
                        to_id: userId,
                        _token: token
                    },
                    dataType: "json",
                    success: function (data) {
                        var validation_failed = data.validation_failed;
                        
                        if (validation_failed == 0) {
                            var activeElem = $("#ctr-" + from_id);
                            
                            if (activeElem.html() != undefined) {
                                activeElem.remove();
                            }
                        }
                    }
                });
            }
        });
    }

    function setReadMsgGroup() {
        $("#chatarea_cont > div").each(function () {
            var chatBox = $(this);
            var group_id = "";

            if (chatBox.attr("style") == "display: block;") {
                group_id = chatBox.attr("id").replace("cbg", "");

                $.ajax({
                    type: "POST",
                    url: "{{ url('setReadMsgs') }}",
                    data: {
                        group_id: group_id,
                        _token: token
                    },
                    dataType: "json",
                    success: function (data) {
                        var validation_failed = data.validation_failed;
                        
                        if (validation_failed == 0) {
                            var activeElem = $("#ctrg-" + group_id);
                            
                            if (activeElem.html() != undefined) {
                                activeElem.remove();
                            }
                        }
                    }
                });
            }
        });
    }

    function closeChatBox() {
        $("#chatarea_cont").hide();
    }

    function addMessageToChatBox(usrid, tabid, message) {
        if (message.indexOf("typing") > -1) {
            if (tabid == 0) {
                $("#typeStat-" + tabid).html(message);
            } else {
                if (tabid == userId) {
                    $("#typeStat-" + usrid).html(message);
                }
            }
        } else if (message.indexOf("none") > -1) {
            if (tabid == 0) {
                $("#typeStat-" + tabid).html("");
            } else {
                $("#typeStat-" + usrid).html("");
            }
        } else if (message.indexOf("groupnull") > -1) {
            $("#typeGroupStat-" + usrid).html("");

        } else if (message.indexOf("Connection established!") > -1) {
            getUsersOnline();
        } else if (message.indexOf("is online") > -1) {
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
        } else {
            if (message.indexOf("Me:") > -1) {
                $("#cb" + tabid + " .bubble_area ul").append("<li class=\"self\">" + message + "</li>");
                $("#cb" + tabid + " .bubble_area").animate({
                    scrollTop: $("#cb" + tabid + " .bubble_area ul li:last").offset().top
                }, 1000);
            } else {
                // If from user to user
                if (userId == tabid) {
                    var prof_pic = $("#userid-" + usrid + " img").attr("src");
                    prof_pic = prof_pic.split("/")[4];

                    createChatTab(usrid, message.split(":")[0], prof_pic, 1);

                    $("#cb" + usrid + " .bubble_area ul").append("<li class=\"other\">" + ((usrid == 0) ? "Admin:" + message.split(":")[1] : message) + "</li>");
                    $("#cb" + usrid + " .bubble_area").animate({
                        scrollTop: $("#cb" + usrid + " .bubble_area ul li:last").offset().top
                    }, 1000);
                    
                    $("#chatarea_cont > div").each(function () {
                        var chatBox = $(this);

                        var from_id = chatBox.attr("id").replace("cb", "");

                        if (from_id == usrid) {
                            if (chatBox.css("display") == "none") {
                                var findElem = $("#userid-" + usrid).find("#ctr-" + usrid);

                                if (findElem.html() == undefined) {
                                    $("<div id=\"ctr-" + usrid + "\" class=\"newchatmsg btn btn-primary btn-circle btn-xs\">1</div>").insertAfter("#userid-" + usrid + " > img");
                                }
                                else {
                                    var currCtr = $("#ctr-" + usrid).html();
                                    var newCtr = (parseInt(currCtr)) + 1;

                                    $("#ctr-" + usrid).html(newCtr);
                                }
                            }
                        }
                    });
                }
            }
        }
    }

    function keypress(e, id) {
        if (e.keyCode == 13) {
            var message = $("#chatInput" + id).val();

            if (id == 0) {
                conn.send(userId + ";" + id + ";" + userName + ": " + message);
                addMessageToChatBox(userId, id, "Me: " + message);
            } else {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getUserName') }}",
                    data: {
                        user_id: id,
                        _token: token
                    },
                    dataType: "json",
                    success: function (data) {
                        var validation_failed = data.validation_failed;
                        var rtnVal = data.return_value;
                        var is_active = data.is_active;

                        if (validation_failed == 0) {
                            if (is_active == 1) {
                                // If user is online then do below
                                conn.send(userId + ";" + id + ";" + userName + ": " + message);
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('postMessageToUser') }}",
                                    data: {
                                        from_id: userId,
                                        to_id: id,
                                        message: message,
                                        _token: token
                                    },
                                    dataType: "json",
                                    success: function (data) {}
                                });
                                addMessageToChatBox(userId, id, "Me: " + message);
                            } else {
                                //If user is offline then do below
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('postMessageToUser') }}",
                                    data: {
                                        from_id: userId,
                                        to_id: id,
                                        message: message,
                                        _token: token
                                    },
                                    dataType: "json",
                                    success: function (data) {}
                                });
                                addMessageToChatBox(userId, id, "Me: " + message);
                            }
                        }
                    }
                });
            }

            $("#chatInput" + id).val("");
            conn.send(userId + ";" + id + ";none");
        } else {
            conn.send(userId + ";" + id + ";" + ((userId == 0) ? "Admin is typing ..." : userName + " is typing ..."));
        }
    }

    function keypressGroup(e, id) {
        if (e.keyCode == 13) {
            var message = $("#chatGroupInput" + id).val();

            if (id == 0) {
                conn.send(userId + ";" + id + ";" + userName + ": " + message);
                addMessageToChatBox(userId, id, "Me: " + message);
            } else {
                /*$.ajax({
                    type: "GET",
                    url: "{{ url('getUserName') }}",
                    data: {
                        user_id: id,
                        _token: token
                    },
                    dataType: "json",
                    success: function (data) {
                        var validation_failed = data.validation_failed;
                        var rtnVal = data.return_value;
                        var is_active = data.is_active;

                        if (validation_failed == 0) {
                            if (is_active == 1) {
                                // If user is online then do below
                                conn.send(userId + ";" + id + ";" + userName + ": " + message);
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('postMessageToUser') }}",
                                    data: {
                                        from_id: userId,
                                        to_id: id,
                                        message: message,
                                        _token: token
                                    },
                                    dataType: "json",
                                    success: function (data) {}
                                });
                                addMessageToChatBox(userId, id, "Me: " + message);
                            } else {
                                //If user is offline then do below
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('postMessageToUser') }}",
                                    data: {
                                        from_id: userId,
                                        to_id: id,
                                        message: message,
                                        _token: token
                                    },
                                    dataType: "json",
                                    success: function (data) {}
                                });
                                addMessageToChatBox(userId, id, "Me: " + message);
                            }
                        }
                    }
                });*/
            }

            $("#chatGroupInput" + id).val("");
            conn.send(userId + ";" + id + ";groupnull");
        } else {
            conn.send(userId + ";g-" + id + ";" + ((userId == 0) ? "Admin is typing ..." : userName + " is typing ..."));
        }
    }

    function openChatGroupDialog() {
        dialog.dialog( "open" );
    }

    function createChatGroup() {
        var groupname = $("#groupname").val();
        var chatgroupids = $("#hdnIds").val();

        $.ajax({
            type: "POST",
            url: "{{ url('setChatGroup') }}",
            data: {
                createdby_id: userId,
                groupname: groupname,
                chatgroupids: chatgroupids,
                _token: token
            },
            dataType: "json",
            success: function (data) {
                var validation_failed = data.validation_failed;
                var return_value = data.return_value;

                var renderHTML = "<li id=\"groupid-" + return_value + "\" class=\"chatuserlist\" chatbox-id=\"groupid-" + return_value + "\" onclick=\"createChatGroupTab(" + return_value + ", '" + ((return_value == 0) ? "Admin" : groupname) + "', 'no_img.jpg', 0)\">";
                renderHTML += "<img class=\"img-rounded chatimg\" src=\"{{asset('profiles/no_img.jpg')}}\" />";
                renderHTML += "<div class=\"olindicator\"><span class=\"fa fa-circle\"></span></div>";
                renderHTML += "<div class=\"olname\">";
                renderHTML += "<strong class=\"text-primary\">" + groupname + "</strong>";
                renderHTML += "<div class=\"oltitle\">Group</div>";
                renderHTML += "</div>";
                renderHTML += "<div style=\"clear:both;\"></div>";
                renderHTML += "</li>";

                $("#onlineUsers").append(renderHTML);

                dialog.dialog("close");
            }
        });
        //
    }


    $(document).ready(function () {
        conn = new WebSocket('ws://' + uri + ':' + port);

        conn.onerror = function (event) {}

        conn.onclose = function (event) {
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

        conn.onopen = function (e) {
            setUserOnline(userId);
            addMessageToChatBox(userId, 0, "Connection established!");
            conn.send(userId + ";" + "0;" + userName + " is online");
        };

        conn.onmessage = function (e) {
            if (e.data.indexOf("user_connected") > -1) {
                var r_conn_chatid = e.data.split(";")[0];
                var r_userid = e.data.split(";")[2];

                if (r_conn_chatid == r_userid) {
                    setUserChatId(userId, r_conn_chatid);
                }
            } else if (e.data.indexOf("user_disconnected") > -1) {
                var r_disconn_chatid = e.data.split(";")[0];
                var r_userid = e.data.split(";")[2];

                removeUsersOffline(r_disconn_chatid);
            } else {
                var uid = e.data.split(";")[0];
                var tabid = e.data.split(";")[1];
                var themsg = e.data.split(";")[2];

                addMessageToChatBox(uid, tabid, themsg);
            }
        };


        var btnAddGroup = $(".navbar-top-links").find("#btnAddGroup");

        if (btnAddGroup.html() == undefined) {
            $("<li class=\"dropdown\"><a href=\"javascript:void(0)\" onclick=\"openChatGroupDialog()\">Create Chat Group</a></li>").insertBefore(".navbar-top-links > li:eq(0)");
        }

        var tempValue = "";

        

        $.ajax({
            type: "GET",
            url: "{{ url('getUsersInfo') }}",
            data: {
                authid: userId,
                _token: token
            },
            dataType: "json",
            success: function (data) {
                var validation_failed = data.validation_failed;
                var return_value = data.return_value;

                if (validation_failed == 0) {
                    var arrUsers = return_value.split(";");

                    var x;
                    for (x in arrUsers) {
                        $("#selUsers").append("<option value=\"" + arrUsers[x].split(",")[0] + "\">" + arrUsers[x].split(",")[1] + "</option>");
                    }

                    $("#selUsers").multiselect({
                        click: function(event, ui){

                            if (ui.checked) {
                                tempValue += ui.value + ";"
                            }
                            else {
                                tempValue = tempValue.replace(ui.value + ";", "");
                            }

                            //tempValue = tempValue.substring(0, tempValue.length - 1);

                            $("#hdnIds").val(tempValue);
                        }
                    });

                }
            }
        });

    });
</script>

</body>

</html>