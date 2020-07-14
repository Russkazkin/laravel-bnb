export const is404 = function (e) {
    return e.response && e.response.status && e.response.status === 404;
}
