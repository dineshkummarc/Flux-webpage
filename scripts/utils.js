/**
 * @author Flexible User Experience SL
 * @copyright 2011
 * coded with WebStorm
 */

var UT = {
    writeCookie:function(name, value, days) {
      // By default, there is no expiration so the cookie is temporary
      var expires = "";
      // Specifying a number of days makes the cookie persistent
      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
      }
      // Set the cookie to the name, value, and expiration date
      //console.log('name=' + name + ' value=' + value + ' expires=' + expires);
      document.cookie = name + "=" + value + expires + "; path=/";
    },
    readCookie:function(name) {
      // Find the specified cookie and return its value
      var searchName = name + "=";
      var cookies = document.cookie.split(';');
      for(var i=0; i < cookies.length; i++) {
        var c = cookies[i];
        while (c.charAt(0) == ' ')
          c = c.substring(1, c.length);
        if (c.indexOf(searchName) == 0) {
            //console.log(searchName.length + ' '  + c.length);
            return c.substring(searchName.length, c.length);
        }
      }
      //console.log(name + ' cookie NOT found');
      return null;
    },
    eraseCookie:function(name) {
      // Erase the specified cookie
      UT.writeCookie(name, "", -1);
    },
    addEventHandler:function(obj, eventName, handler) {
        if (document.addEventListener) {
            //si el navegador soporta la funcion addEventListener se trata de un navegador con soporte DOM level 2 (Firefox, Safari, Opera...)
            //por lo tanto se asigna al objeto el manejador con la funcion correspondiente
            obj.addEventListener(eventName, handler, false);
        } else if (document.attachEvent) {
            //si el navegador soporta la funcion attachEvent se trata de un navegador sin soporte DOM level 2 (Internet Explorer)
            //por lo tanto se asigna al objeto el manejador con la funcion correspondiente añadiendo el texto "on" delante del nombre del evento
            obj.attachEvent("on"+eventName, handler);
        }
    }
}