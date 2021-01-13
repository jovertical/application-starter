import { writable } from 'svelte/store';
import { Inertia } from '@inertiajs/inertia';

export function createForm(values = {}) {
    let store = writable({ loading: false, errors: {}, ...values });

    function update(key, value) {
        store.update(form => ({
            ...form,
            [key]: value,
        }));
    }

    function submit(url, method = 'POST') {
        update('loading', true);

        store.update(form => {
            let { loading, errors, ...data } = form;

            Inertia.visit(url, {
                method,
                data,
                onSuccess: () => {
                    update('loading', false);
                },
                onError: errors => {
                    update('loading', false);
                    update('errors', errors);
                },
            });

            return form;
        });
    }

    return {
        subscribe: store.subscribe,
        post: url => submit(url, 'POST'),
        patch: url => submit(url, 'PATCH'),
        delete: url => submit(url, 'DELETE'),
        handleChange: event => update(event.target.name, event.target.value),
    };
}
