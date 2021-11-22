<template>
    <app-layout title="LeadAdd">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Lead
            </h2>
        </template>

                <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                    <section data-section-id="4" data-category="features" data-component-id="4d2f33a1_02_awz" class="py-8 px-4">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Account settings</h2>

                        <form @submit.prevent="handleSubmit">
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="fullName">Full Name</label>
                                    <input id="fullName" type="text" placeholder="Full Name" v-model="lead.fullName" tabindex="1" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.fullName" class="block text-red-500">{{ errors.fullName }}</div>
                                </div>

                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="email">Email Address</label>
                                    <input id="email" type="text" placeholder="Email" v-model="lead.email" tabindex="2" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.email" class="block text-red-500">{{ errors.email }}</div>
                                </div>


                            </div>

                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">

                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="phone">Phone</label>
                                    <input id="phone" type="text" v-model="lead.phone" tabindex="3" placeholder="Phone" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <div v-if="errors.phone" class="block text-red-500">{{ errors.phone }}</div>
                                </div>

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
                            </div>

                            <div class="grid grid-cols-1 gap-6 mt-4">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="message">Message</label>
                                    <textarea rows="3" id="message" name="message" v-model="lead.message" tabindex="6" placeholder="Message" class="form-textarea block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">Message</textarea>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center items-center">
                                <button tabindex="7" type="submit" class="focus:outline-none text-sm w-24 px-4 py-2 mt-2 rounded-md font-semibold text-white bg-blue-500 ring-0">Submit</button>
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
        errors: Object
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
                }
            }
        },
        methods:{
             async handleSubmit(){
                 let response = await this.$inertia.post('/leads/save', this.lead)
            }
        }
    })
</script>
