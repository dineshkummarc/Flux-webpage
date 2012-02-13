function makeHoverInEffect(evt) {
	var obj = document.getElementById(evt.id);
	var newSrc = obj.src.substring(0, obj.src.indexOf('.png')) + '-color.png';
	obj.src = newSrc;
	//console.log('[makeHoverInEffect] Hi! EventID = ' + evt.id);
	//console.log('[makeHoverInEffect] Current SRC = ' + obj.src);
	//console.log('[makeHoverInEffect] New SRC = '     + newSrc);	
}

function makeHoverOutEffect(evt) {
	var obj = document.getElementById(evt.id);
	var newSrc = obj.src.substring(0, obj.src.indexOf('-color.png')) + '.png';
	obj.src = newSrc;
	//console.log('[makeHoverOutEffect] Hi! EventID = ' + evt.id);
	//console.log('[makeHoverOutEffect] Current SRC = ' + obj.src);
	//console.log('[makeHoverOutEffect] New SRC = '     + newSrc);	
}