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
    I("ip").textContent       = data.clientIp;
    I("dlText").textContent   = (data.testState == 1 && data.dlStatus == 0) ? "..." : renderNumber(data.dlStatus);
    I("ulText").textContent   = (data.testState == 3 && data.ulStatus == 0) ? "..." : renderNumber(data.ulStatus);
    I("pingText").textContent = renderNumber(data.pingStatus);
    I("jitText").textContent  = renderNumber(data.jitterStatus);
}

s.onend = function(aborted) {
    I("startStopBtn").className = "btn btn-primary";
    I("startStopBtn").innerText = 'Start test';
    if(aborted) {
        initUI();
    }
}

function startStop(){ // Start/stop button pressed.
    if(s.getState() == 3) {
        // Speedtest is running, abort.
        s.abort();
    } else {
        // Test is not running, begin.
        s.start();
        I("startStopBtn").className = "btn btn-primary btn-warning";
        I("startStopBtn").innerText = 'Abort test'
    }
}

function initUI(){
    I("dlText").textContent = "";
    I("ulText").textContent = "";
    I("pingText").textContent = "";
    I("jitText").textContent = "";
    I("ip").textContent = "";
}

function I(id) {
    return document.getElementById(id);
}
