import React from 'react';
import AuthenticatedLayoutf from '@/Layouts/AuthenticatedLayout';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import { useForm, Head } from '@inertiajs/react';

export default function Index({ auth }) {
    const { data, setData, post, processing, reset, errors } = useForm({
        message: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('salutions.store'), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayoutf>
            <Head title="Salution" />

            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <form onSubmit={submit}>
                    <textarea
                        value={data.message}
                        placeholder="Your Turn to Say Hi!"
                        className="
                            block
                            w-full
                            border-gray-300
                            focus:border-indigo-300
                            focus:ring
                            focus:ring-indigo-200
                            focus:ring-opacity-50
                            rounded-md
                            shadow-sm
                        "
                        onchange={e => setData('message', e.target.value)}
                    ></textarea>
                    <InputError message={errors.message} className="mt-2" />
                    <PrimaryButton className="mt-4" disabled={processing}>Say Hi!</PrimaryButton>
                </form>
            </div>
        </AuthenticatedLayoutf>
    );
}