window.addEventListener('load',(event)=>{
    const LOOKUP_BTN = $("#lookup");

    LOOKUP_BTN.on("click", e=>{

        let country_data = {
            country: $("#country").val()
        };

        //console.log(country_data);
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

});
