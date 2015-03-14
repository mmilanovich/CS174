/*
Adapted from JavaScript, 9th edition
by Tom Negrino and Dori Smith
PeachPit Press, 2015
ISBN 978-0-321-99670-1
*/

window.onload = init;

function init() 
{
    var allLinks = document.getElementsByTagName("a");

    for (var i=0; i<allLinks.length; i++) {
        if (allLinks[i].className == "menuLink") {
            allLinks[i].onmouseover = toggleMenu;
            allLinks[i].onclick = clickHandler;
        }
    }
}

function clickHandler(event) 
{
    event.preventDefault();
}

function toggleMenu() 
{
    var startMenu    = this.href.lastIndexOf("/") + 1;
    var stopMenu     = this.href.lastIndexOf(".");
    var thisMenuName = this.href.substring(startMenu,stopMenu);

    var menuParent    = document.getElementById(thisMenuName).parentNode;
    var thisMenuStyle = document.getElementById(thisMenuName).style;
    
    thisMenuStyle.display = "block";

    menuParent.onmouseout = function() 
    {
        thisMenuStyle.display = "none";
    };
        
    menuParent.onmouseover = function() 
    {
        thisMenuStyle.display = "block";
    };
}