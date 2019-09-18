var keys = {};

function trackMultipleKeyStroke (e) {
    e = e || event;
    e.which = e.which || e.keyCode;
  
    keys[e.which] = e.type === 'keydown';

    if (keys[17] && keys[77]) {
		$('.icon-bar a').css('margin-left', '4%');
$("#admin").show();
    }
}

function addEvent(element, event, func) {
    if (element.attachEvent) {
        return element.attachEvent('on' + event, func);
    } else {
        return element.addEventListener(event, func, false);
    }
}

addEvent(window, "keydown", trackMultipleKeyStroke);
addEvent(window, "keyup", trackMultipleKeyStroke);