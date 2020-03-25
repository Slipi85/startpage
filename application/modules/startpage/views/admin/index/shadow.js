function changeShadow() {
    var blur = document.getElementById('blur').value;
    var spread = document.getElementById('spread').value;
    var opacity = document.getElementById('opacity').value;
    var shadow = '(0px,0px,'+ blur +'px,' + spread + 'px,' + opacity +')';
    document.getElementById('boxshadow').style.boxShadow = shadow;
    document.getElementById('shadowOutput').innerHTML = ':' + shadow;
}
document.getElementById('blur').addEventlistener('input',changeShadow);
document.getElementById('spread').addEventlistener('input',changeShadow);
document.getElementById('opacity').addEventlistener('input',changeShadow);