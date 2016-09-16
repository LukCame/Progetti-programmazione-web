"use strict";
var positions;
var numMoves;
var backgrand;

function reloadPosition() {
    positions = shuffle();
    numMoves = 0;
}

function loadGame() {
    var divGame = document.getElementById('game');
    var rand = Math.round(1 * Math.random());
    backgrand = 1;
    for (var i = 1; i <= 15; i++) {
        var divCell = document.createElement('div');
        divCell.innerHTML = i;
        if (rand === 1)
            var url = "url('img/2bg" + i + ".jpg')";
        else
            var url = "url('img/bg" + i + ".jpg')";
        divCell.style.backgroundImage = url;
        divGame.appendChild(divCell);
    }
    var divBanner = document.createElement('div');
    divBanner.id = "banner";
    divBanner.innerHTML = "Bravo!! Hai vinto";
    document.body.appendChild(divBanner);
    var buttons = document.getElementsByTagName('button');
    var button = buttons[0];
    button.type = "button";
    button.addEventListener("click", reloadPosition);
    button.addEventListener("click", startGame);
}

function shuffle() {
    var positions = [[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12], [13, 14, 15, 0]];
    var index = -1;
    var j;
    var move1;
    var move2;
    var move3;
    var move4;
    for (var i = 1; i <= 1000; i++) {
        j = 0;
        index = -1;
        while (index === -1 && j <= 3) {
            index = positions[j].indexOf(0);
            if (index !== -1) {
                break;
            }
            j = j + 1;
        }
        if (j + 1 <= 3) {
            move1 = true;
        } else {
            move1 = false;
        }
        if (j - 1 >= 0) {
            move2 = true;
        } else {
            move2 = false;
        }
        if (index + 1 <= 3) {
            move3 = true;
        } else {
            move3 = false;
        }
        if (index - 1 >= 0) {
            move4 = true;
        } else {
            move4 = false;
        }
        var movesAllowed = [];
        if (move1 === true) {
            movesAllowed.push(1);
        }
        if (move2 === true) {
            movesAllowed.push(2);
        }
        if (move3 === true) {
            movesAllowed.push(3);
        }
        if (move4 === true) {
            movesAllowed.push(4);
        }
        var num = Math.round((movesAllowed.length - 1) * Math.random());
        var move = movesAllowed[num];
        switch (move) {
            case 1:
                positions[j][index] = positions[j + parseInt(1)][index];
                positions[j + parseInt(1)][index] = 0;
                break;
            case 2:
                positions[j][index] = positions[parseInt(j - 1)][index];
                positions[parseInt(j - 1)][index] = 0;
                break;
            case 3:
                positions[j][index] = positions[j][index + parseInt(1)];
                positions[j][index + parseInt(1)] = 0;
                break;
            case 4:
                positions[j][index] = positions[j][parseInt(index - 1)];
                positions[j][parseInt(index - 1)] = 0;
                break;
        }
    }
    return positions;
}

