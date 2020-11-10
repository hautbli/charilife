function timedCount() {
    postMessage('test');
    setTimeout("timedCount()", 5000);
}

timedCount();


