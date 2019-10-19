window.onload = function () {
  window.images = document.querySelectorAll('.icon');
}


function hasIcon(target) {
  for (var i = 0; i < images.length; i++) {
    if (target.contains(images[i])) {
      return true;
    }
  }
}

function positionTable(target) {
  return target.match(/(\d+)$/)[0]
}

function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
  ev.dataTransfer.setData("icon-class", ev.target.classList[1]);
  ev.dataTransfer.setData("old-div", ev.path[1].id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");

  if (ev.dataTransfer.getData("icon-class") !== 'undefined' && hasIcon(ev.target)) {
    var newIcon = document.getElementById(data);
    var oldIcon = ev.target;
    var oldDiv = document.getElementById(ev.dataTransfer.getData("old-div"));
    var oldPosTable = positionTable(oldDiv.id);
    var newPosTable = positionTable(ev.target.parentElement.id);

    ev.target.parentElement.appendChild(newIcon);
    oldDiv.appendChild(oldIcon);

    document.getElementById("myinput" + newPosTable).value = data;
    document.getElementById("myinput" + oldPosTable).value = oldIcon.id;
  }

  for (var i = 0; i < images.length; i++) {
    if (ev.target.contains(images[i])) {
      return;
    }
  }

  document.getElementById(data).classList.add('icon-table');

  ev.target.appendChild(document.getElementById(data));

  var posTable = positionTable(ev.target.id);

  document.getElementById("myinput" + posTable).value = data;
}