function startGame() {
    switch (backgrand) {
        case 0:
            backgrand = 1;
            break;
        case 1:
            backgrand = 0;
            break;
    }
    document.getElementById("banner").style.display = "none";
    document.getElementById("game").style.position = "relative";
    var divs = document.querySelectorAll("#game div");
    var moves = document.getElementById('status');
    moves.innerHTML = "Numero mosse: <span>" + numMoves + "</span>";
    for (var i = 0; i < 15; i++) {
        divs[i].style.float = "none";
        divs[i].style.position = "absolute";
    }
    var k = 0;
    for (var i = 0; i < 4; i++) {
        for (var j = 0; j < 4; j++) {
            if (positions[i][j] !== 0) {
                divs[k].innerHTML = positions[i][j];
                if (backgrand === 1)
                    divs[k].style.backgroundImage = "url('img/2bg" + positions[i][j] + ".jpg')";
                else
                    divs[k].style.backgroundImage = "url('img/bg" + positions[i][j] + ".jpg')";
                divs[k].style.left = j * 25 + "%";
                divs[k].style.top = i * 25 + "%";
                divs[k].id = positions[i][j];
                var pos = positions[i][j];
                switch (pos) {
                    case 0:
                        break;
                    case 1:
                        document.getElementById(1).onmouseover = function () {
                            move(1);
                        };
                        break;
                    case 2:
                        document.getElementById(2).onmouseover = function () {
                            move(2);
                        };
                        break;
                    case 3:
                        document.getElementById(3).onmouseover = function () {
                            move(3);
                        };
                        break;
                    case 4:
                        document.getElementById(4).onmouseover = function () {
                            move(4);
                        };
                        break;
                    case 5:
                        document.getElementById(5).onmouseover = function () {
                            move(5);
                        };
                        break;
                    case 6:
                        document.getElementById(6).onmouseover = function () {
                            move(6);
                        };
                        break;
                    case 7:
                        document.getElementById(7).onmouseover = function () {
                            move(7);
                        };
                        break;
                    case 8:
                        document.getElementById(8).onmouseover = function () {
                            move(8);
                        };
                        break;
                    case 9:
                        document.getElementById(9).onmouseover = function () {
                            move(9);
                        };
                        break;
                    case 10:
                        document.getElementById(10).onmouseover = function () {
                            move(10);
                        };
                        break;
                    case 11:
                        document.getElementById(11).onmouseover = function () {
                            move(11);
                        };
                        break;
                    case 12:
                        document.getElementById(12).onmouseover = function () {
                            move(12);
                        };
                        break;
                    case 13:
                        document.getElementById(13).onmouseover = function () {
                            move(13);
                        };
                        break;
                    case 14:
                        document.getElementById(14).onmouseover = function () {
                            move(14);
                        };
                        break;
                    case 15:
                        document.getElementById(15).onmouseover = function () {
                            move(15);
                        };
                        break;
                }
                k = k + 1;
            }
        }
    }
}

function move(k) {
    var j = 0;
    var index = -1;
    while (index === -1 && j <= 3) {
        index = positions[j].indexOf(k);
        if (index !== -1) {
            break;
        }
        j = j + 1;
    }
    var zj = 0;
    var zindex = -1;
    while (zindex === -1 && zj <= 3) {
        zindex = positions[zj].indexOf(0);
        if (zindex !== -1) {
            break;
        }
        zj = zj + 1;
    }
    if ((j - 1 === zj && index === zindex) || (j + 1 === zj && index === zindex) || (j === zj && index - 1 === zindex) || (j === zj && index + 1 === zindex)) {
        var div = document.getElementById(k);
        div.style.borderColor = "red";
        div.style.color = "red";
        div.style.cursor = "pointer";
        div.onclick = function () {
            click(k);
        };
        div.onmouseout = function () {
            div.style.borderColor = "black";
            div.style.color = "black";
            div.style.cursor = "default";
        };
    }
}

function click(k) {
    numMoves = numMoves + parseInt(1, 10);
    document.getElementById('status').innerHTML = "Numero mosse: <span>" + numMoves + "</span>";
    var divs = document.querySelectorAll("#game div");
    for (i = 0; i <= 14; i++) {
        divs[i].onclick = null;
    }
    var zj = 0;
    var zindex = -1;
    while (zindex === -1 && zj <= 3) {
        zindex = positions[zj].indexOf(0);
        if (zindex !== -1) {
            break;
        }
        zj = zj + 1;
    }
    var j = 0;
    var index = -1;
    while (index === -1 && j <= 3) {
        index = positions[j].indexOf(k);
        if (index !== -1) {
            break;
        }
        j = j + 1;
    }
    var div = document.getElementById(k);
    div.style.top = zj * 25 + "%";
    div.style.left = zindex * 25 + "%";
    positions[j][index] = 0;
    positions[zj][zindex] = k;
    var divs = document.querySelectorAll("#game div");
    var array = [[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12], [13, 14, 15, 0]];
    var different = false;
    for (var i = 0; i < 4; i++) {
        for (var j = 0; j < 4; j++) {
            if (array[i][j] !== positions[i][j]) {
                different = true;
                break;
            }
        }
        if (different === true) {
            break;
        }
    }
    if (different === false) {
        document.getElementById("banner").style.display = "block";
        document.getElementById("banner").style.position = "static";
        var divs = document.querySelectorAll("#game div");
        for (var j = 0; j <= 14; j++) {
            divs[j].onmouseover = null;
        }
    }
}

window.onload = function () {
    loadGame();
};