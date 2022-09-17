function attachAbroadEventListener() {
    // When user clicks button on Popup, part of the logic will be handled by Server
    // (in client/server concept, Client = User interacting with popup, Server = Laravel Backend)
    window.addEventListener('message', (e) => {
        const abroadMessage = e.data.abroadMessage;

        if (abroadMessage) {
            // Filter only events we want to listen
            if (abroadMessage.height) {
                console.log('setting frame height');

                document.querySelector('#modalFrame').style.height = abroadMessage.height + 'px';
            } else {
                console.log({abroadMessage});

                closeModal();
            }
        }
    });
}

function getSettings() {
    return JSON.parse(window.localStorage.getItem('burnlessSettings'));
}

function setSettings(value) {
    window.localStorage.setItem('burnlessSettings', JSON.stringify(value));
}

function loadModal(url) {
    document.body.innerHTML += modalHtml(url);
}

function closeModal() {
    document.querySelector('#modalApp').remove();
}

function modalHtml(url) {
    return `<div id="modalApp"><div class="relative z-10">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
        </div><div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-full text-center">
        <div class="relative bg-white rounded-lg overflow-hidden shadow-xl" style="min-width: 640px;">
        <iframe id="modalFrame" src="${url}"></iframe></div></div></div></div></div>
        <link rel="stylesheet" href="/burnless-client/style.css">`;
}

function watchDog() {
    var interval = window.setInterval(function () {
        let settings = getSettings();

        for (const module of settings) {
            if (module.score === null) {
                loadModal(module.url);
                clearInterval(interval);
                break;
            }
        }
    }, 2000);
}

async function init() {
    // Attach event listener from to listen events from the iframe
    attachAbroadEventListener();

    if (getSettings() === null) {
        let resp = await fetch('/settings');

        setSettings(await resp.json());
    }

    watchDog();
};

init();


