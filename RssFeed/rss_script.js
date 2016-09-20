$.get("https://www.reddit.com/.rss", function(data) {
    var card = "";
    $(data).find("entry").each(function() { // or "item" or whatever suits your feed
        var el = $(this);
        var jQueryObject = $($.parseHTML(el.find("content").text()));
        imgsource = jQueryObject.find("img").attr("src");
        imghref = jQueryObject.find("img").parent().attr("href");
        if (typeof(imgsource) != "undefined") {
            var removedImage = jQueryObject.find("img").remove().end();
            var content = "<div class='text full hide'>\
            " + $(removedImage).html() + " \
            </div>";
        } else {
            var removedImage = el.find("content");
            var content = "<div class='text full hide'>\
          " + $(removedImage).text() + " \
          </div>";
        }
        var img = "";
        if (typeof(imgsource) != "undefined") {
            img = "<img src='" + imgsource + "' alt='' class='img-responsive' style=''>"
        }
        card = card + "<li class='media element'>\
                      <a href='" + imghref + "' target='_blank' class='pull-left'  style='max-width:110px;min-width:110px;'>\
                    " + img + "\
        					</a>\
                  <span onclick = 'deletecard(this)'><i class='collapse-icon glyphicon glyphicon glyphicon-remove'></i></span>\
                  <div class='read-more media-body'>\
                  <br>\
        						<span><i class='expansion collapse-icon glyphicon glyphicon-menu-down'></i></span>\
        						<a href = '" + $(el.find("link")[0]).attr("href") + "'><strong class='title' >" + el.find("title").text() + " </strong></a>\
        						<span class='text-muted byline'>\
        							<small class='text-muted' >" + moment(el.find("updated").text()).format('MMMM DD, YYYY HH:mm A') + "</small>\
        						</span>\
        						<div class='article'>\
        							<div class='text short'></div>\
                         " + content + "\
        						</div>\
        					</div>\
        				</li>";
    });
    $("#card-stack").append(card);
    $(".element").show();
});
