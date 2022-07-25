<x-guest-layout>
    <div class="bg-gray-100">
        <div class="flex justify-between items-center p-3 bg-white drop-shadow-sm shadow-sm">
            <div class="flex align-center justify-start">
                <img src="{{ asset('images/Nexday-Logo.png') }}" alt="Nextday Logo" class="w-24 h-12" />
            </div>
            <div class="flex align-center justify-end space-x-3">
                <a href="{{ route('/') }}" class="flex align-center space-x-1 text-lg text-gray-700 p-2 hover:rounded-md hover:bg-blue-600 hover:shadow-lg hover:border-blue-900 hover:text-white focus:text-white active:bg-blue-600 ">
                    <x-generated-icons.icon-home class="w-4 h-4 fill-current"/>
                    <span class="text-sm font-sans">Home</span>
                </a>
                <a href="" class="flex align-center space-x-1 text-lg text-gray-700 p-2 hover:rounded-md hover:bg-blue-600 hover:shadow-lg hover:border-blue-900 hover:text-white focus:text-white active:bg-blue-600 ">
                    <x-generated-icons.icon-app class="w-4 h-4 fill-current"/>
                    <span class="text-sm font-sans">App Download</span>
                </a>
                <a href="{{ route('register') }}" class="flex align-center space-x-1 text-lg p-2 rounded-md bg-blue-600 shadow-lg text-white">
                    <x-generated-icons.icon-account class="w-4 h-4 fill-current"/>
                    <span class="text-sm font-sans">Register</span>
                </a>
                <a href="{{ route('login') }}" class="flex align-center space-x-1 text-lg text-gray-700 p-2 hover:rounded-md hover:bg-blue-600 hover:shadow-lg hover:border-blue-900 hover:text-white focus:text-white active:bg-blue-600 ">
                    <x-generated-icons.icon-person-add class="w-4 h-4 fill-current"/>
                    <span class="text-sm font-sans">Sign In</span>
                </a>
            </div>
        </div>
        <div class="min-h-screen flex flex-col items-center">
            <div class="w-full flex flex-row items-center justify-start p-4">
                <div class="flex bg-white flex-row w-full p-0.5 rounded-md space-x-1">
                    <a href="{{ url('register') }}" class="p-3 {{ session('basicInformation') ? 'bg-blue-300 rounded-md border-b-4 border-b-blue-300 cursor-not-allowed' : 'border-b-4 border-b-transparent hover:border-b-blue-700 ' }}">Basic Information</a>
                    <a href="{{ url('register/location') }}" class="p-3 {{ isset(session('basicInformation')['longitudeLatitude']) ? 'bg-blue-300 rounded-md border-b-4 border-b-blue-300 cursor-not-allowed' : 'border-b-4 border-b-transparent hover:border-b-blue-700' }}">Location (Longitude/Latitude)</a>
                    <a href="{{ url('register') }}" class="p-3 {{ isset(session('basicInformation')['terms']) ? 'bg-blue-300 border-b-4 border-b-blue-300 cursor-not-allowed' : 'cursor-not-allowed border-b-4 border-b-blue-700' }}">Terms & Conditions</a>
                </div>
            </div>
            <div class="bg-white w-full md:w-6/12 md:bg-white/70 md:backdrop-blur-md shadow-2xl md:border md:border-solid md:border-gray-30 md:rounded-md sm:mt-5">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('process-terms') }}">
                    @csrf

                     @if(session('registrationProgressStatusCode') != NULL && session('registrationProgressStatusCode') == 0)
                        <div class="bg-rose-500 flex flex-row p-2 m-2 rounded shadow-2xl border border-rose-600 mb-4">
                            <p class="p-0 m-0 font-sans text-white text-sm">{{ session('registrationProgressStatusMessage') }}</p>
                        </div>
                    @endif

                    <div class="flex flex-wrap p-4 bg-slate-200">
                        <h1 class="text-uppercase font-sans text-3xl font-bold">Terms & Conditions of Use</h1>
                        <p>Please read these terms and conditions carefully before using Our Service</p>
                    </div>

                    <div class="bg-transparent border-solid border-slate-300/80 p-5 max-h-96 hover:scroll-auto overflow-x-auto">
                        <div class="border-b border-slate-400/40 pb-2 mb-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Interpretation and Definitions</h2>
                        </div>
                        <p>
                            <span class="text-sky-900"><b>Interpretation: </b></span><br /> The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.
                        </p>
                        <p><span class="text-sky-900"><b>Definitions: </b></span><br /> For the purposes of these Terms and Conditions:</p>
                        <p class="pl-4">
                            <b>Application</b> means the software program provided by the Company downloaded by You on any electronic device, named Nexday Application.<br /><b>Store</b> means the digital distribution service operated and developed by Apple Inc. (Apple App Store) or Google Inc. (Google Play Store) in which the Application has been downloaded. <br /><b>Affiliate</b> means an entity that controls, is controlled by or is under common control with a party, where "control" means ownership of 50% or more of the shares, equity interest or other securities entitled to vote for election of directors or other managing authority. <br /><b>Country</b> refers to: Nigeria
                            <br /><b>Company</b> (referred to as either "the Company", "We", "Us" or "Our" in this Agreement) refers to Aknessy Resources, Calabar, Nigeria. <br /><b>Device</b> means any device that can access the Service such as a computer, a cellphone or a digital tablet. <br /><b>Service</b> refers to the Application or the Website or both. <br /><b>Terms and Conditions (also referred as "Terms")</b> mean these Terms and Conditions that form the entire agreement between You and the Company regarding the use of the Service. This Terms and Conditions agreement has been created with the help of the Free Terms and Conditions Generator. <br /><b>Third-party Social Media Service</b> means any services or content (including data, information, products or services) provided by a third-party that may be displayed, included or made available by the Service. <br /><b>Website</b> refers to Nexday, accessible from http://nexday.com.<br /><b>You</b> means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.
                        </p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Acknowledgement</h2>
                        </div>
                        <p>These are the Terms and Conditions governing the use of this Service and the agreement that operates between You and the Company. These Terms and Conditions set out the rights and obligations of all users regarding the use of the Service. Your access to and use of the Service is conditioned on Your acceptance of and compliance with these Terms and Conditions. These Terms and Conditions apply to all visitors, users and others who access or use the Service. By accessing or using the Service You agree to be bound by these Terms and Conditions. If You disagree with any part of these Terms and Conditions then You may not access the Service.You represent that you are over the age of 18. The Company does not permit those under 18 to use the Service. Your access to and use of the Service is also conditioned on Your acceptance of and compliance with the Privacy Policy of the Company. Our Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your personal information when You use the Application or the Website and tells You about Your privacy rights and how the law protects You. Please read Our Privacy Policy carefully before using Our Service.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Links to other websites</h2>
                        </div>
                        <p>Our Service may contain links to third-party web sites or services that are not owned or controlled by the Company. The Company has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that the Company shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods or services available on or through any such web sites or services. We strongly advise You to read the terms and conditions and privacy policies of any third-party web sites or services that You visit.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Termination</h2>
                        </div>
                        <p>We may terminate or suspend Your access immediately, without prior notice or liability, for any reason whatsoever, including without limitation if You breach these Terms and Conditions. Upon termination, Your right to use the Service will cease immediately.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Limitation of liability</h2>
                        </div>
                        <p>Notwithstanding any damages that You might incur, the entire liability of the Company and any of its suppliers under any provision of this Terms and Your exclusive remedy for all of the foregoing shall be limited to the amount actually paid by You through the Service or 100 USD if You haven't purchased anything through the Service. To the maximum extent permitted by applicable law, in no event shall the Company or its suppliers be liable for any special, incidental, indirect, or consequential damages whatsoever (including, but not limited to, damages for loss of profits, loss of data or other information, for business interruption, for personal injury, loss of privacy arising out of or in any way related to the use of or inability to use the Service, third-party software and/or third-party hardware used with the Service, or otherwise in connection with any provision of this Terms), even if the Company or any supplier has been advised of the possibility of such damages and even if the remedy fails of its essential purpose. Some states do not allow the exclusion of implied warranties or limitation of liability for incidental or consequential damages, which means that some of the above limitations may not apply. In these states, each party's liability will be limited to the greatest extent permitted by law.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">"AS IS" and "AS AVAILABLE" Disclaimer</h2>
                        </div>
                        <p>The Service is provided to You "AS IS" and "AS AVAILABLE" and with all faults and defects without warranty of any kind. To the maximum extent permitted under applicable law, the Company, on its own behalf and on behalf of its Affiliates and its and their respective licensors and service providers, expressly disclaims all warranties, whether express, implied, statutory or otherwise, with respect to the Service, including all implied warranties of merchantability, fitness for a particular purpose, title and non-infringement, and warranties that may arise out of course of dealing, course of performance, usage or trade practice. Without limitation to the foregoing, the Company provides no warranty or undertaking, and makes no representation of any kind that the Service will meet Your requirements, achieve any intended results, be compatible or work with any other software, applications, systems or services, operate without interruption, meet any performance or reliability standards or be error free or that any errors or defects can or will be corrected. Without limiting the foregoing, neither the Company nor any of the company's provider makes any representation or warranty of any kind, express or implied: (i) as to the operation or availability of the Service, or the information, content, and materials or products included thereon; (ii) that the Service will be uninterrupted or error-free; (iii) as to the accuracy, reliability, or currency of any information or content provided through the Service; or (iv) that the Service, its servers, the content, or e-mails sent from or on behalf of the Company are free of viruses, scripts, trojan horses, worms, malware, timebombs or other harmful components. Some jurisdictions do not allow the exclusion of certain types of warranties or limitations on applicable statutory rights of a consumer, so some or all of the above exclusions and limitations may not apply to You. But in such a case the exclusions and limitations set forth in this section shall be applied to the greatest extent enforceable under applicable law.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Governing Law</h2>
                        </div>
                        <p>The laws of the Country, excluding its conflicts of law rules, shall govern this Terms and Your use of the Service. Your use of the Application may also be subject to other local, state, national, or international laws.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Disputes Resolution</h2>
                        </div>
                        <p>If You have any concern or dispute about the Service, You agree to first try to resolve the dispute informally by contacting the Company.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">For European Union (EU) Users</h2>
                        </div>
                        <p>If You are a European Union consumer, you will benefit from any mandatory provisions of the law of the country in which you are resident in.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">United States Legal Compliance</h2>
                        </div>
                        <p>You represent and warrant that: </p> 
                        <p class="pl-4">You are not located in a country that is subject to the United States government embargo, or that has been designated by the United States government as a "terrorist supporting" country, and <br />(ii) You are not listed on any United States government list of prohibited or restricted parties.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Severability and Waiver</h2>
                        </div>
                        <p><b>Severability</b><br /> If any provision of these Terms is held to be unenforceable or invalid, such provision will be changed and interpreted to accomplish the objectives of such provision to the greatest extent possible under applicable law and the remaining provisions will continue in full force and effect. <br /><b>Waiver</b><br /> Except as provided herein, the failure to exercise a right or to require performance of an obligation under these Terms shall not effect a party's ability to exercise such right or require such performance at any time thereafter nor shall the waiver of a breach constitute a waiver of any subsequent breach.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Translation & Interpretation</h2>
                        </div>
                        <p>These Terms and Conditions may have been translated if We have made them available to You on our Service. You agree that the original English text shall prevail in the case of a dispute.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Changes to These Terms and Conditions</h2>
                        </div>
                        <p>We reserve the right, at Our sole discretion, to modify or replace these Terms at any time. If a revision is material We will make reasonable efforts to provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at Our sole discretion. By continuing to access or use Our Service after those revisions become effective, You agree to be bound by the revised terms. If You do not agree to the new terms, in whole or in part, please stop using the website and the Service.</p>
                        <div class="border-b border-slate-400/40 pb-2 mb-3 mt-3 w-full">
                            <h2 class="font-bold text-sky-800 text-2xl">Contact Us</h2>
                        </div>
                        <p>If you have any questions about these Terms and Conditions, You can contact us:</p>
                        <p class="pl-4">
                            By email: support@nexday.com<br />
                            By visiting this page on our website: http://www.nexday.com<br />
                            By phone number: +2347000111100
                        </p>
                    </div>

                    <div class="flex flex-wrap bg-slate-200 justify-between">
                        <p class="leading-tight p-4 mb-0">
                            <input type="checkbox" name="terms" class="rounded text-sky-600 mr-2 outline-none hover:outline-none focus:outline-none" :value="old('terms')" required />I have <b>carefully</b> read, understood and agreed to the Terms & Conditions of service guiding my use of the the services.
                        </p>
                        <div class="flex w-full justify-between items-center bg-slate-300 p-2">
                            <a class="text-sm text-gray-600 hover:text-gray-900 border rounded-md border-slate-300 hover:border-blue-500 hover:bg-blue-300 py-2 px-4" 
                                href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                            </a>

                            <x-button type="submit" class="border border-blue-700 bg-blue-600 text-white hover:bg-blue-700 hover:border-blue-800 shadow-xl drop-shadow-xl">
                                {{ __('Save & Continue') }}
                            </x-button>
                        </div>
                    </div>
                </form> 
            </div>

            <div class="flex mt-5 items-center justify-around">
                <div class="flex flex-row justify-between items-center space-x-5 text-gray-500">
                    <a href="{{  url('/') }}" class="hover:underline">Home</a>
                    <a href="#" class="hover:underline">Privacy Policy</a>
                    <a href="#" class="hover:underline">Terms of Service</a>
                    <a href="#" class="hover:underline">About</a>
                </div>
                <div class="flex justify-center items-center p-6 text-gray-500">
                    <p class="text-gray-300">All rights reserved. &copy;{{ date('Y') }} Aknessy Resources</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>