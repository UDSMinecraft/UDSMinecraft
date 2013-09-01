function countdown(count) {
    if(count === 0) {
        window.location.href = "slide";
    }
    document.getElementById("slide").innerHTML = count + " seconds until new image";
    timer = setTimeout(function(){countdown(--count);},1000);
}
