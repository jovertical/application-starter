Object.prototype.empty = function() {
    return Object.values(this).length === 0;
};

export function sleep(milliseconds = 1000) {
    return new Promise(resolve => setTimeout(resolve, milliseconds));
}
