import { writable } from 'svelte/store';

export function createForm(values = {}) {
    const { subscribe, set, update } = writable(values);

    return {
        subscribe,
        reset: () => set(values),
        handleChange: event => {
            update(form => ({
                ...form,
                [event.target.name]: event.target.value,
            }));
        },
    };
}
