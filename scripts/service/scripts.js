function checkedChange(object)
{
    var ulSelectedCh = document.getElementById("ulSelectedChannels");  
    if(object.checked == true)
    {
        var newSelli = document.createElement("li");
        newSelli.id = "sel_" & object.id;
        newSelli.value = object.value;
        newSelli.innerText = object.alt; 
        ulSelectedCh.appendChild(newSelli);
    } else {
        var oldSelli = document.getElementById("sel_" & object.id);
        ulSelectedCh.removeChild(oldSelli);
    }
}