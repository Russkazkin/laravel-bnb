export const is404 = function (e) {
    return isErrorWithResponceAndStatus(e) && e.response.status === 404;
}

export const is422 = function (e) {
    return isErrorWithResponceAndStatus(e) && e.response.status === 422;
}

const isErrorWithResponceAndStatus = function(e) {
    return e.response && e.response.status;
}
