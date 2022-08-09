function attachAbroadEventListener() {
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

function closeModal() {
    document.querySelector('#modalApp').remove();
}

function getModalHtml() {
    let link = '/quote';
    let scripts = '<script src="https://unpkg.com/axios/dist/axios.min.js"></script>';
    scripts += '<link rel="stylesheet" href="/burnless-client/style.css">';

    return `<div id="modalApp"><div class="relative z-10"><div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div><div class="fixed z-10 inset-0 overflow-y-auto"><div class="flex items-center justify-center min-h-full text-center"><div class="relative bg-white rounded-lg overflow-hidden shadow-xl" style="min-width: 640px;"><iframe id="modalFrame" src="${link}"></iframe></div></div></div></div></div>${scripts}`;
}

async function init() {

    // Attach app html
    document.body.innerHTML += getModalHtml();

    // Attach event listener from to listen events from the iframe
    attachAbroadEventListener();

    let burnlessData = window.localStorage.getItem('burnlessData');

    if (burnlessData === null) {
        const resp = await axios.get('/settings');
        console.log(resp.data);
        window.localStorage.setItem('burnlessData', JSON.stringify(resp.data));
    }
}

init();


