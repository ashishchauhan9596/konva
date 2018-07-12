
<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.rawgit.com/konvajs/konva/2.1.7/konva.min.js"></script>
  <meta charset="utf-8">
  <title>Konva Rect Demo</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #F0F0F0;
        }
        #buttons {
      position: absolute;
      top: 5px;
      left: 10px;
    }

    #buttons>input {
      padding: 10px;
      display: block;
      margin-top: 5px;
    }
    </style>
</head>
<body>
 <div id="container"></div>
  <div id="buttons">
    <input type="button" id="activate" value="Activate rectangle">
  </div>
 <script>
    var width = window.innerWidth;
    var height = window.innerHeight;

    var stage = new Konva.Stage({
        container: 'container',
        width: width,
        height: height
    });

    var layer = new Konva.Layer();
    var rectX = stage.getWidth() / 2 - 50;
    var rectY = stage.getHeight() / 2 - 25;

    var boxA = new Konva.Rect({
        x: rectX,
        y: rectY,
        width: 100,
        height: 50,
        fill: '#00D2FF',
        stroke: 'black',
        strokeWidth: 4,
        draggable: true
    });

    var boxB = new Konva.Rect({
        x: rectX,
        y: rectY,
        width: 100,
        height: 50,
        fill: 'red',
        stroke: 'black',
        strokeWidth: 4,
        draggable: true,
        id: 'myBox'
    });

    // add cursor styling
    boxA.on('mouseover', function() {
        document.body.style.cursor = 'pointer';
    });
    boxA.on('mouseout', function() {
        document.body.style.cursor = 'default';
    });
    boxA.on('click', function() {
      var fill = this.fill() == 'red' ? '#00D2FF' : 'red';
      this.fill(fill);
      layer.draw();
    });
    // add cursor styling
    boxB.on('mouseover', function() {
        document.body.style.cursor = 'pointer';
    });
    boxB.on('mouseout', function() {
        document.body.style.cursor = 'default';
    });
    boxB.on('click', function() {
      var fill = this.fill() == 'red' ? '#00d00f' : 'red';
      this.fill(fill);
      layer.draw();
    });

    layer.add(boxA,boxB);
    stage.add(layer);
    var tween;

    document.getElementById('activate').addEventListener('click', function () {
      // or var shape = stage.findOne('#myRect');
      var shape = stage.find('#myBox')[0];

      if (tween) {
        tween.destroy();
      }

      tween = new Konva.Tween({
        node: shape,
        duration: 1,
        scaleX: Math.random() * 2,
        scaleY: Math.random() * 2,
        easing: Konva.Easings.ElasticEaseOut
      }).play();
    }, false);
</script>

</body>
</html>