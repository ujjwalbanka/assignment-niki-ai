$(".submit").click(function() {
    $(".result").html(""); //empty the result container after submitting
    var a = $(".data").val(); // Get the query String
    var b = a.split(/\n/); // Split each string in a array
    b.sort(function(x, y) { // String Sort function
        return x.length < y.length;
    });
    $.each(b, function(inex, value) { // Putting the sorrted string in result textarea
        $(".result").append(value + "\r\n");
    })
});
