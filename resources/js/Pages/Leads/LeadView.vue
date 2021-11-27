<template>
    <app-layout title="LeadAdd">
        <template #header>
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{lead.id}} - {{ lead.fullName}}
                    </h2>
                </div>
                <div class="text-center">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                        <div class="text-left">
                            <label class="text-gray-700 dark:text-gray-200" for="status">Status</label>
                            <select name="status" id="status" v-model="lead.status" tabindex="4" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <option disabled value="">Select</option>
                                <option value="0">New</option>
                                <option value="1">1 Attempt</option>
                                <option value="2">2 Attempt</option>
                                <option value="3">3 Attempt</option>
                                <option value="Other">Other</option>
                            </select>
                            <div v-if="errors.status" class="block text-red-500">{{ errors.status }}</div>
                        </div>
                        <div class="text-left">
                            <label class="text-gray-700 dark:text-gray-200" for="goal">Loan Officer</label>
                            <select name="user_id" id="user_id" v-model="lead.user_id" tabindex="4" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <option disabled value="">Select</option>
                                <option value="1">Anthony Bird</option>
                                <option value="2">Other</option>
                            </select>
                            <div v-if="errors.user_id" class="block text-red-500">{{ errors.user_id }}</div>
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>

        </template>

                <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                    <section data-section-id="4" data-category="features" data-component-id="4d2f33a1_02_awz" class="py-8 px-4">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Contact Information</h2>

                        <form @submit.prevent="handleSubmit">
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="fullName">Full Name</label>
                                    <input id="fullName" type="text" placeholder="Full Name" v-model="lead.fullName" tabindex="1" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.fullName" class="block text-red-500">{{ errors.fullName }}</div>
                                </div>
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="fullName">Birthday</label>
                                    <input id="birthday" type="text" placeholder="Birthday" v-model="lead.birthday" tabindex="1" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="email">Email Address</label>
                                    <input id="email" type="text" placeholder="Email" v-model="lead.email" tabindex="2" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.email" class="block text-red-500">{{ errors.email }}</div>
                                </div>
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="phone">Phone</label>
                                    <div class="flex relative mx-auto">
                                        <input id="phone" type="text" v-model="lead.phone" tabindex="3" placeholder="Phone" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" />
                                        <div class="absolute right-2 top-5 mr-2">
                                            <a :href="'tel:+'+lead.phone"> <i class="text-lg fas fa-phone-alt text-green-500"></i></a> <a :href="'sms:+'+lead.phone"> <i class="ml-2 text-lg fas fa-sms text-blue-500"></i></a>
                                        </div>
                                    </div>
                                   <div v-if="errors.phone" class="block text-red-500">{{ errors.phone }}</div>
                                </div>
                            </div>
                            <div @click="toggle = !toggle"  v-show="!toggle" class="duration-300"><i class="fas fa-user-plus mt-5"></i> Show Co-Borrower
                            </div>
                            <div @click="toggle = !toggle" v-show="toggle" class="duration-300"><i class="fas fa-user-minus mt-5"></i> Hide Co-Borrower
                            </div>
                            <div id="coborrower" v-show="toggle" class="transition duration-300 ease-in-out">
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="fullNameCoborrower">Co-Borrower Full Name</label>
                                    <input id="fullNameCoborrower" name="fullNameCoborrower" type="text" placeholder="Co-Borrower Full Name" v-model="lead.fullNameCoborrower" tabindex="1" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.fullnameCoborrower" class="block text-red-500">{{ errors.fullNameCoborrower }}</div>
                                </div>
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="birthdayCoborrower">Co-Borrower Birthday</label>
                                    <input id="birthdayCoborrower" type="text" placeholder="Co-Borrower Birthday" v-model="lead.birthdayCoborrower" tabindex="1" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="emailCoborrower">Co-Borrower Email Address</label>
                                    <input id="emailCoborrower" type="text" placeholder="Co-Borrower Email" v-model="lead.emailCoborrower" tabindex="2" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.emailCoborrower" class="block text-red-500">{{ errors.emailCoborrower }}</div>
                                </div>
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="phoneCoborrower">Co-Borrower Phone</label>
                                    <div class="flex relative mx-auto">
                                        <input id="phoneCoborrower" type="text" v-model="lead.phoneCoborrower" tabindex="3" placeholder="phoneCoborrower" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" />
                                        <div class="absolute right-2 top-5 mr-2">
                                            <a :href="'tel:+'+lead.phoneCoborrower"> <i class="text-lg fas fa-phone-alt text-green-500"></i></a> <a :href="'sms:+'+lead.phoneCoborrower"> <i class="ml-2 text-lg fas fa-sms text-blue-500"></i></a>
                                        </div>
                                    </div>
                                   <div v-if="errors.phoneCoborrower" class="block text-red-500">{{ errors.phoneCoborrower }}</div>
                                </div>
                            </div>
                            </div>


                            <div class="mt-5">
                                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Home Information</h2>
                            </div>
                            <div class="grid grid-cols-1 gap-6 mt-4">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="address">Address</label>
                                    <div class="flex relative mx-auto">
                                        <input id="address" name="address" type="text" v-model="lead.address" tabindex="3" placeholder="Address" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" />
                                        <div class="absolute right-2 top-5 mr-2">
                                           <a :href="'https://app.floify.com/loan/view/'+lead.address"> <i class="ml-2 text-lg fas fa-sms text-blue-500"></i></a>
                                        </div><div v-if="errors.address" class="block text-red-500">{{ errors.address }}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="city">City</label>
                                    <input id="city" type="text" name="city" placeholder="City" v-model="lead.city" tabindex="2" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="state">State</label>
                                    <input id="state" type="text" name="state" placeholder="State" v-model="lead.state" tabindex="2" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="zip">Zip</label>
                                    <input id="zip" type="text" name="zip" placeholder="Zip" v-model="lead.zip" tabindex="2" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.zip" class="block text-red-500">{{ errors.zip }}</div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Loan Information</h2>
                            </div>
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="goal">Goal</label>
                                    <select name="goal" id="goal" v-model="lead.goal" tabindex="4" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        <option disabled value="">Select</option>
                                        <option value="Purchase">Purchase</option>
                                        <option value="Refinance">Refinance</option>
                                        <option value="Cashout">Cashout</option>
                                        <option value="Shorten Term">Shorten Term</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 dark:text-gray-200" for="loan_type">Loan Type</label>
                                    <select name="loan_type" id="loan_type" v-model="lead.loan_type" tabindex="5" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        <option disabled value="">Select</option>
                                        <option value="Conventional">Conventional</option>
                                        <option value="FHA">FHA</option>
                                        <option value="VA">VA</option>
                                        <option value="USDA">USDA</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-gray-700 dark:text-gray-200" for="rating">Rating</label>
                                    <select name="rating" id="rating" v-model="lead.rating" tabindex="5" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        <option disabled value="">Select</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                   <div v-if="errors.rating" class="block text-red-500">{{ errors.rating }}</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-6 mt-4">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="floifyLoan">Floify Link</label>
                                    <div class="flex relative mx-auto">
                                        <input id="floifyLoan" name="floifyLoan" type="text" v-model="lead.floifyLoan" tabindex="3" placeholder="Floify ID" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" />
                                        <div class="absolute right-2 top-5 mr-2">
                                           <a :href="'https://app.floify.com/loan/view/'+lead.floifyLoan"> <i class="ml-2 text-lg fas fa-sms text-blue-500"></i></a>
                                        </div>
                                    </div>
                                   <div v-if="errors.floifyLoan" class="block text-red-500">{{ errors.floifyLoan }}</div>
                                </div>
                            </div>
                            <div class="mt-5" @click="toggle2 = !toggle2">
                                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Meta Information +/-</h2>
                            </div>

                            <div id="metaInfo" v-show="toggle2">
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="url">Website Address</label>
                                    <input id="url" type="text" placeholder="URL" v-model="lead.url" tabindex="1" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.url" class="block text-red-500">{{ errors.url }}</div>
                                </div>
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="fullName">Referral Source</label>
                                    <input id="referringUrl" type="text" placeholder="Referral Source" v-model="lead.referringUrl" tabindex="1" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.referringUrl" class="block text-red-500">{{ errors.referringUrl }}</div>
                                </div>
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="ip">IP Address</label>
                                    <input id="ip" type="text" placeholder="IP Address" v-model="lead.ip" tabindex="1" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.ip" class="block text-red-500">{{ errors.ip }}</div>
                                </div>
                            </div>
                            </div>

                            <div class="grid grid-cols-1 gap-6 mt-4">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="message">Message</label>
                                    <textarea rows="3" id="message" name="message" v-model="lead.message" tabindex="6" placeholder="Message" class="form-textarea block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">Message</textarea>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center items-center">
                                <div class="block text-green-500">{{ $page.props.flash.success }}</div>


                                <div class="inline-block">
                                    <a :href="route('leads.list')"><button tabindex="8" type="button" class="focus:outline-none text-sm w-24 px-4 py-2 mt-2 rounded-md font-semibold text-white bg-gray-500 ring-0">Back</button></a>
                                    <button tabindex="7" type="submit" class="ml-3 focus:outline-none text-sm w-24 px-4 py-2 mt-2 rounded-md font-semibold text-white bg-blue-500 ring-0">Submit</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
   // import '~@fortawesome/fontawesome-free/css/fontawesome'

    export default defineComponent({
        components: {
            AppLayout,
            JetApplicationLogo,
        },
        props: {
        errors: Object,
        leadProp: Object,
        results: Object,
        },
        data(){
            return {
                lead: {
                    fullName: '',
                    loan_type: '',
                    phone: '',
                    goal:'',
                    email:'',
                    message: '',
                    birthday: '',
                    fullNameCoborrower: '',
                    birthdayCoborrower: '',
                    emailCoborrower:'',
                    phoneCoborrower:'',
                    address:'',
                    city:'',
                    state:'',
                    zip:'',
                    url:'',
                    ip:'',
                    referringUrl:'',
                    agent:'',
                    status:'',
                    goal:'',
                    closed:'',
                    noText:'',
                    rating:'',
                    floifyLoan:'',
                    credit:'',
                    user_id:'',
                },
                toggle: false,
                toggle2: false
            }
        },
        created(){
            this.lead = this.leadProp
        },
        methods:{
             async handleSubmit(){
                let response = await this.$inertia.post('/leads/update', this.lead)
            }
        }
    })
</script>
