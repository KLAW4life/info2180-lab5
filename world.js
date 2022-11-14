window.addEventListener('load',(event)=>{
    const LOOKUP_BTN = $("#lookup");
    const LOOKUP_CITIES_BTN = $("#lookup-cities");

    LOOKUP_CITIES_BTN.on("click", e=>{

        let country_data = {
            country: $("#country").val()
        };

        // console.log(country_data);
        $.ajax({
            type: "GET",
            url: "world.php",
            data: country_data,
            dataType: "html"

        }).done(response =>{
            $("#result").empty();
            $("#result").append(response);

        }).fail(()=>{
                $("#result").empty();
                $("#result").append("<h3> Data failed to be retrieved from the server.</h3>");
                }
            )
            e.preventDefault();
    });

    LOOKUP_BTN.on("click", e=>{

        let city_data = {
            country: $("#country").val(),
            context: "cities"  //to indicate to search for cities
        }

        // console.log(city_data);
        $.ajax({
            type: "GET",
            url: "world.php",
            data: city_data,
            dataType: "html"

        }).done(response =>{
            $("#result").empty();
            $("#result").append(response);

        }).fail(()=>{
                $("#result").empty();
                $("#result").append("<h3> Could not retrieve data from the server.</h3>");
                }
            )
            e.preventDefault();
    });

});
