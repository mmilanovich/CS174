        var request;

        function doAJAX()
        {
            request = new XMLHttpRequest();
            request.open("GET", "welcome.txt");
            request.onreadystatechange = displayFile;
            request.send(null);
        }

        function displayFile()
        {
            if (request.readyState == 4) {
                if (request.status == 200) {
                    var text = request.responseText;
                    text = text.replace(/\n/g, "<br />");
                    document.getElementById("output").innerHTML =
                         "<p align='middle'>" + text + "</p>";
                }
            }
        }