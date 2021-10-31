// Funções de Notificação 
function alertMsg(text) {
    notif({
        type: "warning",
        msg: text,
    });
}

function successMsg(text) {
    notif({
        type: "success",
        msg: text,
    });
}

function errorMsg(text) {
    notif({
        type: "error",
        msg: text,
    });
}

function infoMsg(text) {
    notif({
        type: "info",
        msg: text,
        width: "all",
        height: 100,
        position: "center"
    });
}