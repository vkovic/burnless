var modalApp = document.querySelector('#modalApp');
var modalFrame = document.querySelector('#modalFrame');

window.addEventListener('message', (e) => {
    const abroadMessage = e.data.abroadMessage;

    if (abroadMessage) {
        // Filter only events we want to listen
        if (abroadMessage.height) {
            console.log('setting frame height');

            modalFrame.style.height = abroadMessage.height + 'px';
        } else {
            console.log({abroadMessage});

            closeModal();
        }
    }
});

function closeModal() {
    if (modalApp) {
        modalApp.remove();
    }
}




