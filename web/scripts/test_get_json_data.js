function test()
{
    // Ejemplo de
    // https://developer.mozilla.org/en-US/docs/Learn/JavaScript/Objects/JSON
    var requestUrl = "../scripts/service/rest/req_events.php?evId=null&tpId=";
    var request = new XMLHttpRequest();
    request.open('GET', requestUrl);
    request.responseType = 'json';
    request.send();

    request.onload = function()
    {
        try {
            var response = request.response;
            console.log(response);
            return response;
        } catch (error) {
            console.log("Hubo un error al obtener la información (JSON)");
            console.log(error.error);
            return null;
        }
    }
}