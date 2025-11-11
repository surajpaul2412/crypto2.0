import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Customer Dashboard</h2>}
        >
            <Head title="Customer Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                        <h3 className="text-lg font-bold mb-4">Welcome, {auth.user.name} 👋</h3>
                        <p>You are logged in as a <span className="font-semibold text-green-600">{auth.user.role}</span>.</p>

                        <div className="mt-6">
                            <h4 className="font-semibold mb-2">Your Options</h4>
                            <ul className="list-disc list-inside text-gray-700">
                                <li>View Orders</li>
                                <li>Manage Profile</li>
                                <li>Contact Support</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
