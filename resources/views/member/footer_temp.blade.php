    <div class="navbar-fixed-bottom">
        <div id="chatbox_cont" class="pull-right">
            <ul>

                <li class="chatbox">
                    <div class="chatbox_min">
                        <span class="closechatbox glyphicon glyphicon-open pull-right" box-id="1" href="#"></span>
                        <span class="chatbox_name">Name</span>
                    </div>
                    <div id="cp1" class="chatbox_pop">
                        <div class="chatbox_header">
                            <span class="openchatbox glyphicon glyphicon-save pull-right" box-id="1" href="#"></span>
                            <span class="chatbox_name">Name</span>
                        </div>
                        <div class="chatbox_content">
                            <div class="chatarea">
                                <ul>
                                    <li class="other">
                                        <div class="chattri"></div>
                                        sdsadss sdasdasd asdasd asdasd asd asd asd asd asdsdasdasd asdasd addad
                                    </li>
                                    <li class="other">
                                        <div class="chattri"></div>
                                        sdsadsdad
                                    </li>
                                    <li class="self">
                                        <div class="chattri"></div>
                                        sdsadsdad
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chatbox_footer"><input class="form-control"/></div>
                    </div>
                </li>

                <li class="chatbox">
                    <div class="chatbox_min">
                        <span class="closechatbox glyphicon glyphicon-open pull-right" box-id="2" href="#"></span>
                        <span class="chatbox_name">Name</span>
                    </div>
                    <div id="cp2" class="chatbox_pop">
                        <div class="chatbox_header">
                            <span class="openchatbox glyphicon glyphicon-save pull-right" box-id="2" href="#"></span>
                            <span class="chatbox_name">Name</span>
                        </div>
                        <div class="chatbox_content">
                            <div class="chatarea">
                                <ul>
                                    <li class="other">
                                        <div class="chattri"></div>
                                        sdsadss sdasdasd asdasd asdasd asd asd asd asd asdsdasdasd asdasd addad
                                    </li>
                                    <li class="other">
                                        <div class="chattri"></div>
                                        sdsadsdad
                                    </li>
                                    <li class="self">
                                        <div class="chattri"></div>
                                        sdsadsdad
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chatbox_footer"><input class="form-control"/></div>
                    </div>
                </li>

                <li class="chatbox">
                    <div class="chatbox_min">
                        <span class="closechatbox glyphicon glyphicon-open pull-right" box-id="3" href="#"></span>
                        <span class="chatbox_name">Name</span>
                    </div>
                    <div id="cp3" class="chatbox_pop">
                        <div class="chatbox_header">
                            <span class="openchatbox glyphicon glyphicon-save pull-right" box-id="3" href="#"></span>
                            <span class="chatbox_name">Name</span>
                        </div>
                        <div class="chatbox_content">
                            <div class="chatarea">
                                <ul>
                                    <li class="other">
                                        <div class="chattri"></div>
                                        sdsadss sdasdasd asdasd asdasd asd asd asd asd asdsdasdasd asdasd addad
                                    </li>
                                    <li class="other">
                                        <div class="chattri"></div>
                                        sdsadsdad
                                    </li>
                                    <li class="self">
                                        <div class="chattri"></div>
                                        sdsadsdad
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chatbox_footer"><input class="form-control"/></div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
    <script>
        $(".openchatbox").click(function() {
            var boxid = $(this).attr('box-id');
            $("#cp"+boxid).hide();
        });
        $(".closechatbox").click(function() {
            var boxid = $(this).attr('box-id');
            $("#cp"+boxid).show();
        });
    </script>
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>

</html>