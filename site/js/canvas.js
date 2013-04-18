function getOffset( el ) {
    var _x = 0;
    var _y = 0;
    while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
    }
    return { top: _y, left: _x };
}

function draw() {
	var ctx = document.getElementById('canvas').getContext('2d');
	var panelHandlePos = getOffset(document.getElementById('panelHandle')).left;
	ctx.canvas.width = window.innerWidth - panelHandlePos /*-40*/;
	ctx.canvas.height = window.innerHeight-2;
	//...drawing code...
}