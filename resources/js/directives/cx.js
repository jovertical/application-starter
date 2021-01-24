import classnames from 'classnames';

export default function cx(node, value) {
    let originalClassList = [...node.classList];

    function mergeClass(newValue) {
        let classes = classnames(originalClassList, newValue)
            .split(' ')
            .filter(Boolean);

        if (classes.length > 0) {
            node.classList.add(...classes);
        }
    }

    function resetClass() {
        node.classList = originalClassList;
    }

    mergeClass(value);

    return {
        update(newValue) {
            resetClass();
            mergeClass(newValue);
        },

        destroy() {
            resetClass();
        },
    };
}
