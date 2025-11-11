import React from "react";
import { Head } from "@inertiajs/react";
import GuestLayout from "@/Layouts/GuestLayout"; // if you have a layout for public pages

export default function About({ lang, locale }) {
    return (
        <GuestLayout>
            <Head title={lang?.about_title || "About Us"} />

            <section className="py-16 bg-gray-50 min-h-screen">
                <div className="max-w-5xl mx-auto px-6">
                    <h1 className="text-4xl font-bold text-gray-900 mb-6">
                        {lang?.about_title || "About Us"}
                    </h1>

                    <p className="text-gray-700 text-lg leading-relaxed mb-4">
                        {lang?.about_intro ||
                            "We are a technology-driven team passionate about building innovative digital solutions that transform businesses and empower people."}
                    </p>

                    <p className="text-gray-700 text-lg leading-relaxed mb-4">
                        {lang?.about_mission ||
                            "Our mission is to bridge the gap between ideas and execution, helping organizations grow with robust software, clean design, and scalable infrastructure."}
                    </p>

                    <p className="text-gray-700 text-lg leading-relaxed">
                        {lang?.about_vision ||
                            "We envision a world where technology is simple, accessible, and human-centered — enabling every business to thrive in the digital era."}
                    </p>
                </div>
            </section>
        </GuestLayout>
    );
}
