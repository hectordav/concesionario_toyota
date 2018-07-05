var tiemposcambian = tiemposcambian || {};

tiemposcambian.GuardandoPNGs = (function() {
  var mousePressed = false;
  var lastX, lastY;
  var ctx;
  var image = new Image();
   image.onload = function() {
        ctx.drawImage(image, 0, 0,868,450);
      };
  image.src = "../assets/img/corolla_3.png";

  function init() {
    // init canvas
    // algo va aqui
    var canvas = document.getElementById('canvas');
    ctx = canvas.getContext('2d');
   /* resetCanvas();*/

    // button events
  /*  document.getElementById('bt-save').onmouseup = sendToServer;*/
  /*  document.getElementById('bt-clear').onmouseup = resetCanvas;*/

    // canvas events
    canvas.onmousedown = function(e) {
      draw(e.layerX, e.layerY);
      mousePressed = true;
    };

    canvas.onmousemove = function(e) {
      if (mousePressed) {
        draw(e.layerX, e.layerY);
      }
    };

    canvas.onmouseup = function(e) {
      mousePressed = false;
    };
    
    canvas.onmouseleave = function(e) {
      mousePressed = false;
    };
  }

  function draw(x, y) {
    if (mousePressed) {
      ctx.beginPath();
      ctx.strokeStyle = document.getElementById('color').value;
      ctx.lineWidth = 2;
      ctx.lineJoin = 'round';
      ctx.moveTo(lastX, lastY);
      ctx.lineTo(x, y);
      ctx.closePath();
      ctx.stroke();
    }
    lastX = x; lastY = y;
  }

  function sendToServer() {
    /*var data = canvas.toDataURL('image/png');
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      // request complete
      if (xhr.readyState == 4) {
        window.open('http://www.lostiemposcambian.com/blog/posts/guardando-pngs-html5/snapshots/'+xhr.responseText,'_blank');
      }
    }
    xhr.open('POST','http://www.lostiemposcambian.com/blog/posts/guardando-pngs-html5/snapshot.php',true);
    xhr.setRequestHeader('Content-Type', 'application/upload');
    xhr.send(data);*/
  }
var button = document.getElementById('btn-download');
button.addEventListener('click', function (e) {
    var dataURL = canvas.toDataURL('image/jpeg');
    button.href = dataURL;
});



  function resetCanvas() {
    // just repaint canvas white
    ctx.fillStyle = '#EEEEEE';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
  }

  return {
    'init': init
  };
});


window.onload = function() {
  new tiemposcambian.GuardandoPNGs().init();
};
