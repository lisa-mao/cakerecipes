<x-layout>
    <div class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-[#6D94C5] mb-4">Contact the Archive</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Have a question about a specific recipe, or need help publishing your own mythical creation?
                Our community moderators are here to assist you.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-md border-b-4 border-white transition hover:border-[#6D94C5]">
                    <div class="flex items-center space-x-4">
                        <div class="text-[#6D94C5]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Support Email</h3>
                            <p class="text-sm text-gray-600">support@loongcakes.com</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-md border-b-4 border-white transition hover:border-[#6D94C5]">
                    <div class="flex items-center space-x-4">
                        <div class="text-[#6D94C5]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Community Guidelines</h3>
                            <p class="text-sm text-gray-600">Learn about our recipe standards</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white p-8 rounded-3xl shadow-xl border-4 border-white">
                    <form onsubmit="return false;" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-[#6D94C5] mb-2 uppercase tracking-wide">Your Name</label>
                                <input type="text" placeholder="Baker Name" class="w-full px-4 py-3 rounded-xl border-2 border-gray-100 focus:border-[#6D94C5] focus:outline-none transition">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-[#6D94C5] mb-2 uppercase tracking-wide">Email Address</label>
                                <input type="email" placeholder="dragon@archive.com" class="w-full px-4 py-3 rounded-xl border-2 border-gray-100 focus:border-[#6D94C5] focus:outline-none transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-[#6D94C5] mb-2 uppercase tracking-wide">Inquiry Type</label>
                            <select class="w-full px-4 py-3 rounded-xl border-2 border-gray-100 focus:border-[#6D94C5] focus:outline-none transition bg-white text-gray-700">
                                <option>Recipe Submission Help</option>
                                <option>Report a Bug</option>
                                <option>Account & Comments</option>
                                <option>Collaborations</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-[#6D94C5] mb-2 uppercase tracking-wide">Your Message</label>
                            <textarea rows="4" placeholder="How can we help you share your next legendary recipe?" class="w-full px-4 py-3 rounded-xl border-2 border-gray-100 focus:border-[#6D94C5] focus:outline-none transition"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-[#6D94C5] text-white font-bold py-4 rounded-xl shadow-lg hover:bg-gray-100 hover:text-[#6D94C5] transition duration-300 border-2 border-transparent hover:border-[#6D94C5]">
                            Send to Archive (Mock)
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
