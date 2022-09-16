const emitAbroad = (data): void => {
    window.parent.postMessage({
        location: window.location.href,
        abroadMessage: data
    }, '*');
};

export { emitAbroad };
