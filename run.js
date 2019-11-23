var s = new Speedtest();

function renderNumber(number) {
    if (isNaN(number)) {
        return number;
    }
    var flt = parseFloat(number);
    if (flt < 10) {
        return flt.toFixed(1);
    }
    if (flt >= 10) {
        return flt.toFixed(0);
    }
    return number;
}

s.onupdate = function(data){
    if (data.testState == 5) {
        // Speedtest is aborted, leave info intact.
        return;
    }
    I(      "ip").textContent = data.clientIp;
    I(  "dlText").textContent = (data.testState == 1 && data.dlStatus == 0) ? "..." : renderNumber(data.dlStatus);
    I(  "ulText").textContent = (data.testState == 3 && data.ulStatus == 0) ? "..." : renderNumber(data.ulStatus);
    I("pingText").textContent = renderNumber(data.pingStatus);
    I( "jitText").textContent = renderNumber(data.jitterStatus);
}

s.onend = function(aborted) {
    var button = I("startStopBtn");
    if (aborted) {
        button.className = "btn btn-primary";
    } else {
        button.className = "btn btn-success";
    }
    button.innerHTML = button.dataset.start;
}

function startStop(){ // Start/stop button pressed.
    if (s.getState() == 3) {
        // Speedtest is running, abort.
        s.abort();
    } else {
        // Test is not running, begin.
        s.start();
        var button = I("startStopBtn");
        button.className = "btn btn-primary btn-warning";
        button.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"></div> ' + button.dataset.abort;
    }
}

function I(id) {
    return document.getElementById(id);
}
