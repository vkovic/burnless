interface PopupScore {
    type: string,
    score: number,
}

const emitPopupScore = (data): void => {
    window.parent.postMessage({
        location: window.location.href,
        popupScore: data
    }, '*');
};

// Share server data to client
const shareServerData = (data): void => {
    window.parent.postMessage({
        location: window.location.href,
        serverData: data
    }, '*');
};

export { emitPopupScore, shareServerData, PopupScore };
