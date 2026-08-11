import React from "react";
import { Head } from "@inertiajs/react";
import GuestLayout from "@/Layouts/GuestLayout"; // use your public layout

export default function Plans({ lang, locale }) {
    const plans = [
        {
            name: lang?.basic_plan || "Basic",
            price: "$19",
            features: [
                lang?.feature_1 || "Access to core features",
                lang?.feature_2 || "Email support",
                lang?.feature_3 || "Single user license",
            ],
        },
        {
            name: lang?.pro_plan || "Pro",
            price: "$49",
            features: [
                lang?.feature_4 || "All Basic features",
                lang?.feature_5 || "Priority support",
                lang?.feature_6 || "Team collaboration tools",
            ],
        },
        {
            name: lang?.enterprise_plan || "Enterprise",
            price: "$99",
            features: [
                lang?.feature_7 || "Custom integrations",
                lang?.feature_8 || "Dedicated account manager",
                lang?.feature_9 || "24/7 premium support",
            ],
        },
    ];

    return (
        <GuestLayout>
            <Head title={lang?.plans_title || "Our Plans"} />

            <section className="py-16 bg-gray-50 min-h-screen">
                <div className="max-w-6xl mx-auto px-6">
                    <h1 className="text-4xl font-bold text-gray-900 mb-8 text-center">
                        {lang?.plans_title || "Our Plans"}
                    </h1>
                    <p className="text-gray-700 text-center mb-12 text-lg">
                        {lang?.plans_intro ||
                            "Choose a plan that fits your goals. Scale as you grow."}
                    </p>

                    <div className="grid gap-8 md:grid-cols-3">
                        {plans.map((plan, index) => (
                            <div
                                key={index}
                                className="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-lg transition"
                            >
                                <h2 className="text-2xl font-bold text-gray-800 mb-2">
                                    {plan.name}
                                </h2>
                                <p className="text-3xl font-semibold text-indigo-600 mb-4">
                                    {plan.price}
                                    <span className="text-base text-gray-500">/mo</span>
                                </p>
                                <ul className="text-gray-700 mb-6 space-y-2">
                                    {plan.features.map((feature, i) => (
                                        <li key={i}>✅ {feature}</li>
                                    ))}
                                </ul>
                                <button className="bg-indigo-600 text-white px-5 py-2 rounded-md hover:bg-indigo-700">
                                    {lang?.choose_plan || "Choose Plan"}
                                </button>
                            </div>
                        ))}
                    </div>
                </div>
            </section>
        </GuestLayout>
    );
}
