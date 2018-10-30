function modalOpen(event) {
    event.preventDefault();
    
    var background = document.createElement('div');
    background.className = 'modal-background';
    var width = window.innerWidth;
    var height = window.innerHeight;
    var fontSize = window.getComputedStyle(document.getElementsByTagName('html')[0]).getPropertyValue('font-size');
    fontSize = parseInt(fontSize.substring(0, fontSize.indexOf('px')));
    background.style.width = width / fontSize + 'rem';
    background.style.height = height / fontSize + 'rem';
    document.body.appendChild(background);
    
    var modal = document.getElementsByClassName('modal')[0];
    modal.style.display = 'block';
    setTimeout(function() {
        modal.style.top = (height / 2 - modal.offsetHeight / 2) / fontSize + 'rem';
    }, 10);
}

function modalClose(event) {
    event.preventDefault();
    var modal = document.getElementsByClassName('modal')[0];
    
    while (modal.firstElementChild.tagName !== 'BUTTON') {
        modal.firstElementChild.remove();
    }
    
    modal.style.top = '100%';
    modal.style.display = 'none';
    var background = document.getElementsByClassName('modal-background')[0];
    background.remove();
}