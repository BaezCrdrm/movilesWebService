var firstCharge = true;

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

function onDateTimePickerChange()
{
    var dl = document.getElementById("dtlDateTime");
    var d2 = document.getElementById("dtlDateTimeEnd");
    d2.max = dl.max;
    d2.min = dl.value;
    d2.value = d2.min;
}

function onNewLoadEvent()
{
    var dl = document.getElementById("dtlDateTime");

    var d = new Date();
    if(dl.value == "")
    {
        var mind = d.getFullYear() + "-" + addZero(d.getMonth() + 1,9) + "-" + addZero(d.getDate(),9) + "T" + addZero(d.getHours(),9) + ":" + addZero(d.getMinutes(),9) + ":00";
        var maxd = parseInt(d.getFullYear() + 1) + "-" + addZero(d.getMonth() + 1,9) + "-" + addZero(d.getDate(),9) + "T" + addZero(d.getHours(),9) + ":" + addZero(d.getMinutes(),9) + ":00";
        dl.value = mind;
        dl.min = mind;
        dl.max = maxd;
    }

    if(firstCharge == false)
        onDateTimePickerChange();
    else
        firstCharge = false;
}

function addZero(value, max)
{
    try {
        if(value <= max)
            return "0" + value;
        else
            return value;
    } catch (error) {
        return value;
    }    
}