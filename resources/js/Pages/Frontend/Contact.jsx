import React, { useState } from "react";
import { Head, useForm } from "@inertiajs/react";
import GuestLayout from "@/Layouts/GuestLayout"; // optional if you have a public layout

export default function Contact({ lang }) {
    const { data, setData, post, processing, reset } = useForm({
        name: "",
        email: "",
        message: "",
    });

    const [status, setStatus] = useState(null);

    const submit = (e) => {
        e.preventDefault();
        post(route("contact.submit"), {
            onSuccess: () => {
                setStatus("Message sent successfully!");
                reset();
            },
        });
    };

    return (
        <GuestLayout>
            <Head title={lang?.contact || "Contact Us"} />

            <div className="py-16 bg-gray-50 min-h-screen">
                <div className="max-w-4xl mx-auto px-6">
                    <h1 className="text-3xl font-bold mb-6 text-gray-800">
                        {lang?.contact || "Contact Us"}
                    </h1>

                    <form
                        onSubmit={submit}
                        className="bg-white shadow-md rounded-lg p-8 space-y-4"
                    >
                        <div>
                            <label className="block text-sm font-medium text-gray-700">
                                {lang?.name || "Your Name"}
                            </label>
                            <input
                                type="text"
                                name="name"
                                value={data.name}
                                onChange={(e) => setData("name", e.target.value)}
                                className="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required
                            />
                        </div>

                        <div>
                            <label className="block text-sm font-medium text-gray-700">
                                {lang?.email || "Your Email"}
                            </label>
                            <input
                                type="email"
                                name="email"
                                value={data.email}
                                onChange={(e) => setData("email", e.target.value)}
                                className="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required
                            />
                        </div>

                        <div>
                            <label className="block text-sm font-medium text-gray-700">
                                {lang?.message || "Message"}
                            </label>
                            <textarea
                                name="message"
                                rows="4"
                                value={data.message}
                                onChange={(e) => setData("message", e.target.value)}
                                className="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required
                            ></textarea>
                        </div>

                        <button
                            type="submit"
                            disabled={processing}
                            className="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 disabled:opacity-50"
                        >
                            {processing ? "Sending..." : lang?.send || "Send Message"}
                        </button>

                        {status && (
                            <p className="mt-3 text-green-600 font-medium">{status}</p>
                        )}
                    </form>
                </div>
            </div>
        </GuestLayout>
    );
}
