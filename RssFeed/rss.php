<?php header('Access-Control-Allow-Origin: *');   ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <![endif]-->
    <title>Niki.ai</title>
    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="rss_style.css">
</head>

<body>
    <div id="wrapper" style="width: 100%; height: 100%; overflow: auto; position: relative; -webkit-overflow-scrolling: touch;">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header text-center">
                    <a class="navbar-brand" target="_blank" href="#"><img class="img-responsive" src="http://emcrit.org/wp-content/uploads/2016/04/Reddit_Logo_Wide.jpg"></a>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div id="message" style="display:none;">
                <div style="padding: 5px;cursor:pointer;">
                    <div id="alert" class="alert alert-success text-center" role="alert"></div>
                </div>
            </div>
            <div class="twt-wrapper">
                <div class="header panel panel-info container">
                    <div class="panel-body">
                        <ul id="card-stack" class="media-list">
                        </ul>
                        <i id="loader" class="fa fa-refresh fa-5x fa-spin text-center"></i>
                        <div id="loadmore" class="text-center"><button type="button" class="btn btn-info">Load More</button></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="fixed footer panel-footer text-center">
                        Current Date Time :
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
    <script src="http://momentjs.com/downloads/moment.js"></script>
    <script>
        var max_chars = 30;

        function deletecard(elem) {
            elem.closest('li').remove();
        }

        function expandText() {
            var $fullElem = $(this).parent().find(".text.full");
            $fullElem.toggleClass("hide");
            $(this).closest('li').find('i.expansion').toggleClass('glyphicon-menu-down').toggleClass('glyphicon-menu-up');
        }
        $(document).ready(function() {
            $("body").off("click", ".read-more", expandText);
            $("body").on("click", ".read-more", expandText);
            $(".element").show();
            $('#card-stack').imagesLoaded(function() {
                // images have loaded
                $("#loader").hide();
                $(".element").show();
            });
            setInterval(function() {
                var date = moment();
                date = date.toISOString()
                $(".panel-footer p").html(date);
            });
        }, 10);
    </script>
    <script src="rss_script.js"></script>
</body>
</html>
