var modalApp =  document.querySelector('#modalApp');
var modalFrame = document.querySelector('#modalFrame');

window.addEventListener('message', (e) => {
    // Filter only events we want to listen
    if (e.data.location) {
        // Emit confirmed so we can close the modal
        //emit('confirmed', e.data);
        console.log(e.data);
        closeModal();
    } else if (e.data.height) {
        console.log('setting frame height');
        modalFrame.style.height = e.data.height + 'px';
    }
});

function closeModal() {
    if (modalApp) {
        modalApp.remove();
    }
}




