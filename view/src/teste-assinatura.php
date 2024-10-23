<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assinatura Digital</title>
    <style>
        #canvas {
            border: 1px solid black;
            cursor: crosshair;
        }
    </style>
</head>
<body>
    <canvas id="canvas" width="400" height="200"></canvas>
    <button id="saveBtn">Salvar Assinatura</button>
    <script>
// document.addEventListener("DOMContentLoaded", function() {
//     var canvas = document.getElementById('canvas');
//     var ctx = canvas.getContext('2d');
//     var drawing = false;
//     var paths = []; // Armazenar os caminhos (assinatura) desenhados
//     var currentPath = []; // Caminho atual sendo desenhado

//     function startDrawing(e) {
//         drawing = true;
//         currentPath = [];
//         ctx.beginPath();
//         ctx.moveTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
//     }

//     function draw(e) {
//         if (drawing) {
//             var x = e.clientX - canvas.offsetLeft;
//             var y = e.clientY - canvas.offsetTop;
//             ctx.lineTo(x, y);
//             ctx.stroke();
//             currentPath.push({ x: x, y: y });
//         }
//     }

//     function stopDrawing() {
//         if (drawing) {
//             paths.push(currentPath);
//             drawing = false;
//         }
//     }

//     function redrawPaths() {
//         ctx.clearRect(0, 0, canvas.width, canvas.height);
//         ctx.beginPath();
//         paths.forEach(path => {
//             ctx.moveTo(path[0].x, path[0].y);
//             path.forEach(point => {
//                 ctx.lineTo(point.x, point.y);
//             });
//             ctx.stroke();
//         });
//     }

//     canvas.addEventListener('mousedown', startDrawing);
//     canvas.addEventListener('mousemove', draw);
//     window.addEventListener('mouseup', stopDrawing);

//     document.getElementById('saveBtn').addEventListener('click', function() {
//         var dataURL = canvas.toDataURL('image/png');
//         console.log(dataURL);
//     });

//     // Botão Limpar
//     var clearBtn = document.createElement('button');
//     clearBtn.textContent = 'Limpar';
//     document.body.appendChild(clearBtn);
//     clearBtn.addEventListener('click', function() {
//         paths = [];
//         ctx.clearRect(0, 0, canvas.width, canvas.height);
//     });

//     // Botão Desfazer (Undo)
//     var undoBtn = document.createElement('button');
//     undoBtn.textContent = 'Desfazer';
//     document.body.appendChild(undoBtn);
//     undoBtn.addEventListener('click', function() {
//         paths.pop();
//         redrawPaths();
//     });
// });






document.addEventListener("DOMContentLoaded", function() {
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth * 0.9; // Ajusta a largura do canvas para 90% da largura da janela
    canvas.height = 400; // Altura fixa, pode ajustar conforme necessário

    var drawing = false;
    var paths = [];
    var currentPath = [];

    function getXY(e) {
        var x, y;
        if (e.touches && e.touches[0]) {
            x = e.touches[0].clientX;
            y = e.touches[0].clientY;
        } else {
            x = e.clientX;
            y = e.clientY;
        }
        return { x: x - canvas.offsetLeft, y: y - canvas.offsetTop };
    }

    function startDrawing(e) {
        var { x, y } = getXY(e);
        drawing = true;
        currentPath = [];
        ctx.beginPath();
        ctx.moveTo(x, y);
        e.preventDefault(); // Evita rolagem na tela ao desenhar
    }

    function draw(e) {
        if (!drawing) return;
        var { x, y } = getXY(e);
        ctx.lineTo(x, y);
        ctx.stroke();
        currentPath.push({ x: x, y: y });
        e.preventDefault();
    }

    function stopDrawing() {
        if (drawing) {
            paths.push(currentPath);
            drawing = false;
        }
    }

    function redrawPaths() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.beginPath();
        paths.forEach(path => {
            ctx.moveTo(path[0].x, path[0].y);
            path.forEach(point => ctx.lineTo(point.x, point.y));
            ctx.stroke();
        });
    }

    // Eventos de mouse
    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    window.addEventListener('mouseup', stopDrawing);

    // Eventos de toque
    canvas.addEventListener('touchstart', startDrawing);
    canvas.addEventListener('touchmove', draw);
    canvas.addEventListener('touchend', stopDrawing);


    
    document.getElementById('saveBtn').addEventListener('click', function() {
        var dataURL = canvas.toDataURL('image/png');
        console.log(dataURL);
    });

    // Botão Limpar
    var clearBtn = document.createElement('button');
    clearBtn.textContent = 'Limpar';
    document.body.appendChild(clearBtn);
    clearBtn.addEventListener('click', function() {
        paths = [];
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    });

    // Botão Desfazer (Undo)
    var undoBtn = document.createElement('button');
    undoBtn.textContent = 'Desfazer';
    document.body.appendChild(undoBtn);
    undoBtn.addEventListener('click', function() {
        paths.pop();
        redrawPaths();
    });
    // Ajustar o canvas ao redimensionar a janela
    window.addEventListener('resize', function() {
        canvas.width = window.innerWidth * 0.9;
        redrawPaths(); // Redesenhar as assinaturas após o redimensionamento
    });
});

    </script>
</body>
</html>